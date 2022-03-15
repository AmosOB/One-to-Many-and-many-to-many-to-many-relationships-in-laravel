<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table ='blog_posts';

   protected $fillable = [
 'name', 'description'
   ];
    

// A blogpost member has any cars
    public function cars(){
        return $this->hasMany(Car::class)->latest();
    } 
}
