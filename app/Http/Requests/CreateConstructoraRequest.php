<?php

namespace Siropa\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateConstructoraRequest extends FormRequest
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
            //
            'razon_social'=>'required',
            'domicilio'=>'required',
            'telefono'=>'required|min:10|max:15',
            'correo'=>'required|email',
            'estado'=>'required',
            'municipio'=>'required',
            'rfc'=>'required|min:9',
        ];
    }
}
