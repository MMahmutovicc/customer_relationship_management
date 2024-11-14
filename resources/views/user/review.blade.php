@extends('layouts.app')

@section('content')

    @if (auth()->user()->id == $review->user_id)
        <h1 class="view-title">Your Review</h1>
    @else
        <h1 class="view-title">{{ $review->user->name }}'s Review</h1>
    @endif
    <div class="justify-content-center" style="padding-top: 100px">

        <div>

            <div class="row">
                
                <div class="col-25">
                    <label for="rating">Rating:</label>
                </div>

                <div class="col-75">
                    {{ $review->rating }} {{ Str::plural('star', $review->rating) }} 
                </div>

            </div>

            <div class="row">
                <div class="col-25">
                <label for="body">Comment:</label></div>

                <div class="col-75">
                    {{ $review->body }}
                </div>
            </div>
        </div>
    </div>
@endsection