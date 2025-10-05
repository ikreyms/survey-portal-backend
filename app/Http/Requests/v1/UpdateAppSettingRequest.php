<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAppSettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'officeName' => ['required', 'string', 'max:50'],
            'appName' => ['required', 'string', 'max:25'],
            'activePlateFormatId' => ['required', 'integer', 'exists:plate_formats,id'],
        ];
    }

    public function messages()
    {
        return [
            'activePlateFormatId.exists' => 'Plate format does not exist'
        ];
    }
}
