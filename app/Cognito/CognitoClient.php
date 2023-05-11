<?php
namespace App\Cognito;

use Aws\CognitoIdentityProvider\CognitoIdentityProviderClient;
use Aws\CognitoIdentityProvider\Exception\CognitoIdentityProviderException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class CognitoClient
{
    const NEW_PASSWORD_CHALLENGE = 'NEW_PASSWORD_REQUIRED';
    const FORCE_PASSWORD_STATUS  = 'FORCE_CHANGE_PASSWORD';
    const RESET_REQUIRED         = 'PasswordResetRequiredException';
    const USER_NOT_FOUND         = 'UserNotFoundException';
    const USERNAME_EXISTS        = 'UsernameExistsException';
    const INVALID_PASSWORD       = 'InvalidPasswordException';
    const CODE_MISMATCH          = 'CodeMismatchException';
    const EXPIRED_CODE           = 'ExpiredCodeException';

    /**
     * @var CognitoIdentityProviderClient
     */
    protected $client;

    /**
     * @var string
     */
    protected $clientId;

    /**
     * @var string
     */
    protected $clientSecret;

    /**
     * @var string
     */
    protected $poolId;

    /**
     * CognitoClient constructor.
     * @param CognitoIdentityProviderClient $client
     * @param string $clientId
     * @param string $clientSecret
     * @param string $poolId
     */
    public function __construct(
        CognitoIdentityProviderClient $client,
                                      $clientId,
                                      $clientSecret,
                                      $poolId
    ) {
        $this->client       = $client;
        $this->clientId     = $clientId;
        $this->clientSecret = $clientSecret;
        $this->poolId       = $poolId;
    }

    /**
     * Checks if credentials of a user are valid
     *
     * @see http://docs.aws.amazon.com/cognito-user-identity-pools/latest/APIReference/API_AdminInitiateAuth.html
     * @param string $email
     * @param string $password
     * @return \Aws\Result|bool
     */
    public function authenticate($email, $password)
    {
        try {
            $response = $this->client->adminInitiateAuth([
                'AuthFlow'       => 'ADMIN_NO_SRP_AUTH',
                'AuthParameters' => [
                    'USERNAME'     => $email,
                    'PASSWORD'     => $password,
                    'SECRET_HASH'  => $this->cognitoSecretHash($email)
                ],
                'ClientId'   => $this->clientId,
                'UserPoolId' => $this->poolId
            ]);
        } catch (CognitoIdentityProviderException $exception) {
            if ($exception->getAwsErrorCode() === self::RESET_REQUIRED ||
                $exception->getAwsErrorCode() === self::USER_NOT_FOUND) {
                return false;
            }

            throw $exception;
        }

        return $response;
    }

    /**
     * Registers a user in the given user pool
     *
     * @param $email
     * @param $password
     * @param array $attributes
     * @return bool
     */
    public function register($email, $password, array $attributes = [])
    {
        $attributes['email'] = $email;
        try {
            $response = $this->client->signUp([
                'ClientId' => $this->clientId,
                'Password' => $password,
                'SecretHash' => $this->cognitoSecretHash($email),
                'UserAttributes' => $this->formatAttributes($attributes),
                'Username' => $email,
            ]);
        } catch (CognitoIdentityProviderException $e) {
            if ($e->getAwsErrorCode() === self::USERNAME_EXISTS) {
                return false;
            }

            throw $e;
        }

        $this->setUserAttributes($email, ['email_verified' => 'true']);

        return (bool) $response['UserConfirmed'];
    }

    /**
     * Send a password reset code to a user.
     * @see http://docs.aws.amazon.com/cognito-user-identity-pools/latest/APIReference/API_ForgotPassword.html
     *
     * @param  string $username
     * @return string
     */
    public function sendResetLink($username)
    {
        try {
            $result = $this->client->forgotPassword([
                'ClientId' => $this->clientId,
                'SecretHash' => $this->cognitoSecretHash($username),
                'Username' => $username,
            ]);
        } catch (CognitoIdentityProviderException $e) {
            if ($e->getAwsErrorCode() === self::USER_NOT_FOUND) {
                return Password::INVALID_USER;
            }

            return $e->get('message');
        }

        return Password::RESET_LINK_SENT;
    }

    # HELPER FUNCTIONS

    /**
     * Set a users attributes.
     * http://docs.aws.amazon.com/cognito-user-identity-pools/latest/APIReference/API_AdminUpdateUserAttributes.html
     *
     * @param string $username
     * @param array  $attributes
     * @return bool
     */
    public function setUserAttributes($username, array $attributes)
    {
        $this->client->AdminUpdateUserAttributes([
            'Username' => $username,
            'UserPoolId' => $this->poolId,
            'UserAttributes' => $this->formatAttributes($attributes),
        ]);

        return true;
    }


    /**
     * Creates the Cognito secret hash
     * @param string $username
     * @return string
     */
    protected function cognitoSecretHash($username)
    {
        return $this->hash($username . $this->clientId);
    }

    /**
     * Creates a HMAC from a string
     *
     * @param string $message
     * @return string
     */
    protected function hash($message)
    {
        $hash = hash_hmac(
            'sha256',
            $message,
            $this->clientSecret,
            true
        );

        return base64_encode($hash);
    }

    /**
     * Get user details.
     * http://docs.aws.amazon.com/cognito-user-identity-pools/latest/APIReference/API_GetUser.html
     *
     * @param  string $username
     * @return mixed
     */
    public function getUser($username)
    {
        try {
            $user = $this->client->AdminGetUser([
                'Username' => $username,
                'UserPoolId' => $this->poolId,
            ]);
        } catch (CognitoIdentityProviderException $e) {
            return $e->get('message');
        }

        return $user;
    }

    /**
     * Format attributes in Name/Value array
     *
     * @param  array $attributes
     * @return array
     */
    protected function formatAttributes(array $attributes)
    {
        $userAttributes = [];

        foreach ($attributes as $key => $value) {
            $userAttributes[] = [
                'Name' => $key,
                'Value' => $value,
            ];
        }

        return $userAttributes;
    }

    /**
     * @param $email
     * @return void
     */
    public function confirmAccount($email)
    {
        try {
            $this->client->adminConfirmSignUp(['UserPoolId' => $this->poolId,
                'Username' => $email]);
        } catch (CognitoIdentityProviderException $e) {
            return $e->get('message');
        }
    }

    /**
     * @param Request $request
     * @return void
     */
    public function createAdminAccount(Request $request)
    {
        try {
            $this->client->adminCreateUser(['UserPoolId' => $this->poolId,
                'Username' => $request->email, 'TemporaryPassword' => $request->password,
                'UserAttributes' => [['Name' => 'name', 'Value' => $request->name],
                    ['Name' => 'email', 'Value' => $request->email],
                    ['Name' => 'email_verified', 'Value' => 'true'],
                    ['Name' => 'custom:role', 'Value' => 'client']]
            ]);
        } catch (CognitoIdentityProviderException $e) {
            return $e->get('message');
        }
    }

    /**
     * @param $email
     * @return void
     */
    public function deleteAccount($email)
    {
        $this->client->adminDeleteUser(['UserPoolId' => $this->poolId,
            'Username' => $email]);
    }

    /**
     * @param $email
     * @return mixed|true|null
     */
    public function logOut($email)
    {
        try {
            $this->client->adminUserGlobalSignOut([
                'Username' => $email,
                'UserPoolId' => $this->poolId,
            ]);
            return true;
        } catch (CognitoIdentityProviderException $e) {
            return $e->get('message');
        }
    }

    /**
     * @param $email
     * @param $password
     * @return mixed|true|null
     */
    public function confirmPassword($email, $password)
    {
        try {
            $this->client->adminSetUserPassword([
                'Password' => $password,
                'Username' => $email,
                'UserPoolId' => $this->poolId,
                'Permanent' => true
            ]);
            return response()->json(['message' => 'Account password is set successfully'], 200);
        } catch (CognitoIdentityProviderException $e) {
            if (request()->wantsJson()) {
                return response()->json(['message' => $e->get('message')], 422);
            } else {
                return $e->get('message');
            }
        }
    }

    public function resetPassword(Request $request)
    {
        try {
            $this->client->confirmForgotPassword([
                'ClientId' => $this->clientId,
                'ConfirmationCode' => $request->code,
                'Password' => $request->password,
                'SecretHash' => $this->cognitoSecretHash($request->email),
                'Username' => $request->email,
            ]);
        } catch (CognitoIdentityProviderException $e) {
            if ($e->getAwsErrorCode() === self::USER_NOT_FOUND) {
                return __('password.user');
            }

            if ($e->getAwsErrorCode() === self::INVALID_PASSWORD) {
                return __('passwords.password') ? 'passwords.password' : $e->getAwsErrorMessage();
            }

            if ($e->getAwsErrorCode() === self::CODE_MISMATCH || $e->getAwsErrorCode() === self::EXPIRED_CODE) {
                return response()->json(['status' => 'error', 'message' => 'This password reset code is invalid.'], 422);
            }

            return $e->get('message');
        }

        return __('password.reset');
    }
}
