@extends('layouts.app')
@section('content')
    <h1 class="view-title">Reviews</h1>
<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Customer</th>
                <th>Rating</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
                <tr>
                    <td>{{ $review->user->name }}</td>
                    <td>{{ $review->rating }}</td>
                    <td><a href="{{ route('user.review',$review) }}">See Review</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
