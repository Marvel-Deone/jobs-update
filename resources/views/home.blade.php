@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}


                </div>
            </div>
        </div>

        @if(isset($message))
                    <span class="mt-3 alert alert-{{$delete ? 'success' : 'danger'}} text-center">{{$message}}</span>

                    @endif
            @if(isset($me))
                <h3 class="text-center mt-5">Your Jobs Update</h3>
            @endif
                <table class="table" style="margin-top: 5%;">
                    <thead class="table-dark">
                        <tr>
                            {{-- <th scope="col">#</th> --}}
                            <th scope="col">Username</th>
                            <th scope="col">Job Title</th>
                            <th scope="col">Job Description</th>
                            <th scope="col">Job Requirement</th>
                            <th scope="col">Job Type</th>
                            <th scope="col">Job Location</th>
                            <!-- <th scope="col">Job Location</th> -->
                            <!-- <th scope="col">Link to apply</th> -->
                            <th scope="col">Action</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($jobs as $job)
                    <a href="/jobs/{{$job->id}}">
                        <tr>
                            {{-- <td>{{$job->id}}</td> --}}
                            <td>{{$job->username}}</td>
                            <td>{{ $job['job_title']}}</td>
                            <td>{{ $job['job_desc']}}</td>
                            <td>{{ $job['job_req']}}</td>
                            <td>{{ $job['job_type']}}<td>
                            <!-- <td>{{ $job['job_type']}}<td> -->
                            <!-- <td>{{ $job['job_location']}}</td> -->
                                <!-- <td><a href={{$job['link']}} target="_blank" class="">{{$job['link']}}</a></td> -->
                                <td><a href="/jobs/{{$job->id}}" class="">View Details</a></td>
                                <td><a href="/jobs/{{$job->id}}/edit" class="">Edit</a></td>
                        </tr>
                    </a>
                    @endforeach
                    </tbody>
                </table>
    </div>
</div>
@endsection
