<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id,
 * @property string $name,
 * @property string $email,
 * @property boolean $status,
 * @property string $password,
 */
class Courier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'status',
        'password'
    ];
}
