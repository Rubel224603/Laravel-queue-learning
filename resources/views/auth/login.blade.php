@extends('layout.master')
@section('content')
    <div class="container min-vh-100 d-flex align-items-center justify-content-center">
        <div class="card shadow" style="max-width: 400px; width: 100%;">
            <div class="card-body p-4">
                <h3 class="card-title text-center mb-4">User Login</h3>
                
                <form>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                     
                    </div>
               
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="enter password" required>
                    </div>
                    
                  
                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        <a href="{{url('/forget-password')}}" class="text-decoration-none">Forget password?</a>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100 mb-3">Login</button>
                    
                    
                    <div class="text-center">
                        <span>No Account? </span>
                        <a href="{{url('/user-register')}}" class="text-decoration-none">Signup Now</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection