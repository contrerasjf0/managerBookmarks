<?php

namespace App\Http\Controllers\\BookMark\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\BookMark\RegisterRequest;
use App\Http\Requests\BookMark\UpdateRequest;
use App\Http\Controllers\Controller;

use App\BookMark;

class BookMarkController extends Controller
{
    public function store(RegisterRequest $request){
    	$user = Auth::user();

    	$bookmark = new BookMark;


    	$bookmark->name = $request->get('name');
    	$bookmark->folder_id = $request->get('folder_id');
    	$bookmark->url = $request->get('url');
    	$bookmark->note = $request->get('note');
    	$bookmark->user_id = $user->id;

    	$bookmark->save();

    	return response()->json([
    			'status' => '201',
    			'id' => $bookmark->id,
    			'message' => 'Bookmark store',
    		]);
    }

    public function update(UpdateRequest $request, $id){

    	$bookmark = BookMark::findOrFail($id);

    	$bookmark->name = $request->get('name');
    	$bookmark->folder_id = $request->get('folder_id');
    	$bookmark->note = $request->get('note');

    	$bookmark->save();

    	return response()->json([
    			'status' => '201',
    			'id' => $bookmark->id,
    			'message' => 'Bookmark update',
    		]);
    }

    public function destroy($id){
    	$bookmark = BookMark::findOrFail($id);
    	$id = $bookmark->id;
    	$bookmark->delete();

    	return response()->json([
    			'status' => '201',
    			'id' => $id,
    			'message' => 'Bookmark delete',
    		]);
    }
}
