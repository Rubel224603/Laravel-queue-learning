@extends('layout.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-6">

                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-5">

                        <h2 class="text-center mb-1">Register Form</h2>
                        <span class="text-primary  text-center">{{ session('message') }}</span>

                        <form action = "{{ url('user/store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Name -->
                            <div class="mb-1">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter your name">
                            </div>

                            <!-- Email -->
                            <div class="mb-1">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control"
                                    placeholder="Enter your email">
                            </div>

                            <!-- Phone -->
                            <div class="mb-1">
                                <label class="form-label">Phone Number</label>
                                <input type="text" class="form-control" name="phone"
                                    placeholder="Enter phone number">
                            </div>
                            <div class="mb-1">
                                <label class="form-label">Password</label>
                                <input type="text" class="form-control" name="password"
                                    placeholder="Enter phone number">
                            </div>
                            <div class="mb-1">
                                <label class="form-label">Confirm Password</label>
                                <input type="text" class="form-control" name ="password_confirmation"
                                    placeholder="Enter phone number">
                            </div>


                            <div class="d-flex gap-3 mt-2">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>

                               
                            </div>

                        </form>
                        <div class="mt-2">
                            Already have an account?
                            <a href="{{url('/user-login')}}" class="text-decoration-none">Login</a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection