<?php
// app/Models/Item.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $primaryKey = 'item_id';

    public $timestamps = false;

    protected $fillable = ['item_name', 'description', 'quantity', 'unit_id', 'category_id', 'date_stored'];

    // Relationship to category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    // Relationship to storage unit (if you want to add it, assuming unit_id is a foreign key)
    public function storageUnit()
    {
        return $this->belongsTo(StorageUnit::class, 'unit_id', 'unit_id');
    }
} 
