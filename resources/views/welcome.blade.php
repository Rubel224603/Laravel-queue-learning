<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Register Form</title>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('asset/css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-6">

                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-5">

                        <h2 class="text-center mb-1">Register Form</h2>
                        <span class="text-primary  text-center">{{session('message')}}</span>

                        <form action = "{{url('user/store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Name -->
                            <div class="mb-1">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter your name">
                            </div>

                            <!-- Email -->
                            <div class="mb-1">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter your email">
                            </div>

                            <!-- Phone -->
                            <div class="mb-1">
                                <label class="form-label">Phone Number</label>
                                <input type="text" class="form-control" name="phone" placeholder="Enter phone number">
                            </div>
                            <div class="mb-1">
                                <label class="form-label">Password</label>
                                <input type="text" class="form-control" name="password" placeholder="Enter phone number">
                            </div>
                            <div class="mb-1">
                                <label class="form-label">Confirm Password</label>
                                <input type="text" class="form-control" name ="password_confirmation" placeholder="Enter phone number">
                            </div>


                            <div class="d-flex gap-3 mt-2">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>

                                <button type="button" class="btn btn-success">
                                    Login
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>
