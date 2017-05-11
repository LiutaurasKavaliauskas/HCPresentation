<?php

namespace app\forms;

use interactivesolutions\honeycombacl\app\models\HCUsers;

class RadioTracksForm
{
    // name of the form
    protected $formID = 'tracks';

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
            'storageURL' => route('admin.api.tracks'),
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
                    "label" => trans("tracks.name"),
                    "required" => 1,
                    "requiredVisible" => 1,
                ],
                [
                    "type" => "dropDownList",
                    "fieldID" => "author",
                    "label" => trans("tracks.author"),
                    "search" => [
                        "showNodes" => ["email"]
                    ],
                    "options" => HCUsers::select('id', 'email')->get(),
                ]
            ],
        ];

        if ($this->multiLanguage)
            $form['availableLanguages'] = getHCContentLanguages();

        if (!$edit)
            return $form;

        //Make changes to edit form if needed
//        $form['structure'][] = [
//        ];

        return $form;
    }
}