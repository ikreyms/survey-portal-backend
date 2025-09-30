<?php

namespace App\Http\Requests\v1;

use App\Validators\AppSettingValidator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class UpdateAppSettingRequest extends FormRequest
{
    public function __construct(
        private AppSettingValidator $appSettingValidator,        
    ) {}

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            '*.id' => ['required', 'integer'],
            '*.name' => ['required', 'string', 'exists:app_settings,name'],
            '*.value' => ['required', 'array'],
        ];
    }

    public function withValidator(Validator $validator)
    {
        $validator->after(function () use ($validator) {
            foreach ($this->all() as $item) {
                if (!isset($item['name'], $item['value'])) continue;

                $name = $item['name'];
                $data = $item['value'];

                switch ($name) {
                    case 'general':
                        $this->appSettingValidator->validateGeneralSettings($data, $validator);
                        break;
                    case 'plates':
                        $this->appSettingValidator->validatePlatesSettings($data, $validator);
                        break;
                    default:
                        $validator->errors()->add($name, "Unknown setting type: $name");
                }
            }
        });
    }
}
