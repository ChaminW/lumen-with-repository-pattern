<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return 'Lumen RESTful API example';
});
//*************************************************************************
//Available Router Methods

//$app->get($uri, $callback);
//$app->post($uri, $callback);
//$app->put($uri, $callback);
//$app->patch($uri, $callback);
//$app->delete($uri, $callback);
//$app->options($uri, $callback);



//$app->get('api/user','UserController@index');
//$app->get('api/user/{id}','UserController@getUser');
//$app->post('api/user','UserController@createUser');
//$app->put('api/user/{id}','UserController@updateUser');
//$app->delete('api/user/{id}','UserController@deleteUser');


$app->group(['prefix' => 'api/user','namespace' => 'App\Http\Controllers'], function($app) {
    $app->get('/', 'UserController@show');
    $app->get('/{id}', 'UserController@getUser');
    $app->post('/', 'UserController@createUser');
    $app->put('/{id}', 'UserController@updateUser');
    $app->delete('/{id}', 'UserController@deleteUser');
});

$app->group(['prefix' => 'api/employee','namespace' => 'App\Http\Controllers'], function($app) {
    $app->get('/', 'EmployeeController@show');
    $app->get('/{id}', 'EmployeeController@getEmployee');
    $app->post('/', 'EmployeeController@createEmployee');
    $app->put('/{id}', 'EmployeeController@updateEmployee');
    $app->delete('/{id}', 'EmployeeController@deleteEmployee');
});

$app->group(['prefix' => 'api/job','namespace' => 'App\Http\Controllers'], function($app) {
    $app->get('/', 'JobController@show');
    $app->get('/{id}', 'JobController@getJob');
    $app->post('/', 'JobController@createJob');
    $app->put('/{id}', 'JobController@updateJob');
    $app->delete('/{id}', 'JobController@deleteJob');
});

//*************************************************************************
// dynamic routing
$app->get('user/{id}', function ($id) {
    return 'User '.$id;
});

$app->get('user/{id}/task/{taskId}', function ($id,$taskId) {
    return 'User id is '.$id." and Task id is ".$taskId;
});

//******************************************************************************
// Named routes
$app->get('profile', ['as' => 'profile', function () {
    return "profile URI";
}]);

// Generating Redirects
$app->get('redsatprofile', function () {

    return redirect()->route('profile');
});

//******************************************************************************
//route groups

//middleware sharing among route group
$app->group(['middleware' => 'ExampleMiddleware'], function () use ($app) {
    $app->get('/group', function ()    {
        // Uses Auth Middleware
        return "group URI";
    });


});

//namespace sharing among route group
$app->group(['namespace' => 'App\Http\Controllers'], function() use ($app)
{
    $app->get('/namespaces', function ()    {
        // Uses Controllers Within The "App\Http\Controllers" Namespace
        return "nameSpaces URI";
    });
});

//Route Prefixes for route group

$app->group(['prefix' => 'accounts/{account_id}'], function () use ($app) {
    $app->get('detail', function ($accountId)    {
        // Matches The "/accounts/{account_id}/detail" URL
        return 'detail URI of account '.$accountId;
    });

    $app->get('credit', function ($accountId)    {
        // Matches The "/accounts/{account_id}/credit" URL
        return 'credit URI of account '.$accountId;
    });
});

