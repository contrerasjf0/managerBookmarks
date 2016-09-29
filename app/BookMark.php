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

    
}
