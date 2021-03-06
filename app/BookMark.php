<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookMark extends Model
{
    protected $table = 'book_marks';

    protected $fillable = [
    	'name', 'folder_id', 'url', 'note', 'user_id',
    ];

    protected $guarded = [
    	'id',
    ];

    public function users(){
    	return $this->belongsTo('App\User');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag', 'book_mark_tag');
    }
    
}
