<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [ 'id', 'user_id', 'status', 'total_price', 'address', 'phone', 'email', 'name', 'city'];
    use HasFactory;
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
