<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table ='blog_posts_cars';

    protected $fillable = ['car', 'blog_posts_id'];

   


    // A car belongs to a blogpost member
    public function blogs(){

        return $this->belongsTo(Blog::class);
    } 
}
