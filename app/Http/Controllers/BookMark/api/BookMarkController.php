<?php

namespace App\Http\Controllers\BookMark\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\BookMark\api\RequestStore;
use Yajra\Datatables\Datatables;
use App\BookMark;
use App\Tag;
use Auth;

class BookMarkController extends Controller
{

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

    /**
     * 
     * Return the list resources for the dataTable
     * @return  Yajra\Datatables\Datatables
    */

    public function getListDataTable(){
        $bookMarks = BookMark::select(['id','name', 'url', 'note'])
                     ->where('user_id', Auth::user()->id)
                     ->where('folder_id', 0);

        return Datatables::of($bookMarks)->make();
    }

     /**
     * 
     * Return list of bookMarks of a folder
     * @return Yajra\Datatables\Datatables
    */

    public function getListForFolderDataTable($id){
        $bookMarks = BookMark::select(['id','name', 'url', 'note'])
                     ->where('folder_id', $id);

        return Datatables::of($bookMarks)->make();
    }

    private function storeTag(BookMark $bookMarkId, Array $tags){

        foreach ($tags as $tagName) {
           //where('legs', '>', 100)->firstOrFail();
           $tag = Tag::firstOrCreate(['name' => $tagName]);

           $bookMarkId->tags()->attach($tag);
        }
    }

    
}
