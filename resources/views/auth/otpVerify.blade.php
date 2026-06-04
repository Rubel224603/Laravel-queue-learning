<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Code</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-4">Verify Opt-in</h5>
                        
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
</body>
</html>