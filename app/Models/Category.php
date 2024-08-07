<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
    'name',
    // ,'slug'
    'description',
    // ,'status'
    // ,'popular'
    // ,'meta_title'
    // ,'meta_descrip'
    // ,'meta_keywords'
    'imgpath'
];
    
    use HasFactory;
    public function products(){
        
        return $this->hasMany(Product::class,'catid','id');
    }
}
