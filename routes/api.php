<?php

use Aws\Exception\AwsException;
use Aws\Sqs\SqsClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('sqs_list', function () {
    $client = new SqsClient([
        'profile' => 'default',
        'region' => 'eu-west-1',
        'version' => '2012-11-05'
    ]);

    try {
        $result = $client->receiveMessage(array(
            'AttributeNames' => ['SentTimestamp'],
            'MaxNumberOfMessages' => 1,
            'MessageAttributeNames' => ['All'],
            'QueueUrl' => "https://sqs.eu-west-1.amazonaws.com/323797055718/TenantQueue", // REQUIRED
            'WaitTimeSeconds' => 0,
        ));

        /*if (!empty($result->get('Messages')[0]['Body'])) {
            var_dump($result->get('Messages')[0]);
            $result = $client->deleteMessage([
                'QueueUrl' => "https://sqs.eu-west-1.amazonaws.com/323797055718/TenantQueue", // REQUIRED
                'ReceiptHandle' => $result->get('Messages')[0]['Body'] // REQUIRED
            ]);
        } else {
            echo "No messages in queue. \n";
        }*/
    } catch (AwsException $e) {
        // output error message if fails
        error_log($e->getMessage());
    }
});

/* ====== Sign =======*/
Route::post('login', 'AuthController@login')->name('login');
Route::post('/confirm_password', 'AuthController@confirmAccountPassword');
Route::post('forgot_password', 'AuthController@forgetPassword');
Route::post('reset_password', 'AuthController@resetPassword');
// Settings
Route::get('settings', 'TasksController@settings');
// Working Hours
Route::get('working_hours', 'TasksController@workingHours');

Route::middleware('auth:sanctum')->group(function () {
    // Logout
    Route::post('logout', 'AuthController@logout');

    Route::apiResource('video_calls', 'VideoCallsController', ['except' => ['create', 'edit']]);
});
