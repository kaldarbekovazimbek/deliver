<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id,
 * @property int $userId
 * @property int $restaurantId
 * @property string $comment,
 * @property int $rating
 */
class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'restaurant_id',
        'comment',
        'rating',
    ];
}
