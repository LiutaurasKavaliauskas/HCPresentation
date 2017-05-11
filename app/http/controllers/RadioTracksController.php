<?php namespace app\http\controllers;

use app\models\HCTrackAuthorConnections;
use Illuminate\Database\Eloquent\Builder;
use interactivesolutions\honeycombacl\app\models\HCUsers;
use interactivesolutions\honeycombcore\http\controllers\HCBaseController;
use app\models\HCTracks;
use app\validators\RadioTracksValidator;

class RadioTracksController extends HCBaseController
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
            'title' => trans('tracks.page_title'),
            'listURL' => route('admin.api.tracks'),
            'newFormUrl' => route('admin.api.form-manager', ['tracks-new']),
            'editFormUrl' => route('admin.api.form-manager', ['tracks-edit']),
            'imagesUrl' => route('resource.get', ['/']),
            'headers' => $this->getAdminListHeader(),
        ];

        if ($this->user()->can('tracks_create'))
            $config['actions'][] = 'new';

        if ($this->user()->can('tracks_update')) {
            $config['actions'][] = 'update';
            $config['actions'][] = 'restore';
        }

        if ($this->user()->can('tracks_delete'))
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
                "label" => trans('tracks.name'),
            ],
            'author.0.email' => [
                "type" => "text",
                "label" => trans('tracks.author'),
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

        

        $record = HCTracks::create(array_get($data, 'record'));

        foreach (array_get($data, 'record.author') as $author)
        HCTrackAuthorConnections::create([
            'author_id' => $author,
            'track_id' => $record->id,
        ]);


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
        $record = HCTracks::findOrFail($id);

        $data = $this->getInputData();

        $record->update(array_get($data, 'record'));

        $record->author()->sync(array_get($data, 'record.author'));

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
        HCTracks::where('id', $id)->update(request()->all());

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
        HCTracks::destroy($list);
    }

    /**
     * Delete records table
     *
     * @param $list
     * @return mixed|void
     */
    protected function __forceDelete(array $list)
    {
        HCTracks::onlyTrashed()->whereIn('id', $list)->forceDelete();
    }

    /**
     * Restore multiple records
     *
     * @param $list
     * @return mixed|void
     */
    protected function __restore(array $list)
    {
        HCTracks::whereIn('id', $list)->restore();
    }

    /**
     * Creating data query
     *
     * @param array $select
     * @return mixed
     */
    public function createQuery(array $select = null)
    {
        $with = ['author'];

        if ($select == null)
            $select = HCTracks::getFillableFields();

        $list = HCTracks::with($with)->select($select)
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
        (new RadioTracksValidator())->validateForm();

        $_data = request()->all();

        array_set($data, 'record.name', array_get($_data, 'name'));
        array_set($data, 'record.author', array_get($_data, 'author'));

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
        $with = ['author'];

        $select = HCTracks::getFillableFields();

        $record = HCTracks::with($with)
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
