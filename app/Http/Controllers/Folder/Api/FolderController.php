<?php

namespace App\Http\Controllers\Folder\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Folder\Api\StoreRequest;
use App\Http\Requests\Folder\Api\UpdateRequest;
use App\Http\Controllers\Controller;

use App\Folder;

class FolderController extends Controller
{
    public function store(StoreRequest $request){

    	$folder = new Folder;
    	$user = Auth::user();

    	$folder->name = $request->get('name');
    	$folder->description = $request->get('description');
    	$folder->user_id = $user->id;

    	$folder->save();

    	return response()->json([
    			'status' => '201',
    			'id' => $folder->id,
    			'messge' => 'Folder store',
    		]);
    }

    public function update(StoreRequest $request, $id){

    	$folder = Folder::findOrFail($id);

    	$folder->name = $request->get('name');
    	$folder->description = $request->get('description');

    	$folder->save();

    	return response()->json([
    			'status' => '201',
    			'id' => $folder->id,
    			'messge' => 'Folder Update',
    		]);
    }

    public function destroy($id){

    	$folder = Folder::findOrFail($id);

    	$id = $folder->id;

    	$folder->delete();

    	return response()->json([
    			'status' => '201',
    			'id' => $id,
    			'messge' => 'Folder Delete',
    		]);


    }
}
