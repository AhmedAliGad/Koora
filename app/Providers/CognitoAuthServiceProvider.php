<?php

namespace App\Providers;

use App\Cognito\CognitoClient;
use Aws\CognitoIdentityProvider\CognitoIdentityProviderClient;
use Aws\Credentials\Credentials;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class CognitoAuthServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(CognitoClient::class, function (Application $app) {
            $data = new Credentials(env('NOVO_ACCESS_KEY_ID'), env('NOVO_ACCESS_KEY_SECRET'));
            $config = [
                'credentials' => $data,
                'region'      => config('services.cognito.region'),
                'version'     => 'latest',
                'token' => null,
            ];

            return new CognitoClient(
                new CognitoIdentityProviderClient($config),
                config('services.cognito.app_client_id'),
                config('services.cognito.app_client_secret'),
                config('services.cognito.user_pool_id')
            );
        });
    }
}
