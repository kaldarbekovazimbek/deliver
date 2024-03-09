<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
