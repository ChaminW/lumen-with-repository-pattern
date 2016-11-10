<?php
/**
 * Created by PhpStorm.
 * User: chamin
 * Date: 10/19/16
 * Time: 6:41 PM
 */

namespace App\Modules\Custom\Employee\Models;

use App\Modules\Base\Employee\Models\Employee;





class CustomEmployee extends Employee
{
    protected $fillable = ['id','first_name','last_name', 'contact_num', 'address','date_of_birth'];

}