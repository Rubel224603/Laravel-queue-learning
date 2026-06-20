@extends('layout.master')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-4"> Verify OTP</h5>
                        
                        {{--  Success Message --}}
                        @if(session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        
                     

                        {{--  Email Display (Current User) --}}
                        <div class="alert alert-info text-center">
                            <strong>OTP sent to:</strong> 
                            {{ session('verify_email') ?? 'No email found' }}
                        </div>

                        <form method="POST" action="{{ url('otp-verification') }}">
                            @csrf
                            
                            {{--  Hidden Email Field --}}
                            <input type="hidden" name="email" value="{{ session('verify_email') }}">

                            <div class="mb-3">
                                <label for="otp" class="form-label">Enter 6-digit OTP</label>
                                <input type="text" 
                                       class="form-control text-center" 
                                       id="otp"
                                       name="otp" 
                                       placeholder="######"
                                       maxlength="6"
                                       style="font-size: 20px; letter-spacing: 8px; font-weight: bold;"
                                       autofocus
                                       required>
                                @error('otp')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Verify OTP</button>
                        </form>

                        {{--  Resend OTP Button --}}
                        <div class="text-center mt-3">
                            <p class="mb-0">Didn't receive OTP? 
                                <a href="#" class="text-primary">
                                    Resend OTP
                                </a>
                            </p>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>

   
@endsection