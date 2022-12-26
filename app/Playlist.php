<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PlaylistEntry;
use App\User;

class Playlist extends Model
{
    protected $fillable = ['name', 'user_id', 'is_private'];

    public function playlistEntries()
    {
        return $this->hasMany(PlaylistEntry::class,'playlist_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
