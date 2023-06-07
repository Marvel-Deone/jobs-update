    @extends('nav')
    @section('content')
            <form action="/register" class="col-4 rounded shadow d-flex flex-column mx-auto px-4 py-5 mt-5" method="POST">
                @csrf
               
                @if(isset($message))
                    <span class="alert alert-{{$insert ? 'success' : 'danger'}} text-center">{{$message}}</span>
                @endif

                <h3 class="text-center text-dark">Register</h3>
                <div class="mt-1">
                    <label for="" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control px-3 py-2 w-full" placeholder="Username">
                </div>
                <div class="mt-1">
                    <label for="" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control px-3 py-2 w-full" placeholder="example@gmail.com">
                </div>
                <div class="mt-1">
                    <label for="" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control px-3 py-2 w-full" placeholder="Password">
                </div>
                <button class="btn btn-primary w-100 mt-3 p-2">Create Account</button>

                <p class="mt-3 text-center">Already have an account? <a href="/home">Login</a></p>
            </form>

    @endsection

  