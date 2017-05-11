<?php

namespace app\models;

use interactivesolutions\honeycombcore\models\HCModel;

class HCTrackAuthorConnections extends HCModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hc_track_author_connections';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['track_id', 'author_id'];
}