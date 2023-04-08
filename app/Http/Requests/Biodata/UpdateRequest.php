<?php

namespace App\Http\Requests\Biodata;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected $routeParametersToValidate = ['id' => 'id'];

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id' => ['required', 'exists:biodatas,id'],
            'date_of_birth' => ['required', 'date'],
            'hobby' => ['required', 'string'],
            'age' => ['required', 'integer'],
        ];
    }
}
