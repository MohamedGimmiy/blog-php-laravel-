<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $dates = ['published_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function getRouteKeyName(){
        return 'slug';
    }

    public function getRouteKey(){
        return $this->slug;
    }
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

    public function getBodyHtmlAttribute($value)
    {
        return $this->body? Markdown::convertToHtml(e($this->body)): null;
    }


    public function scopeLatestFirst($query){
        return $query->orderBy('created_at' , 'desc');
    }

    public function scopePublished($query)
    {
        return $query->where('published_at' , '<=',Carbon::now());
    }
}
