<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    protected $table = "folders";

    protected $fillable = [
    	"name",
    	"description",
    	"user_id",
    ];

    protected $guarded = [
    	"id",
    ];

    public function users(){
    	return $this->belongsTo('App\User');
    }
}
