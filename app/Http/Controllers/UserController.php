<?php

namespace App\Http\Controllers;

use app\User;

use Illuminate\Http\Request;

class UserController extends Controller
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
    public function index(){

        $User  = User::all();

        return "fine";

    }

    public function getUser($id){

        $User  = User::find($id);

        return response()->json($User);
    }

    public function createBook(Request $request){

        $this->validate($request, [
            'name' => 'required|unique:posts|max:255',
            'email' => 'required|email|unique:users'
        ]);

        $User = Book::create($request->all());

        return response()->json($User);

    }

    public function deleteBook($id){
        $Book  = Book::find($id);
        $Book->delete();

        return response()->json('deleted');
    }

    public function updateBook(Request $request,$id){
        $Book  = Book::find($id);
        $Book->title = $request->input('title');
        $Book->author = $request->input('author');
        $Book->isbn = $request->input('isbn');
        $Book->save();

        return response()->json($Book);
    }

    //
}
