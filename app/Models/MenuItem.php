<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id,
 * @property int $restaurantId,
 * @property string $nameOfFood,
 * @property string $description
 * @property float $price,
 */
class MenuItem extends Model
{
    use HasFactory;

    protected $table = 'menu_items';

    protected $fillable = [
        'restaurant_id',
        'name_of_food',
        'description',
        'price',
    ];

    public function orders():BelongsToMany
    {
        return  $this->belongsToMany(Order::class, 'order_items');
    }

    public function restaurant():BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }
}
