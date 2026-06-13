@extends('layout.master')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
            <div class="card shadow-sm border border-secondary border-opacity-25 rounded-3">

                <div class="card-header bg-light py-3 border-bottom border-secondary border-opacity-25 text-secondary">
                    <span class="fs-6 fw-normal ps-2">Pay Fee</span>
                </div>

                <div class="card-body p-4">
                    <form action="#" method="POST">
                        @csrf <div class="row align-items-center py-2 border-bottom border-light-subtle">
                            <label class="col-sm-4 fw-bold text-dark mb-0">Student Name</label>
                            <div class="col-sm-8 text-secondary">Jon Du</div>
                        </div>

                        <div class="row align-items-center py-2 border-bottom border-light-subtle">
                            <label class="col-sm-4 fw-bold text-dark mb-0">Student DOB</label>
                            <div class="col-sm-8 text-secondary">03/03/2002</div>
                        </div>

                        <div class="row align-items-center py-2 border-bottom border-light-subtle">
                            <label class="col-sm-4 fw-bold text-dark mb-0">Student Fees</label>
                            <div class="col-sm-8 text-secondary">Rs.100</div>
                        </div>

                        <div class="row align-items-center py-3">
                            <label align-items-center for="paymentGateway" class="col-sm-4 fw-bold text-dark mb-0">Payment Gateway</label>
                            <div class="col-sm-8">
                                <select class="form-select text-secondary border border-secondary border-opacity-25" id="paymentGateway" name="payment_gateway" required>
                                    <option selected disabled value="">Select Payment Gateway</option>
                                    <option value="1">Razorpay</option>
                                    <option value="2">Paytm</option>
                                    <option value="3">Stripe</option>
                                </select>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold">Pay Fees</button>
                        </div>

                    </form>
                </div>

            </div>
            
        </div>
    </div>
</div>
@endsection