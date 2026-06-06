@extends('layout.master')
@section('content')
    <div class="card mx-auto mt-5" style="max-width: 400px;">
        <div class="card-body">
            <h5 class="card-title text-center mb-4">Change Password</h5>
            
            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Old Password">
            </div>
            
            <div class="mb-3">
                <input type="password" class="form-control" placeholder="New Password">
            </div>
            
            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Confirm New Password">
            </div>
            
            <button class="btn btn-primary w-100">Update Password</button>
            
            <div class="text-center mt-3">
                <a href="#" class="text-decoration-none small">Back to Profile</a>
            </div>
        </div>
    </div>
@endsection