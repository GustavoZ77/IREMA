<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateCatalogRequest extends Request {

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
            'status' => 'required',
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
            'time_priority.required' => 'A time is required',
            'status.required' => 'A status is required',
        ];
    }
}
    