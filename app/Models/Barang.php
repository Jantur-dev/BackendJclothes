<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    /**
     * Get all of the pesanan_details for the Barang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pesanan_details(): HasMany
    {
        return $this->hasMany(PesananDetail::class, 'barang_id', 'id');
    }
}
