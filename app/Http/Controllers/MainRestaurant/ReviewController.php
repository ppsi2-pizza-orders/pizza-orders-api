<?php

namespace App\Http\Controllers\MainRestaurant;

use JWTAuth;
use App\Models\Restaurant;
use App\Models\Review;
use App\Http\Requests\CreateReview;
use App\Http\Controllers\ApiResourceController;

class ReviewController extends ApiResourceController
{
    public function store(CreateReview $request, int $id)
    {
        $restaurant = Restaurant::findOrFail($id);

        $review = Review::create([
            'restaurant_id' => $restaurant->id,
            'user_id' => JWTAuth::user()->id,
            'base_rating' => $request->input('base_rating'),
            'ingredients_rating' => $request->input('ingredients_rating'),
            'delivery_time_rating' => $request->input('delivery_time_rating'),
            'comment' => $request->input('comment')
        ]);

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

        if ($currentUser == $commentUser && $review->delete()) {
            return $this->apiResponse
                ->pushMessage('Review deleted')
                ->response();
        }

        throw $this->apiException
            ->setStatusCode(400)
            ->pushMessage('Could not delete review');
    }
}
