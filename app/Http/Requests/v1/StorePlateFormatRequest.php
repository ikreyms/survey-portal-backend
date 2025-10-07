<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class StorePlateFormatRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:30', 'unique:plate_formats,name'],
            'description' => ['required', 'string', 'max:50', 'unique:plate_formats,description'],
        ];
    }
}
