<?php

Route::group(['prefix' => 'api', 'middleware' => ['auth-apps']], function ()
{
    Route::group(['prefix' => 'v1/tracks'], function ()
    {
        Route::get('/', ['as' => 'api.v1.tracks', 'middleware' => ['acl-apps:api_v1_tracks_list'], 'uses' => 'RadioTracksController@listPage']);
        Route::get('list', ['as' => 'api.v1.tracks.list', 'middleware' => ['acl-apps:api_v1_tracks_list'], 'uses' => 'RadioTracksController@list']);
        Route::get('list/{timestamp}', ['as' => 'api.v1.tracks.list.update', 'middleware' => ['acl-apps:tracks_list'], 'uses' => 'RadioTracksController@listUpdate']);
        Route::get('search', ['as' => 'api.v1.tracks.search', 'middleware' => ['acl-apps:api_v1_tracks_list'], 'uses' => 'RadioTracksController@listSearch']);
        Route::get('{id}', ['as' => 'api.v1.tracks.single', 'middleware' => ['acl-apps:api_v1_tracks_list'], 'uses' => 'RadioTracksController@getSingleRecord']);

        Route::post('{id}/duplicate', ['as' => 'api.v1.tracks.duplicate', 'middleware' => ['acl-apps:api_v1_tracks_update'], 'uses' => 'RadioTracksController@duplicate']);
        Route::post('restore', ['as' => 'api.v1.tracks.restore', 'middleware' => ['acl-apps:api_v1_tracks_update'], 'uses' => 'RadioTracksController@restore']);
        Route::post('merge', ['as' => 'api.v1.tracks.merge', 'middleware' => ['acl-apps:api_v1_tracks_update'], 'uses' => 'RadioTracksController@merge']);
        Route::post('/', ['middleware' => ['acl-apps:api_v1_tracks_create'], 'uses' => 'RadioTracksController@create']);

        Route::put('{id}', ['middleware' => ['acl-apps:api_v1_tracks_update'], 'uses' => 'RadioTracksController@update']);
        Route::put('{id}/strict', ['as' => 'api.v1.tracks.update.strict', 'middleware' => ['acl-apps:api_v1_tracks_update'], 'uses' => 'RadioTracksController@updateStrict']);

        Route::delete('{id}', ['middleware' => ['acl-apps:api_v1_tracks_delete'], 'uses' => 'RadioTracksController@delete']);
        Route::delete('/', ['middleware' => ['acl-apps:api_v1_tracks_delete'], 'uses' => 'RadioTracksController@delete']);
        Route::delete('{id}/force', ['as' => 'api.v1.tracks.force', 'middleware' => ['acl-apps:api_v1_tracks_force_delete'], 'uses' => 'RadioTracksController@forceDelete']);
        Route::delete('force', ['as' => 'api.v1.tracks.force.multi', 'middleware' => ['acl-apps:api_v1_tracks_force_delete'], 'uses' => 'RadioTracksController@forceDelete']);
    });
});
