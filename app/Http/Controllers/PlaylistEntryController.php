<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Playlist;
use App\PlaylistEntry;

class PlaylistEntryController extends Controller
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
    public function store(Request $request)
    {
        $data = $request->validate([
            'playlist_id'=>'required|exists:playlists,id',
            'video_id'=>'required']);
        $pre = Playlist::find($data['playlist_id'])->playlistEntries();
        $check = $pre->where([
            'user_id'=>auth()->user()->id,
            'playlist_id'=> $data['playlist_id'],  
            'video_id'=>$data['video_id']
        ]);
        if($check->count() >0){
            return response()->json(['message'=>'Video Already Added to this Playlist'],403);
        }
        $entry = $pre->create([            
            'user_id'=>auth()->user()->id,
            'playlist_id'=> $data['playlist_id'],  
            'video_id'=>$data['video_id'],
        ]);
        return response()->json($entry);
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
