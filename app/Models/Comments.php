<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = ['username','content', 'pid'];

    use HasFactory;
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
