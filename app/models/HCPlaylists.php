<?php

namespace app\models;

use interactivesolutions\honeycombcore\models\HCUuidModel;

class HCPlaylists extends HCUuidModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hc_playlists';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name'];

    public function track()
    {
        return $this->belongsToMany(HCTracks::class, HCTracksPlaylistsConnections::getTableName(), 'playlist_id', 'track_id');
    }
}