<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id,
 * @property int $userId,
 * @property int $restaurantId,
 * @property int $courierId
 * @property string $address,
 * @property string $orderedAt
 * @property string $status,
 * @property string $totalPrice,
 * @property string $deliveredAt
 */
class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'restaurant_id',
        'courier_id',
        'address',
        'ordered_at',
        'status',
        'total_price',
        'delivered_at'
    ];
}
