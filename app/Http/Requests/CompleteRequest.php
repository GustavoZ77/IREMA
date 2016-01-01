<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CompleteRequest extends Request
{
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
            'solution' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules. 
     *
     * @return array
     */
    public function messages() {
        return [
            'solution.required' => 'A solution is required'
        ];
    }
}
