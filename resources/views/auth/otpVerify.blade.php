@extends('layout.master')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-4">Verify Opt-in</h5>
                       <span class="text-primary fw-bold">{{session('message')}}
                        </span> 
                        <form method="POST" action="/verify">
                            @csrf
                            <div class="mb-3">
                                <input type="text" 
                                       class="form-control text-center" 
                                       name="code" 
                                       placeholder="Enter verification code"
                                       style="font-size: 20px; letter-spacing: 5px;">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Verify</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection