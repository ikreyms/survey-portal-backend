<?php

namespace App\Validators;

// use Validator;
use Illuminate\Validation\Validator;

class AppSettingValidator
{
    private static array $generalSettingsValidationRules = [
        'rules' => [
            'appName' => ['required', 'string', 'max:25'],
            'officeName' => ['required', 'string'],
        ],
        'messages' => []
    ];

    private static array $platesSettingsValidationRules = [
        'rules' => [
            'activePlateNumberFormatId' => ['required', 'integer', 'exists:plate_formats,id'],
        ],
        'messages' => [
            'activePlateNumberFormatId' => [
                'exists' => 'The selected plate number format is invalid.'
            ]
        ]
    ];

    public function validateGeneralSettings($data, Validator &$validator)
    {
        $dataValidator = \Validator::make($data, static::$generalSettingsValidationRules['rules']);
        $this->setValidationErrorsOnFail($dataValidator, $validator);
    }

    public function validatePlatesSettings($data, Validator &$validator)
    {
        $dataValidator = \Validator::make($data, static::$platesSettingsValidationRules['rules'], static::$platesSettingsValidationRules['messages']);
        $this->setValidationErrorsOnFail($dataValidator, $validator);
    }

    private function setValidationErrorsOnFail(Validator $dataValidator, Validator $parentValidator)
    {
        if ($dataValidator->fails()) {
            foreach ($dataValidator->errors()->keys() as $key) {
                $parentValidator->errors()->add($key, ...$dataValidator->errors()->get($key));
            }
        }
    }
}
