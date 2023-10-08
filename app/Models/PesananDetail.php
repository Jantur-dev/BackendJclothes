<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PesananDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    /**
     * Get the user that owns the PesananDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function barang(): BelongsTo
    {
        return $this->belongsTo(barang::class, 'barang_id', 'id');
    }

    /**
     * Get the pesanan that owns the PesananDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pesanan(): BelongsTo
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id', 'id');
    }
}
