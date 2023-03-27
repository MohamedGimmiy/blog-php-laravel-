<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $dates = ['published_at'];
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
        return is_null($this->published_at) ? '' : Carbon::parse($this->published_at)->diffForHumans();
    }


    public function scopeLatestFirst($query){
        return $query->orderBy('created_at' , 'desc');
    }

    public function scopePublished($query)
    {
        return $query->where('published_at' , '<=',Carbon::now());
    }
}
