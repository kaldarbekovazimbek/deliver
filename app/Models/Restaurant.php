<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id,
 * @property string $name,
 * @property string $email,
 * @property string $password,
 */
class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'address',
        'password'
    ];

    public function menuItems():HasMany
    {
        return  $this->hasMany(MenuItem::class);
    }

    public function reviews():BelongsToMany
    {
        return $this->belongsToMany(Review::class, 'reviews');
    }
}
