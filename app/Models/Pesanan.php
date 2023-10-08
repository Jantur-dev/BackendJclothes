<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pesanan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    /**
     * Get the user that owns the Pesanan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get all of the pesanan_details for the Pesanan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pesanan_details(): HasMany
    {
        return $this->hasMany(PesananDetail::class, 'pesanan_id', 'id');
    }
}
