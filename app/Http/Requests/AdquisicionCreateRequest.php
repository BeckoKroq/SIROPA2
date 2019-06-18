<?php

namespace Siropa\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdquisicionCreateRequest extends FormRequest
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
            'nombre_adquisicion'=>'required|min:4',
            'numero_adquisicion'=>'required|max:15',
            'region'=>'required',
            'localidad'=>'required',
            'fecha_inicio'=>'required',
            'fecha_fin'=>'required',
        ];
    }
}
