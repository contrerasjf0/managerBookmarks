<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShareBookMark extends Model
{
    protected $table = "share_book_marks";

    protected $fillable = [
    	"bookmark_id",
    	"share_user_id",
    	"user_id",
    ];

    protected $guarded = [
    	"id",
    ];

    public function users(){
    	return $this->belongsTo('App\User');
    }

    public function bookMark(){
    	return $this->hasOne('App\BookMark');
    }
}
