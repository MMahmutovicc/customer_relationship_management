<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\BadReview;
use App\Models\Review;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index() {
        return view('review.add');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'body' => 'required',
            'rating' => 'integer|required|max:5|min:1',

        ]);
        $review = Review::create([
            'body' => $validated['body'],
            'rating' => $validated['rating'],
            'user_id' => auth()->user()->id
        ]);
        if ($validated['rating'] <= 2) {
            $admins = User::where('utype', 'admin')->get();
            Mail::to($admins)->send(new BadReview(auth()->user(), $review));
        }
        return redirect() -> route('home');
    }

    public function review(Review $review) {
        return view('user.review',[
            'review' => $review
        ]);
    }

    public function all() {
        $reviews = Review::with('user')->get();
        return view('review.list', [
            'reviews' => $reviews
        ]);
    }
}
