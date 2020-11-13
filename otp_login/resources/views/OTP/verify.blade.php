@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Enter OTP') }}</div>
                    @if($errors->count() > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                {{$error}}
                            @endforeach
                        </div>

                    @endif
                    <div class="card-body">
                        <form action="/verifyOTP" method="post">

                            @csrf
                            <label for="otp">Your otp</label>
                            <input type="text" name="otp" id="otp" class="form-control" required>
                            <br>
                            <input type="submit" value="Verify" class="btn btn-info" >



                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
