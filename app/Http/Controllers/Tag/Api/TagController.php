<?php

namespace App\Http\Controllers\Tag\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Tag\Api\StoreRequest;
use App\Http\Requests\Tag\Api\UpdateRequest;
use App\Http\Controllers\Controller;

use App\Tag;

class TagController extends Controller
{

    public function store(StoreRequest $request){
    	$tag = new Tag;
    	$user = Auth::user();

    	$tag->name = $request->get('name');
    	$tag->user_id = $user->id;

    	$tag->save();

    	return response()->json([
    			'status' => '201',
    			'id' => $tag->id,
    			'message' => '',
    		]);
    }

    public function update(UpdateRequest $request, $id){
    	$tag = Tag::findOrFail($id);

    	$tag->name = $request->get('name');

    	$tag->save();

    	return response()->json([
    			'status' => '201',
    			'id' => $tag->id,
    			'message' => '',
    		]);
    }

    public function destroy($id){
    	$tag = Tag::findOrFail($id);

    	$id = $tag->id;

    	$tag->destroy();

    	return response()->json([
    			'status' => '201',
    			'id' => $id,
    			'message' => '',
    		]);

    }
}
