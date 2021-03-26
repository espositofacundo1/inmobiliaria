<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;



    //Relacion muchos a mucho

    public function user(){
        return $this->belongsToMany(User::class);
    }
    public function category(){
        return $this->belongsToMany(Category::class);
    }

    public function team(){
        return $this->belongsToMany(team::class);
    }
    
    
}
