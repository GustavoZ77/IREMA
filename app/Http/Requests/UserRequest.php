<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request {

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
            'name' => 'required',
            'email' => 'required|email',
            'customer' => 'required',
            'type_user' => 'required',
            'password' => 'required|confirmed',
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
            'name.required' => 'A name is required',
            'password.required' => 'A password is required',
            'status.required' => 'A status is required',
            'email.required' => 'A email is required',
            'password.confiermed' => 'The password does not match',
            'name.required' => 'A name is required',
        ];
    }

}
