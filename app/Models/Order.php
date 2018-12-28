<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    CONST STATUS_NEW = 'new';
    CONST STATUS_ACCEPTED = 'accepted';
    CONST STATUS_REALIZATION = 'realization';
    CONST STATUS_DELIVERY = 'delivery';
    CONST STATUS_FINISHED = 'finished';

    public $fillable = [
        'token', 'user_id', 'restaurant_id', 'pizza_id', 'price', 'delivery_address', 'phone_number', 'status'
    ];

    public function pizzas()
    {
        return $this->hasMany(OrderPizza::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setNextStatus(): self
    {
        switch($this->status) {
            case self::STATUS_NEW:
                $this->setStatusAccepted();
                break;
            case self::STATUS_ACCEPTED:
                $this->setStatusInRealization();
                break;
            case self::STATUS_REALIZATION:
                $this->setStatusForwardedToDelivery();
                break;
            case self::STATUS_DELIVERY:
                $this->setStatusFinished();
                break;
        }

        return $this;
    }

    public function setStatusAccepted(): self
    {
        $this->status = self::STATUS_ACCEPTED;
        return $this;
    }

    public function setStatusInRealization(): self
    {
        $this->status = self::STATUS_REALIZATION;
        return $this;
    }

    public function setStatusForwardedToDelivery(): self
    {
        $this->status = self::STATUS_DELIVERY;
        return $this;
    }

    public function setStatusFinished(): self
    {
        $this->status = self::STATUS_FINISHED;
        return $this;
    }

    public function isFinished(): bool
    {
        return $this->status === self::STATUS_FINISHED;
    }
}
