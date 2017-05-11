<?php

namespace app\models;

use interactivesolutions\honeycombacl\app\models\HCUsers;
use interactivesolutions\honeycombcore\models\HCUuidModel;

class HCTracks extends HCUuidModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hc_tracks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name'];

    public function author()
    {
        return $this->belongsToMany(HCUsers::class, HCTrackAuthorConnections::getTableName(), 'track_id', 'author_id');
    }
}