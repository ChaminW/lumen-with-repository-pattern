<?php
/**
 * Created by PhpStorm.
 * User: chamin
 * Date: 10/31/16
 * Time: 9:27 AM
 */


$app =app();

$app->group(array('prefix' => 'api/employee','module'=>'employee','namespace' => 'App\Modules\Base\Employee\Controllers'), function($app)  {

    $app->get('/', 'EmployeeController@show');
    $app->get('/{id}', 'EmployeeController@getEmployee');
    $app->post('/', 'EmployeeController@createEmployee');
    $app->put('/{id}', 'EmployeeController@updateEmployee');
    $app->delete('/{id}', 'EmployeeController@deleteEmployee');
});