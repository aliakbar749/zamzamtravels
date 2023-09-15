<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service_Category extends Model
{
    use HasFactory;

    

    public function tags()
    {
        return $this->hasMany(Tag::class, 'tracking_id');
    }
    public function service()
    {
        return $this->hasMany(Service::class);
    }
}
