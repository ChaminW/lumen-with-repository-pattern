<?php

namespace App\Modules\Base\Employee\Controllers;

use App\Http\Controllers\Controller;

use App\Modules\Base\Employee\Models\Employee;

use Log;

use Illuminate\Http\Request;

class EmployeeController extends Controller
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

    public function deleteEmployee($id){
        $Employee = Employee::find($id);
        $Employee->delete();

        return response()->json('Employee deleted');
    }

    public function updateEmployee(Request $request,$id){

        $Employee  = Employee::find($id);

        $Employee->first_name = $request->input('first_name');
        $Employee->last_name = $request->input('last_name');
        $Employee->contact_num = $request->input('contact_num');
        $Employee->address = $request->input('address');
        $Employee->save();

        return response()->json($Employee);
    }


}
