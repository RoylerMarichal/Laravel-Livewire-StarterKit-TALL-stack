<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function invoice(){
        return $this->hasOne(Invoice::class,'order_id');
    }
}
