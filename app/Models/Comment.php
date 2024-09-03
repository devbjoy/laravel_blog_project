<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function commentReplies(){
        return $this->hasMany(CommentReply::class);
    }

    // public function commentReplyUser(){
    //     return $this->hasOneThrough(User::class,CommentReply::class,'comment_id','user_id','id','id');
    // }
}
