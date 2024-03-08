<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id,
 * @property int $oderId,
 * @property int $menuItemId,
 * @property int $quantity,
 * @property float $price,
 */
class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';

    protected $fillable = [
        'order_id',
        'menu_item_id',
        'quantity',
        'price',
    ];
}
