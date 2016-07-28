<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateSignalRequest extends Request
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
            'signalfrom' => 'required',
            'signaldate' => 'required|date',
            'identnumber' => 'required|numeric:min:9',
            'pod_id' => 'required',
            'opisanie' => 'required',
            'deistvie' => 'required',
            'deistvie_date' => 'required|date'
        ];
    }
}
