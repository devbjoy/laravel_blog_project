<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;


class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function posts(){
        return $this->belongsToMany(Post::class);
    }

    public function sliders(){
        return $this->belongsToMany(Slider::class);
    }
    
    public function featuredNews(){
        return $this->belongsToMany(FeaturedNew::class);
    }
}
