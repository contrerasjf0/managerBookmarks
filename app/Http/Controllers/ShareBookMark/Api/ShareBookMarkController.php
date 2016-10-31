<?php

namespace App\Http\Controllers\ShareBookMark\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ShareBookMark;
class ShareBookMarkController extends Controller
{
    
    public function store(Request $request){

    	$shareBookMark = new ShareBookMark;
    	$user = Auth::user();

    	$shareBookMark->bookmark_id = $request->get('bookmark_id');
    	$shareBookMark->share_user_id = $response->get('share_user_id');
    	$shareBookMark->user_id = $user->id;

    	$shareBookMark->save();

    	return response()->json([
    			'status' => '201',
    			'id' => $shareBookMark->id,
    			'message' => 'BookMark Share',
    		]);
    }	

    public function destroy($id){

    	$shareBookMark = ShareBookMark::findOrFail($id);

    	$id = $shareBookMark->id;

    	$shareBookMark->delete();

    	return response()->json([
    			'status' => '201',
    			'id' => $id,
    			'message' => 'BookMark Delete',
    		]);

    }
}
