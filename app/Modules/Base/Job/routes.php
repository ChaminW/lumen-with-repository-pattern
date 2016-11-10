<?php
/**
 * Created by PhpStorm.
 * User: chamin
 * Date: 10/31/16
 * Time: 9:27 AM
 */
$app= app();

$app->group(['prefix' => 'api/job','module'=>'job','namespace' => 'App\Modules\Base\Job\Controllers'], function($app) {
    $app->get('/', 'JobController@show');
    $app->get('/{id}', 'JobController@getJob');
    $app->post('/', 'JobController@createJob');
    $app->put('/{id}', 'JobController@updateJob');
    $app->delete('/{id}', 'JobController@deleteJob');
});