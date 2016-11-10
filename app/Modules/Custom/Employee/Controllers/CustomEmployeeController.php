<?php

namespace App\Modules\Custom\Employee\Controllers;



use App\Modules\Base\Employee\Controllers\EmployeeController;


use App\Modules\Custom\Employee\Models\CustomEmployee as Employee ;
use Log;

use Illuminate\Http\Request;

class CustomEmployeeController extends EmployeeController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        //
//    }
    public function show(){


        $Employee  = Employee::all();

        return response()->json($Employee);
    }

    public function getEmployee($id){

        $Employee  = Employee::find($id);

        Log::info('Getting Employee: '.$Employee);

        return response()->json($Employee);

    }

    public function createEmployee(Request $request){

        $this->validate($request, [
            'first_name' => 'required'
        ]);

        $Employee = Employee::create($request->all());

//        Log::info('Adding Employee: '.$Employee);

        return response()->json($Employee);

    }



    public function updateEmployee(Request $request,$id){

        $Employee  = Employee::find($id);

        $Employee->first_name = $request->input('first_name');
        $Employee->last_name = $request->input('last_name');
        $Employee->contact_num = $request->input('contact_num');
        $Employee->address = $request->input('address');

        $Employee->address = $request->input('date_of_birth');
        $Employee->save();

        return response()->json($Employee);
    }


}
