<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function department() {
        return $this->belongsTo(Department::class);
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
