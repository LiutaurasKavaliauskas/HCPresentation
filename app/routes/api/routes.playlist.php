<?php

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
