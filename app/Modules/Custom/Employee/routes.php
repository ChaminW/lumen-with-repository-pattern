<?php
/**
 * Created by PhpStorm.
 * User: chamin
 * Date: 10/31/16
 * Time: 9:27 AM
 */


$app =app();

$app->group(array('prefix' => 'api/v2/employee','module'=>'employee','namespace' => 'App\Modules\Custom\Employee\Controllers'), function($app)  {

    $app->get('/', 'CustomEmployeeController@show');
    $app->get('/{id}', 'CustomEmployeeController@getEmployee');
    $app->post('/', 'CustomEmployeeController@createEmployee');
    $app->put('/{id}', 'CustomEmployeeController@updateEmployee');
    $app->delete('/{id}', 'CustomEmployeeController@deleteEmployee');
});