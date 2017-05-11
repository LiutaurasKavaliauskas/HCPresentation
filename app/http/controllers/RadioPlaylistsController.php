<?php namespace app\http\controllers;

use app\models\HCTracksPlaylistsConnections;
use Illuminate\Database\Eloquent\Builder;
use interactivesolutions\honeycombcore\http\controllers\HCBaseController;
use app\models\HCPlaylists;
use app\validators\RadioPlaylistsValidator;

class RadioPlaylistsController extends HCBaseController
{

    //TODO recordsPerPage setting

    /**
     * Returning configured admin view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminView()
    {
        $config = [
            'title' => trans('playlist.page_title'),
            'listURL' => route('admin.api.playlist'),
            'newFormUrl' => route('admin.api.form-manager', ['playlist-new']),
            'editFormUrl' => route('admin.api.form-manager', ['playlist-edit']),
            'imagesUrl' => route('resource.get', ['/']),
            'headers' => $this->getAdminListHeader(),
        ];

        if ($this->user()->can('playlist_create'))
            $config['actions'][] = 'new';

        if ($this->user()->can('playlist_update')) {
            $config['actions'][] = 'update';
            $config['actions'][] = 'restore';
        }

        if ($this->user()->can('playlist_delete'))
            $config['actions'][] = 'delete';

        $config['actions'][] = 'search';
        $config['filters'] = $this->getFilters();

        return view('HCCoreUI::admin.content.list', ['config' => $config]);
    }

    /**
     * Creating Admin List Header based on Main Table
     *
     * @return array
     */
    public function getAdminListHeader()
    {
        return [
            'name' => [
                "type" => "text",
                "label" => trans('playlist.name'),
            ],

        ];
    }

    /**
     * Create item
     *
     * @return mixed
     */
    protected function __create()
    {
        $data = $this->getInputData();

        $record = HCPlaylists::create(array_get($data, 'record'));

        foreach(array_get($data, 'record.track') as $track)
        HCTracksPlaylistsConnections::create(
            [
                'playlist_id' => $record->id,
                'track_id' => $track,
            ]
        );

        return $this->getSingleRecord($record->id);
    }

    /**
     * Updates existing item based on ID
     *
     * @param $id
     * @return mixed
     */
    protected function __update(string $id)
    {
        $record = HCPlaylists::findOrFail($id);

        $data = $this->getInputData();

        $record->update(array_get($data, 'record'));

        $record->track()->sync(array_get($data, 'record.track'));

        return $this->getSingleRecord($record->id);
    }

    /**
     * Updates existing specific items based on ID
     *
     * @param string $id
     * @return mixed
     */
    protected function __updateStrict(string $id)
    {
        HCPlaylists::where('id', $id)->update(request()->all());

        return $this->getSingleRecord($id);
    }

    /**
     * Delete records table
     *
     * @param $list
     * @return mixed|void
     */
    protected function __delete(array $list)
    {
        HCPlaylists::destroy($list);
    }

    /**
     * Delete records table
     *
     * @param $list
     * @return mixed|void
     */
    protected function __forceDelete(array $list)
    {
        HCPlaylists::onlyTrashed()->whereIn('id', $list)->forceDelete();
    }

    /**
     * Restore multiple records
     *
     * @param $list
     * @return mixed|void
     */
    protected function __restore(array $list)
    {
        HCPlaylists::whereIn('id', $list)->restore();
    }

    /**
     * Creating data query
     *
     * @param array $select
     * @return mixed
     */
    public function createQuery(array $select = null)
    {
        $with = ['track'];

        if ($select == null)
            $select = HCPlaylists::getFillableFields();

        $list = HCPlaylists::with($with)->select($select)
            // add filters
            ->where(function ($query) use ($select) {
                $query = $this->getRequestParameters($query, $select);
            });

        // enabling check for deleted
        $list = $this->checkForDeleted($list);

        // add search items
        $list = $this->listSearch($list);

        // ordering data
        $list = $this->orderData($list, $select);

        return $list;
    }

    /**
     * List search elements
     * @param $list
     * @return mixed
     */
    protected function listSearch(Builder $list)
    {
        if (request()->has('q')) {
            $parameter = request()->input('q');

            $list = $list->where(function ($query) use ($parameter) {
                $query->where('name', 'LIKE', '%' . $parameter . '%');
            });
        }

        return $list;
    }

    /**
     * Getting user data on POST call
     *
     * @return mixed
     */
    protected function getInputData()
    {
        (new RadioPlaylistsValidator())->validateForm();

        $_data = request()->all();

        array_set($data, 'record.name', array_get($_data, 'name'));
        array_set($data, 'record.track', array_get($_data, 'track'));

        return $data;
    }

    /**
     * Getting single record
     *
     * @param $id
     * @return mixed
     */
    public function getSingleRecord(string $id)
    {
        $with = ['track'];

        $select = HCPlaylists::getFillableFields();

        $record = HCPlaylists::with($with)
            ->select($select)
            ->where('id', $id)
            ->firstOrFail();

        return $record;
    }

    /**
     * Generating filters required for admin view
     *
     * @return array
     */
    public function getFilters()
    {
        $filters = [];

        return $filters;
    }
}
