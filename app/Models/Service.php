<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    public function features()
    {
        return $this->hasMany(ServiceFeature::class, 'service_id');
    }
}
