<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderPizza extends Model
{
    protected $fillable = [
        'order_id', 'description', 'type', 'price'
    ];

    public const TYPE_CUSTOM = 'custom';
    public const TYPE_MENU_CUSTOMIZED = 'menu_customized';
    public const TYPE_MENU = 'menu';

    public function Order()
    {
        return $this->belongsTo(Order::class);
    }
}
