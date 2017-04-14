<?php

namespace App\Http\Controllers\BookMark\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\BookMark\api\RequestStore;
use App\BookMark;
use App\Tag;
use Auth;

class BookMarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestStore $request)
    {
        $user = Auth::user();

        $bookMark = new BookMark;

        $bookMark->name = $request->name;
        $bookMark->folder_id = $request->input('folder_id');
        $bookMark->url = $request->input('url');
        $bookMark->note = $request->input('note');
        $bookMark->user_id = $user->id;

       

        $bookMark->save();
        
        $tags = $request->input('tags');

        if(count($tags))
            $this->storeTag($bookMark, $tags);
        
            
        return response()->json([
            'id' => $bookMark->id
        ], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function storeTag(BookMark $bookMarkId, Array $tags){

        foreach ($tags as $tagName) {
           //where('legs', '>', 100)->firstOrFail();
           $tag = Tag::firstOrCreate(['name' => $tagName]);

           $bookMarkId->tags()->attach($tag);
        }
    }
}
