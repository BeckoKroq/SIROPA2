<?php

namespace Siropa\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProyectoCreateRequest extends FormRequest
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
            'nombre_proyecto'=>'required|min:4',
            'numero_proyecto'=>'required|max:15',
            'region'=>'required',
            'localidad'=>'required',
            'fecha_inicio'=>'required',
            'fecha_fin'=>'required',
        ];
    }
}
