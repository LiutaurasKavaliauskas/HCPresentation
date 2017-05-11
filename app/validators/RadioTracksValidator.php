<?php namespace app\validators;

use interactivesolutions\honeycombcore\http\controllers\HCCoreFormValidator;

class RadioTracksValidator extends HCCoreFormValidator
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'name' => 'required',

        ];
    }
}