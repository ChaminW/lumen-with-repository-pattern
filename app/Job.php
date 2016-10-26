<?php
/**
 * Created by PhpStorm.
 * User: chamin
 * Date: 10/19/16
 * Time: 6:41 PM
 */

namespace App;
use Illuminate\Database\Eloquent\Model;




class Job extends Model
{
    protected $fillable = ['id','job_title','salary'];
}