<?php

Route::group(['prefix' => env('HC_ADMIN_URL'), 'middleware' => ['web', 'auth']], function ()
{
    Route::get('tracks', ['as' => 'admin.tracks.index', 'middleware' => ['acl:tracks_list'], 'uses' => 'RadioTracksController@adminView']);

    Route::group(['prefix' => 'api/tracks'], function ()
    {
        Route::get('/', ['as' => 'admin.api.tracks', 'middleware' => ['acl:tracks_list'], 'uses' => 'RadioTracksController@listPage']);
        Route::get('list', ['as' => 'admin.api.tracks.list', 'middleware' => ['acl:tracks_list'], 'uses' => 'RadioTracksController@list']);
        Route::get('list/{timestamp}', ['as' => 'admin.api.tracks.list.update', 'middleware' => ['acl:tracks_list'], 'uses' => 'RadioTracksController@listUpdate']);
        Route::get('search', ['as' => 'admin.api.tracks.search', 'middleware' => ['acl:tracks_list'], 'uses' => 'RadioTracksController@listSearch']);
        Route::get('{id}', ['as' => 'admin.api.tracks.single', 'middleware' => ['acl:tracks_list'], 'uses' => 'RadioTracksController@getSingleRecord']);

        Route::post('{id}/duplicate', ['as' => 'admin.api.tracks.duplicate', 'middleware' => ['acl:tracks_update'], 'uses' => 'RadioTracksController@duplicate']);
        Route::post('restore', ['as' => 'admin.api.tracks.restore', 'middleware' => ['acl:tracks_update'], 'uses' => 'RadioTracksController@restore']);
        Route::post('merge', ['as' => 'admin.api.tracks.merge', 'middleware' => ['acl:tracks_update'], 'uses' => 'RadioTracksController@merge']);
        Route::post('/', ['middleware' => ['acl:tracks_create'], 'uses' => 'RadioTracksController@create']);

        Route::put('{id}', ['middleware' => ['acl:tracks_update'], 'uses' => 'RadioTracksController@update']);
        Route::put('{id}/strict', ['as' => 'admin.api.tracks.update.strict', 'middleware' => ['acl:tracks_update'], 'uses' => 'RadioTracksController@updateStrict']);

        Route::delete('{id}', ['middleware' => ['acl:tracks_delete'], 'uses' => 'RadioTracksController@delete']);
        Route::delete('/', ['middleware' => ['acl:tracks_delete'], 'uses' => 'RadioTracksController@delete']);
        Route::delete('{id}/force', ['as' => 'admin.api.tracks.force', 'middleware' => ['acl:tracks_force_delete'], 'uses' => 'RadioTracksController@forceDelete']);
        Route::delete('force', ['as' => 'admin.api.tracks.force.multi', 'middleware' => ['acl:tracks_force_delete'], 'uses' => 'RadioTracksController@forceDelete']);
    });
});
