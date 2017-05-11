<?php

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
