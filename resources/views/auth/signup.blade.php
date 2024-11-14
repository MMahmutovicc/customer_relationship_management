@extends('layouts.app')

@section('content')

    <h1 class="view-title">Sign up</h1>


    <div class="justify-content-center" style="padding-top: 100px">

        @if (session('status'))

            <div class="alert alert-danger">

                    {{ session('status') }}

            </div>

        @endif

        <form action="{{ route('signup') }}" method="post">

            @csrf

            <div class="row">
                <div class="col-25">
                    <label for="name">Full Name</label>
                </div>
                
                <div class="col-75">
                    <input id="name" value="{{ old('name') }}" type="text" class="form-control @error('name') is-invalid @enderror" name="name">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="email">Email</label>
                </div>

                <div class="col-75">
                    <input id="email" value="{{ old('email') }}" type="text" class="form-control @error('email') is-invalid @enderror" name="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="password">Password</label>
                </div>

                <div class="col-75">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="password_confirmation">Confirm Password</label>
                </div>

                <div class="col-75">
                    <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation">

                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <button type="submit" class="signinbutton">Sign Up</button>
            </div>
        </form>
    </div>
@endsection