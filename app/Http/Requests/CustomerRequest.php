<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CustomerRequest extends Request
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
            'phone' => 'required',
            'address' => 'required',
            'name' => 'required',
            'email' => 'required|email',
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
            'phone.required' => 'A phone number is required',
            'address.required' => 'A address is required',
            'status.required' => 'A status is required',
            'email.required' => 'A email is required',
            'email.emial' => 'Put a correct email',
            'name.required' => 'A name is required',
        ];
    }
}
