<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use newrelic\DistributedTracePayload;

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

}
