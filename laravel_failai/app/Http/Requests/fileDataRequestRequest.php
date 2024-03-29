<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class fileDataRequestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>['required','max: 50'],
            'path'=>['required','max:60'],
            'extension'=>['required','max:60'],
            'size'=>['nullable'],
            'url'=>['nullable'],
        ];
    }
}
