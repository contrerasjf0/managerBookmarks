<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tags";

    protected $fillable = [
    	"name"
    ];

    protected $guarded = [
    	"id",	
    ];

    public function bookMark(){
    	return $this->belongToMany('App\BookMark', 'book_mark_tag');
    }
}
