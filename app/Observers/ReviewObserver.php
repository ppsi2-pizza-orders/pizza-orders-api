<?php

namespace App\Observers;

use App\Models\Review;

class ReviewObserver
{
    public function creating(Review $review)
    {
        $average = ($review->base_rating + $review->ingredients_rating + $review->delivery_time_rating) / 3;
        $review->average_rating = number_format($average, 2);
    }
}
