<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $appends = ['image_path'];

     public function getImagePathAttribute()
     {
         return asset('uploads/chefs_images/' . $this->image);
 
     }//end of get image path
}
