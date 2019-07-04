<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveRolesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'display_name' => 'required'
        ];

        if ($this->method() !== 'PUT') {

            $rules['name'] = 'required|unique:roles';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.unique' => 'Este identificador del rol ya ha sido registrado.',
            'name.required' => 'El identificador es obligatorio.',
            'display_name.required' => 'El nombre del rol es obligatorio.'
            ];
        
    }
}
