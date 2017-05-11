<?php

//html/HCPresentation/app/routes/admin/routes.playlist.php


Route::group(['prefix' => env('HC_ADMIN_URL'), 'middleware' => ['web', 'auth']], function ()
{
    Route::get('playlist', ['as' => 'admin.playlist.index', 'middleware' => ['acl:playlist_list'], 'uses' => 'RadioPlaylistsController@adminView']);

    Route::group(['prefix' => 'api/playlist'], function ()
    {
        Route::get('/', ['as' => 'admin.api.playlist', 'middleware' => ['acl:playlist_list'], 'uses' => 'RadioPlaylistsController@listPage']);
        Route::get('list', ['as' => 'admin.api.playlist.list', 'middleware' => ['acl:playlist_list'], 'uses' => 'RadioPlaylistsController@list']);
        Route::get('list/{timestamp}', ['as' => 'admin.api.playlist.list.update', 'middleware' => ['acl:playlist_list'], 'uses' => 'RadioPlaylistsController@listUpdate']);
        Route::get('search', ['as' => 'admin.api.playlist.search', 'middleware' => ['acl:playlist_list'], 'uses' => 'RadioPlaylistsController@listSearch']);
        Route::get('{id}', ['as' => 'admin.api.playlist.single', 'middleware' => ['acl:playlist_list'], 'uses' => 'RadioPlaylistsController@getSingleRecord']);

        Route::post('{id}/duplicate', ['as' => 'admin.api.playlist.duplicate', 'middleware' => ['acl:playlist_update'], 'uses' => 'RadioPlaylistsController@duplicate']);
        Route::post('restore', ['as' => 'admin.api.playlist.restore', 'middleware' => ['acl:playlist_update'], 'uses' => 'RadioPlaylistsController@restore']);
        Route::post('merge', ['as' => 'admin.api.playlist.merge', 'middleware' => ['acl:playlist_update'], 'uses' => 'RadioPlaylistsController@merge']);
        Route::post('/', ['middleware' => ['acl:playlist_create'], 'uses' => 'RadioPlaylistsController@create']);

        Route::put('{id}', ['middleware' => ['acl:playlist_update'], 'uses' => 'RadioPlaylistsController@update']);
        Route::put('{id}/strict', ['as' => 'admin.api.playlist.update.strict', 'middleware' => ['acl:playlist_update'], 'uses' => 'RadioPlaylistsController@updateStrict']);

        Route::delete('{id}', ['middleware' => ['acl:playlist_delete'], 'uses' => 'RadioPlaylistsController@delete']);
        Route::delete('/', ['middleware' => ['acl:playlist_delete'], 'uses' => 'RadioPlaylistsController@delete']);
        Route::delete('{id}/force', ['as' => 'admin.api.playlist.force', 'middleware' => ['acl:playlist_force_delete'], 'uses' => 'RadioPlaylistsController@forceDelete']);
        Route::delete('force', ['as' => 'admin.api.playlist.force.multi', 'middleware' => ['acl:playlist_force_delete'], 'uses' => 'RadioPlaylistsController@forceDelete']);
    });
});


//html/HCPresentation/app/routes/admin/routes.tracks.php


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


//html/HCPresentation/app/routes/api/routes.playlist.php


Route::group(['prefix' => 'api', 'middleware' => ['auth-apps']], function ()
{
    Route::group(['prefix' => 'v1/playlist'], function ()
    {
        Route::get('/', ['as' => 'api.v1.playlist', 'middleware' => ['acl-apps:api_v1_playlist_list'], 'uses' => 'RadioPlaylistsController@listPage']);
        Route::get('list', ['as' => 'api.v1.playlist.list', 'middleware' => ['acl-apps:api_v1_playlist_list'], 'uses' => 'RadioPlaylistsController@list']);
        Route::get('list/{timestamp}', ['as' => 'api.v1.playlist.list.update', 'middleware' => ['acl-apps:playlist_list'], 'uses' => 'RadioPlaylistsController@listUpdate']);
        Route::get('search', ['as' => 'api.v1.playlist.search', 'middleware' => ['acl-apps:api_v1_playlist_list'], 'uses' => 'RadioPlaylistsController@listSearch']);
        Route::get('{id}', ['as' => 'api.v1.playlist.single', 'middleware' => ['acl-apps:api_v1_playlist_list'], 'uses' => 'RadioPlaylistsController@getSingleRecord']);

        Route::post('{id}/duplicate', ['as' => 'api.v1.playlist.duplicate', 'middleware' => ['acl-apps:api_v1_playlist_update'], 'uses' => 'RadioPlaylistsController@duplicate']);
        Route::post('restore', ['as' => 'api.v1.playlist.restore', 'middleware' => ['acl-apps:api_v1_playlist_update'], 'uses' => 'RadioPlaylistsController@restore']);
        Route::post('merge', ['as' => 'api.v1.playlist.merge', 'middleware' => ['acl-apps:api_v1_playlist_update'], 'uses' => 'RadioPlaylistsController@merge']);
        Route::post('/', ['middleware' => ['acl-apps:api_v1_playlist_create'], 'uses' => 'RadioPlaylistsController@create']);

        Route::put('{id}', ['middleware' => ['acl-apps:api_v1_playlist_update'], 'uses' => 'RadioPlaylistsController@update']);
        Route::put('{id}/strict', ['as' => 'api.v1.playlist.update.strict', 'middleware' => ['acl-apps:api_v1_playlist_update'], 'uses' => 'RadioPlaylistsController@updateStrict']);

        Route::delete('{id}', ['middleware' => ['acl-apps:api_v1_playlist_delete'], 'uses' => 'RadioPlaylistsController@delete']);
        Route::delete('/', ['middleware' => ['acl-apps:api_v1_playlist_delete'], 'uses' => 'RadioPlaylistsController@delete']);
        Route::delete('{id}/force', ['as' => 'api.v1.playlist.force', 'middleware' => ['acl-apps:api_v1_playlist_force_delete'], 'uses' => 'RadioPlaylistsController@forceDelete']);
        Route::delete('force', ['as' => 'api.v1.playlist.force.multi', 'middleware' => ['acl-apps:api_v1_playlist_force_delete'], 'uses' => 'RadioPlaylistsController@forceDelete']);
    });
});


//html/HCPresentation/app/routes/api/routes.tracks.php


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

