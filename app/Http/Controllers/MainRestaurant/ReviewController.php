<?php

namespace App\Http\Controllers\MainRestaurant;

use App\Models\Restaurant;
use App\Models\Review;
use App\Http\Requests\CreateReview;
use App\Http\Resources\ReviewResource as FullReview;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    public function store(CreateReview $request, $id)
    {

        $restaurant = Restaurant::findOrFail($id);
        $review = new Review();
        $review->restaurant_id = $restaurant->id;
        $review->user_id = Auth::id();
        $review->base_rating = $request->input('base_rating');
        $review->ingredients_rating = $request->input('ingredients_rating');
        $review->delivery_time_rating = $request->input('delivery_time_rating');
        $review->comment = $request->input('comment');
        $review->save();
        return new FullReview($review);
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $commentUser = $review->user_id;
        $currentUser = Auth::id();
        if ($currentUser == $commentUser)
        {
            if ($review->delete())
            {
                return new FullReview($review);
            }
        }
    }
}
