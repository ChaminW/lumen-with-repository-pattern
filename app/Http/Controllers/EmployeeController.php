<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Http\Controllers\Controller;
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


        $User  = User::all();

        return response()->json($User);
    }

    public function getUser($id){

        $User  = User::find($id);

        return response()->json($User);

    }

    public function createUser(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'email' => 'email'
        ]);

        $User = User::create($request->all());

        return response()->json($User);

    }

    public function deleteUser($id){
        $user = User::find($id);
        $user->delete();

        return response()->json('deleted');
    }

    public function updateUser(Request $request,$id){

        $user  = User::find($id);
        $user->title = $request->input('name');
        $user->author = $request->input('email');
        $user->isbn = $request->input('address');
        $user->save();

        return response()->json($user);
    }

    //
}
