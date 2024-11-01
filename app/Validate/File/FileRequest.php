<?php

namespace App\Validate\File;

use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'files' => 'required|max:2',
        ];
    }

    public function messages()
    {
        return [
            'files.required' => 'Выберите файлы для загрузки.',
            'files.max' => 'Максимальное количество файлов для загрузки: :max.',
        ];
    }
}
