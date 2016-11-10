<?php

namespace App\Modules\Base\Job\Controllers;


use App\Events\JobAddedEvent;

use App\Http\Controllers\Controller;
use App\Modules\Base\Job\Models;
use App\Modules\Base\Job\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;


class JobController extends Controller
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


        $Job  = Job::all();

        return response()->json($Job);
    }

    public function getJob($id){

        $Job  = Job::find($id);

        return response()->json($Job);

    }

    public function createJob(Request $request){

        $this->validate($request, [
            'job_title' => 'required'
        ]);

        $Job = Job::create($request->all());



        return response()->json($Job);

    }

    public function deleteJob($id){
        $Job = Job::find($id);
        $Job->delete();

        return response()->json('Job deleted');
    }

    public function updateJob(Request $request,$id){

        $Job  = Job::find($id);

        $Job->title = $request->input('job_title');
        $Job->author = $request->input('salary');
        $Job->save();

        return response()->json($Job);
    }


}
