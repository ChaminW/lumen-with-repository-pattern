<?php
/**
 * Created by PhpStorm.
 * User: chamin
 * Date: 10/19/16
 * Time: 6:41 PM
 */

namespace App\Modules\Base\Employee\Models;
use Illuminate\Database\Eloquent\Model;




class Employee extends Model
{
    protected $fillable = ['id','first_name','last_name', 'contact_num', 'address'];

    /**
     * @param array $fillable
     */
    public function setFillable($fillable)
    {
        $this->fillable = $fillable;
    }



}