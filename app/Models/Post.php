<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getCategory(){
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
