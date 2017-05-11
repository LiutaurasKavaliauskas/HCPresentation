<?php

namespace app\forms;

use app\models\HCTracks;

class RadioPlaylistsForm
{
    // name of the form
    protected $formID = 'playlist';

    // is form multi language
    protected $multiLanguage = 0;

    /**
     * Creating form
     *
     * @param bool $edit
     * @return array
     */
    public function createForm(bool $edit = false)
    {
        $form = [
            'storageURL' => route('admin.api.playlist'),
            'buttons' => [
                [
                    "class" => "col-centered",
                    "label" => trans('HCCoreUI::core.button.submit'),
                    "type" => "submit",
                ],
            ],
            'structure' => [
                [
                    "type" => "singleLine",
                    "fieldID" => "name",
                    "label" => trans("playlist.name"),
                    "required" => 1,
                    "requiredVisible" => 1,
                ],
                [
                    "type" => "dropDownList",
                    "fieldID" => "track",
                    "label" => trans("playlist.track"),
                    "search" => [
                        "showNodes" => ["name"]
                    ],
                    "options" => HCTracks::select('id', 'name')->get(),
                ]
            ],
        ];

        if ($this->multiLanguage)
            $form['availableLanguages'] = getHCContentLanguages();

        if (!$edit)
            return $form;

        //Make changes to edit form if needed
        // $form['structure'][] = [];

        return $form;
    }
}