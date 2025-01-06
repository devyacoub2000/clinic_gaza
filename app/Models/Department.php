<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
   
    protected $guarded = [];
    
    public function doctors() {
        return $this->hasMany(Doctor::class)->withDefault();
    }

    public function appointments() {
        return $this->hasMany(Appointment::class)->withDefault();
    }

     public function image() {
        return $this->morphOne(Image::class, 'imageable')->withDefault([
               'path' => 'images/noo_imagee.jpg',
        ])->where('type', 'main');;
    }

}
