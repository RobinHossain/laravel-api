<?php

use Dingo\Api\Routing\Router;

/** @var Router $api */
$api = app(Router::class);

$api->version('v1', function (Router $api) {
    $api->group(['prefix' => 'auth'], function(Router $api) {
        $api->post('signup', 'App\\Api\\V1\\Controllers\\SignUpController@signUp');
        $api->post('login', 'App\\Api\\V1\\Controllers\\LoginController@login');

        $api->post('recovery', 'App\\Api\\V1\\Controllers\\ForgotPasswordController@sendResetEmail');
        $api->post('reset', 'App\\Api\\V1\\Controllers\\ResetPasswordController@resetPassword');
    });

    $api->group(['middleware' => 'jwt.auth'], function(Router $api) {
//        $api->get('test', 'App\\Api\\V1\\Controllers\\TestController@index');
        $api->get('protected', function() {
            return response()->json([
                'message' => 'Access to this item is only for authenticated user. Provide a token in your request!'
            ]);
        });

        $api->get('refresh', [
            'middleware' => 'jwt.refresh',
            function() {
                return response()->json([
                    'message' => 'By accessing this endpoint, you can refresh your access token at each request. Check out this response headers!'
                ]);
            }
        ]);

        $api->post('book/store', 'App\Api\V1\Controllers\BookController@store');
        $api->get('book', 'App\Api\V1\Controllers\BookController@index');
    });

    $api->group(['prefix' => 'public'], function(Router $api) {
        $api->get('test', 'App\\Api\\V1\\Controllers\\TestController@index');
    });

    $api->get('hello', function() {
        return response()->json([
            'message' => 'This is a simple example of item returned by your APIs. Everyone can see it.'
        ]);
    });


    Route::get('/test', function () {
        return JWTAuth::parseToken()->authenticate();
    });

//
//    $api->group(['middleware' => 'api.auth'], function ($api) {
//        $api->post('book/store', 'App\Api\V1\Controllers\BookController@store');
//        $api->get('book', 'App\Api\V1\Controllers\BookController@index');
//    });

});
