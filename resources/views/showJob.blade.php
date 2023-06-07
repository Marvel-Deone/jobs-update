    @extends('layouts.app')

    @section('content')
    <div class="p-5">
        <div class="card col-4">
            <div class="card-body">
                <h5 class="card-title">{{ $job['job_title']}}</h5>
                <p class="card-text">{{ $job['job_desc']}}</p>
                <p class="card-text"><strong>Requirement-</strong> <span class="text-capitalize">{{ $job['job_req']}}</span></p>
                <p class="card-text"><strong>Type-</strong>  <span class="text-capitalize"> {{ $job['job_type']}} </span></p>
                <p class="card-text"><strong>Location- </strong> <span class="text-capitalize"> {{ $job['job_location']}} </span></p>
                <div class="row px-1">
                    <a href={{$job['link']}} target="_blank" class="btn btn-primary col-3">Apply Now</a>

                    <form action="/jobs/{{$job->id}}" class="col-6" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger p-2">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection