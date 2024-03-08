<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id,
 * @property int $userId,
 * @property int $cardNumber,
 * @property float $balance,
 */
class BankCard extends Model
{
    use HasFactory;

    protected $table = 'bank_cards';

    protected $fillable = [
        'user_id',
        'card_number',
        'balance'
    ];
}
