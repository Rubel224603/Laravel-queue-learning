@extends('layout.master')
@section('content')
        <div class="row">
            
            <nav class="col-md-3 col-lg-2 bg-dark vh-100 p-3 d-flex flex-column justify-content-between position-sticky top-0">
                <div>
                    <div class="d-flex align-items-center mb-4 text-white text-decoration-none">
                        <i class="bi bi-speedometer2 fs-4 me-2 text-primary"></i>
                        <span class="fs-4 fw-bold">MyDash</span>
                    </div>
                    <hr class="text-secondary">
                    
                    <ul class="nav nav-pills flex-column gap-1">
                        <li class="nav-item">
                            <a href="#" class="nav-link active bg-primary" aria-current="page">
                                <i class="bi bi-house-door me-2"></i> Overview
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white-50 link-light">
                                <i class="bi bi-person me-2"></i> My Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white-50 link-light">
                                <i class="bi bi-journal-bookmark me-2"></i> My Courses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white-50 link-light">
                                <i class="bi bi-gear me-2"></i> Settings
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <hr class="text-secondary">
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle fs-4 me-2"></i>
                            <strong>{{ auth()->user()->name ?? 'User Name' }}</strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark shadow" aria-labelledby="userMenu">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 p-4">
                
                @if(session('message'))
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-3 mb-4 border-bottom">
                    <div>
                        <h1 class="h2 fw-bold text-dark">Welcome back, {{ auth()->user()->name ?? 'User' }}! 👋</h1>
                        <p class="text-muted mb-0">Your account is fully verified and secure.</p>
                    </div>
                    <div>
                        <span class="badge bg-white text-dark border p-2">
                            <i class="bi bi-calendar3 me-1 text-primary"></i> {{ now()->format('d M, Y') }}
                        </span>
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="card border-0 border-start border-primary border-4 shadow-sm">
                            <div class="card-body d-flex align-items-center justify-content-between p-4">
                                <div>
                                    <small class="text-muted text-uppercase fw-bold">Enrolled Courses</small>
                                    <h2 class="fw-bold m-0 mt-1">0</h2>
                                </div>
                                <div class="bg-primary bg-opacity-10 text-primary p-3 rounded-3">
                                    <i class="bi bi-book fs-3"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="card border-0 border-start border-success border-4 shadow-sm">
                            <div class="card-body d-flex align-items-center justify-content-between p-4">
                                <div>
                                    <small class="text-muted text-uppercase fw-bold">Certificates</small>
                                    <h2 class="fw-bold m-0 mt-1">0</h2>
                                </div>
                                <div class="bg-success bg-opacity-10 text-success p-3 rounded-3">
                                    <i class="bi bi-award fs-3"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="card border-0 border-start border-warning border-4 shadow-sm">
                            <div class="card-body d-flex align-items-center justify-content-between p-4">
                                <div>
                                    <small class="text-muted text-uppercase fw-bold">Account Status</small>
                                    <p class="text-success fw-bold m-0 mt-2 fs-5">Verified <i class="bi bi-patch-check-fill"></i></p>
                                </div>
                                <div class="bg-warning bg-opacity-10 text-warning p-3 rounded-3">
                                    <i class="bi bi-shield-check fs-3"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm p-5 text-center bg-white">
                    <div class="py-4">
                        <div class="bg-light d-inline-block p-4 rounded-circle mb-3">
                            <i class="bi bi-rocket-takeoff text-primary fs-1"></i>
                        </div>
                        <h3 class="fw-bold">Let's get started on your journey!</h3>
                        <p class="text-muted mx-auto" style="max-width: 500px;">
                            You have successfully verified your email address. Now you can explore your dashboard, customize your profile, and start browsing courses.
                        </p>
                        <a href="#" class="btn btn-primary px-4 py-2 mt-3 fw-bold shadow-sm">Explore Features</a>
                    </div>
                </div>

            </main>
        </div>
    
@endsection
