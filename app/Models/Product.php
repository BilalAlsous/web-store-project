<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','quantity','price','description','imgpath', 'catid'];

    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function productImage(){
        return $this->hasMany(ProductImage::class);
    }
    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
}
