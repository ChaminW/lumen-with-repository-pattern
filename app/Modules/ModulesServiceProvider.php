<?php

namespace App\Modules;
/**
 * Created by PhpStorm.
 * User: chamin
 * Date: 10/31/16
 * Time: 10:21 AM
 */

class ModulesServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Will make sure that the required modules have been fully loaded
     * @return void
     */
    public function boot()
    {
        // For each of the registered modules, include their routes and Views


        $modules = config("module.modules");
//        print_r($modules);

        while (list(,$module) = each($modules)) {

            // Load the routes for each of the modules form Base code
            if(file_exists(__DIR__.'/Base/'.$module.'/routes.php')) {
                include __DIR__.'/Base/'.$module.'/routes.php';
            }

            // Load the routes for each of the modules from Custom code
            if(file_exists(__DIR__.'/Custom/'.$module.'/routes.php')) {
                include __DIR__.'/Custom/'.$module.'/routes.php';
            }

        }
    }

    public function register() {}

}