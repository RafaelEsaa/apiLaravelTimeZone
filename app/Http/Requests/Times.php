<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Times extends FormRequest
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
        return [
            'hora'=>'required',
            'utc'=>'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'hora.required' => 'Es requerida la hora',
            'utc.required'  => 'Es requerida la utc',
            'utc.numeric'  => 'Utc debe ser solo numeros',
        ];
    }
}
