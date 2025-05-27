<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 
use App\Models\Item; // pastikan ini ditambahkan untuk relasi

class Storage extends Model
{
    // Nama tabel di database
    protected $table = 'storage_units';

    // Primary key custom
    protected $primaryKey = 'unit_id';

    // Menonaktifkan timestamps (created_at dan updated_at)
    public $timestamps = false;

    // Field yang bisa diisi massal
    protected $fillable = ['unit_name', 'location', 'size'];

    // Relasi one-to-many: satu storage unit memiliki banyak item
    public function items()
    {
        return $this->hasMany(Item::class, 'unit_id', 'unit_id');
    }
}
