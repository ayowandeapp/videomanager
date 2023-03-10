<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Playlist;
use App\User;

class PlaylistEntry extends Model
{
    protected $guarded=[];

    public function playlist()
    {
        return $this->belongsTo(Playlist::class, 'playlist_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
