@extends('layouts.app')

    @section('content')
        <form action="/jobs" class="col-5 rounded shadow d-flex flex-column mx-auto p-5 mt-5" method="post">
                    @csrf
                    @if(isset($message))
                        <span class="alert alert-{{$insert ? 'success' : 'danger'}} text-center">{{$message}}</span>
                    @endif
                    <h3 class="text-center text-dark">Post Job Update</h3>
                    <div class="mt-3">
                        <label for="" class="form-label">Job Title</label>
                        <input type="text" name="job_title" class="form-control px-3 py-2 w-full" placeholder="Job Title">
                    </div>

                        @if($errors->get('job_title') !==null) 
                            <span class="text-danger p-2">{{$errors->first('job_title')}}</span>
                        @endif

                    <div class="mt-3">
                        <label for="" class="form-label">Job Description</label>
                        <textarea  id="" cols="30" rows="2" name="job_description" class="form-control px-3 py-2 w-full" placeholder="Job Description"></textarea>
                        <!-- <textarea type="text" name="job_description" class="form-control px-3 py-2 w-full" placeholder="Job Description"></text-area> -->
                    </div>
                     
                    @if($errors->get('job_description') !==null) 
                            <span class="text-danger p-2">{{$errors->first('job_description')}}</span>
                    @endif

                    <div class="mt-3">
                        <label for="" class="form-label">Job Requirement</label>
                        <input type="text" name="job_requirement" class="form-control px-3 py-2 w-full" placeholder="Job Requirement">
                    </div>
                     
                    @if($errors->get('job_requirement') !==null) 
                            <span class="text-danger p-2">{{$errors->first('job_requirement')}}</span>
                    @endif

                    <div class="mt-3">
                        <label for="" class="form-label">Job Type</label>
                        <select name="job_type" id="" class="form-control">
                            <option value="remote">--</option>
                            <option value="remote">Remote</option>
                            <option value="hybrid">Hybrid</option>
                            <option value="onsite">Onsite</option>
                        </select>
                    </div>
                     
                    @if($errors->get('job_type') !==null) 
                            <span class="text-danger p-2">{{$errors->first('job_type')}}</span>
                    @endif

                    <div class="mt-3">
                        <label for="" class="form-label">Job Location</label>
                        <input type="text" name="job_location" class="form-control px-3 py-2 w-full" placeholder="Job Location">
                    </div>
                     
                    @if($errors->get('job_location') !==null) 
                            <span class="text-danger p-2">{{$errors->first('job_location')}}</span>
                    @endif

                    <div class="mt-3">
                        <label for="" class="form-label">Application Link</label>
                        <input type="text" name="link" class="form-control px-3 py-2 w-full" placeholder="Application Link">
                    </div>
                     
                    @if($errors->get('link') !==null) 
                            <span class="text-danger p-2">{{$errors->first('link')}}</span>
                    @endif

                    <button class="btn btn-primary w-100 mt-3 p-2">Post</button>
        </form>
    @endsection