<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Restaurant;

use App\Http\Controllers\ApiResourceController;

class RestaurantController extends ApiResourceController
{
    public function index(Request $request)
    {
        return $this->apiResource->response($request);
    }

    public function publish($id) {
        $restaurant = Restaurant::findOrFail($id);

        if (!$restaurant->visible) {
            throw $this->apiException
                ->setStatusCode(400)
                ->pushMessage('Can not confirm restaurant because status is set to private by owner');
        }

        if ($restaurant->confirmed) {
            throw $this->apiException
                ->setStatusCode(400)
                ->pushMessage('Restaurant already confirmed');
        }

        $restaurant->update(['confirmed' => true]);

        return $this->apiResponse
            ->pushMessage('Restaurant status changed to public')
            ->response();
    }

    public function hide($id)
    {
        Restaurant::findOrFail($id)->update(['confirmed' => false]);

        return $this->apiResponse
            ->pushMessage('Restaurant status changed to unconfirmed')
            ->response();
    }

}


