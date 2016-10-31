<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tags";

    protected $fillable = [
    	"name",
    	"user_id",
    ];

    protected $guarded = [
    	"id",	
    ];

    public function users(){
    	return $this->belong('App\User');
    }
}
