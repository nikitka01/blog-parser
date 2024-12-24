<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'query' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'query.required' => 'Пустой поисковый запрос',
        ];
    }
}
