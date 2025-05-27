<?php
// app/Models/Category.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';  
    protected $primaryKey = 'category_id';  

    public $incrementing = true;    // pastikan ini true agar auto-increment berfungsi
    protected $keyType = 'int';     

    public $timestamps = false;  

    protected $fillable = ['category_name'];

    public function items()
    {
        return $this->hasMany(Item::class, 'category_id', 'category_id');
    }
}
