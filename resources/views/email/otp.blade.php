<!DOCTYPE html>
<html>
<head>
    <title>OTP Verification</title>
</head>
<body>
    <h2>Hello {{ $name }}!</h2>
    <p>Your OTP is: <strong>{{ $otp }}</strong></p>
    <p>This OTP is valid for 5 minutes.</p>
    <p>Thank you for registering with {{ config('app.name') }}.</p>
</body>
</html>