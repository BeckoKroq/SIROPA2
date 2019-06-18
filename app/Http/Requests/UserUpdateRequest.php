<?php

namespace Siropa\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'nombre'=>'required',
            'clave_fun'=>'required|min:1|max:10',
            'email'=>'required|email',
            //'password'=>'required|min:8|max:16',
            'telefono'=>'required|min:10|max:15',
            'direccion'=>'required',
            'municipio'=>'required',
            'puesto'=>'required',
        ];
    }
}
