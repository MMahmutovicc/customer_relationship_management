@extends('layouts.app')

@section('content')

    <h1 class="view-title">Leave A Review</h1>


    <div class="justify-content-center" style="padding-top: 100px">

        @if (session('status'))

            <div class="alert alert-danger">

                    {{ session('status') }}

            </div>

        @endif

        <form action="{{ route('review.add') }}" method="post">

            @csrf

            <div class="row">
                
                <div class="col-25">
                    <label for="rating">Rating</label>
                </div>

                <div class="col-75">
                    <input id="rating" value="{{ old('rating') }}" type="number" class="form-control @error('rating') is-invalid @enderror" name="rating">

                    @error('rating')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                <label for="body">Review</label></div>

                <div class="col-75">
                    <input id="body" type="text" class="form-control @error('body') is-invalid @enderror" name="body">

                    @error('body')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <button type="submit" class="signinbutton">Submit Review</button>
            </div>
        </form>
    </div>
@endsection