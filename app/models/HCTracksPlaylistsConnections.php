<?php

namespace app\models;

use interactivesolutions\honeycombcore\models\HCModel;

class HCTracksPlaylistsConnections extends HCModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hc_tracks_playlists_connections';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['playlist_id', 'track_id'];
}