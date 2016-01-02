<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class IncidentRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'description' => 'required',
            'application_id' => 'required',
            'type_incident_id' => 'required',
            'priority_id' => 'required',
            'asigned' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules. 
     *
     * @return array
     */
    public function messages() {
        return [
            'description.required' => 'A description is required',
            'application_id.required' => 'A application is required',
            'type_incident_id.required' => 'A type incident is required',
            'priority_id.required' => 'A priority is required',
            'asigned.required' => 'a user is required'
        ];
    }

}
