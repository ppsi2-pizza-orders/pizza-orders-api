<?php

namespace App\Http\Controllers\MainRestaurant;

use App\Http\Controllers\ApiResourceController;
use Tymon\JWTAuth\Facades\JWTAuth;

use App\Models\Restaurant;
use App\Models\Review;
use App\Http\Requests\CreateReview;

class ReviewController extends ApiResourceController
{
    public function store(CreateReview $request, int $id)
    {
        $restaurant = Restaurant::findOrFail($id);

        $review = new Review();
        $review->restaurant_id = $restaurant->id;
        $review->user_id = JWTAuth::user()->id;
        $review->base_rating = $request->input('base_rating');
        $review->ingredients_rating = $request->input('ingredients_rating');
        $review->delivery_time_rating = $request->input('delivery_time_rating');
        $review->comment = $request->input('comment');
        $review->save();

        return $this->apiResource
            ->resource($review)
            ->pushMessage('Restaurant reviewed')
            ->response();
    }

    public function destroy(int $id)
    {
        $review = Review::findOrFail($id);
        $commentUser = $review->user_id;
        $currentUser = JWTAuth::user()->id;

        if ($currentUser == $commentUser) {
            if ($review->delete()) {
                return $this->apiResponse
                    ->pushMessage('Review deleted')
                    ->response();
            }
        }

        throw $this->apiException
            ->setStatusCode(400)
            ->pushMessage('Could not delete review');
    }
}
