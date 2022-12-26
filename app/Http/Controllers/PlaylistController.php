<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Playlist;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $playlists = Playlist::with('playlistEntries')->where('user_id', Auth::user()->id)->orderBy('updated_at','desc')->get();
        return response()->json($playlists);
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
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required',
            'isprivate'=>'required']);
        //check
        $count = Playlist::where(['name'=>$data['name'],'user_id'=>Auth::user()->id])->count();
        if($count >0){
            return response()->json(['message'=>'Playlist '.$data['name']. ' already exists'],403);
        }


        $playlist = Playlist::create([
            'name'=> $data['name'],
            'user_id'=> Auth::user()->id,
            'is_private'=>$data['isprivate']
            ]);
        return response()->json($playlist);
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
