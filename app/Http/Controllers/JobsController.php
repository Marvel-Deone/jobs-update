<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobs;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $jobs = Jobs::get();
        // return $jobs;
        // return view("dashboard", compact('jobs'));
        $jobs = Jobs::join('users', 'users.id', 'jobs.users_id')->get();
        return view("home", compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('postJobs');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'job_title' => 'required|max:50|min:10',
            'job_description' => 'required|max:100',
            'job_requirement' => 'required',
            'job_type' => 'required',
            'job_location' => 'required',
            'link' => 'required|url',
        ]);

        if ($validator->fails()) {
            // return $validator->errors()->first('job_title');
            return view('postjobs')->with('errors', $validator->errors());
        } else {
            $jobs = new Jobs;
            $jobs->users_id = Auth::user()->id;
            $jobs->job_title = $request->job_title;
            $jobs->job_desc = $request->job_description;
            $jobs->job_req = $request->job_requirement;
            $jobs->job_type = $request->job_type;
            $jobs->job_location = $request->job_location;
            $jobs->link = $request->link;

            $save = $jobs->save();

            // return $save;

            if ($save) {
                return view("postjobs")->with('message', 'Your job update has been posted successfully.')->with('insert', true);
            } else {
                return view("postjobs")->with('message', 'An error occurred while saving the job update, please try again.')->with('insert', false);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $job = Jobs::where('id', '=', $id)->first();

        return $job;
        // if ($job) {
        //     return view("showJob")->with('job', $job);
        //     // return view("hone")->with('job', $job);
        // } else {
        // }
        // return "Job not found";
    }

    public function showUserJobs()
    {
        $jobs = User::find(Auth::user()->user_id)->jobs;
        // return $jobs;
        return view('home')->with('jobs', $jobs)->with('me', true);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $job = Jobs::where('id', '=', $id)->first();
        return view("editJob")->with('job', $job);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        Jobs::where('id', $id)->update([
            "job_title" => $request->job_title,
            "job_desc" => $request->job_description,
            "job_req" => $request->job_requirement,
            "job_type" => $request->job_type,
            "job_location" => $request->job_location,
            "link" => $request->link
        ]);

        return redirect('/jobs');
        // $validator = Validator::make($request->all(), [
        //     'job_title' => 'required|max:50|min:10',
        //     'job_description' => 'required|max:100',
        //     'job_requirement' => 'required',
        //     'job_type' => 'required',
        //     'job_location' => 'required',
        //     'link' => 'required|url',
        // ]);

        // if ($validator->fails()) {
        //     // return $validator->errors()->first('job_title');
        //     return view('postjobs')->with('errors', $validator->errors());
        // }else {
        //     $job = Jobs::where('id', $id)->update([
        //         "job_title" => $request->job_title,
        //         "job_desc" => $request->job_description,
        //         "job_req" => $request->job_requirement,
        //         "job_type" => $request->job_type,
        //         "job_location" => $request->job_location,
        //         "link" => $request->link
        //     ]);

        //     return $job;
        // }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $job = Jobs::where('id', $id)->first();
        $jobs = Jobs::get();
        // return $job;
        if ($job->users_id == Auth::user()->id) {
            $delete = Jobs::where('id', $id)->delete();
            // return Redirect::back('/home')->with(['msg', 'The Message']);
            // return view('home')->with('message', 'Jobs update deleted successfully')->with('delete', true)->with('jobs', $jobs);
            return redirect('home')->with('message', 'Hello');
        } else {
            return view('home')->with('message', 'You cannot delete this job update because it was not created by you')->with('delete', false)->with('jobs', $jobs);
        }
    }
}
