<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function create(Request $request)
    {
        $review = new Review();
        $review->product_id = $request->input("product_id");
        $review->user_id = $request->input('user_id');
        $review->rating = $request->input('rating');
        $review->comments = $request->input('comment');
        $review->save();        
        return redirect()->back();
    }
    public function destroy($review)
    {   
        $review = Review::find($review);
        if($review){
            $review->delete();
            return redirect()->back()->with('success', 'Comment deleted successfully.');
        }
        else {
            return redirect()->back()->with('error', 'Invalid comment identifier.');
        }
    }
    public function index()
    {
        $reviews = Review::all();
        return view('reviews.index', compact('reviews'));
    }
}
