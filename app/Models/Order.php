<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function restaurant():BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function courier():BelongsTo
    {
        return $this->belongsTo(Courier::class);
    }

    public function menuItem(): BelongsToMany
    {
        return $this->belongsToMany(OrderItem::class, 'order_items');
    }
}
