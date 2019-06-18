<?php

namespace Siropa\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaseUnoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'fecha1'=>'required',
            'fecha2'=>'required',
            'fecha3'=>'required',
            'fecha4'=>'required',
            'fecha5'=>'required',
            'fecha6'=>'required',
            'fecha7'=>'required',
            'fecha8'=>'required',
            'fecha9'=>'required',
            'fecha10'=>'required',
            'fecha11'=>'required',
            'fecha12'=>'required',
            'fecha13'=>'required',
            'fecha14'=>'required',
            'fecha15'=>'required',
            'fecha16'=>'required',
            'fecha17'=>'required',
            'fecha18'=>'required',
            'fecha19'=>'required',
            'fecha20'=>'required',
        ];
    }
}
