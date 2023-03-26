<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public function author()
    {
        return $this->belongsTo(User::class);
    }
    public function getImageUrlAttribute()
    {
        $imageUrl = "";
        if(! is_null($this->image) ){
            $imagePath = public_path() . "/img/". $this->image;
            if(file_exists(public_path())) $imageUrl = asset('img/' . $this->image);
        }

        return $imageUrl;
    }
    public function getDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }


    public function scopeLatestFirst(){
        return $this->orderBy('created_at' , 'desc');
    }
}
