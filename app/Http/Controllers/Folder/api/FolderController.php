<?php

namespace App\Http\Controllers\Folder\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\Folder\api\RequestStore;

use App\Folder;
use Auth;
class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        //$folders = $user->folders;

        $folders = Folder::where('user_id', $user->id)
                         ->orderBy('name', 'desc')
                         ->get();

        return response()->json($folders, 200);
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

        $folder = new Folder;

        $folder->name = $request->input('name');
        $folder->description = $request->description;
        $folder->user_id = $user->id;

        $folder->save();

        return response()->json([
                    'id' => $folder->id
                ]);
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
}
