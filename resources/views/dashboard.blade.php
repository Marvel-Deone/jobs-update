@extends('nav')

@section('content')
    <div class="mt-5">
            <h2 class="text-center">Job Updates</h2>
            @if(!isset($me))
                <a href="/listings/me">Your Jobs Update</a>
            @endif
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
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
                            <td>{{$job->id}}</td>
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
@endsection