<?php

namespace DoeSangue\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|min:2|max:100|unique:users',
            'password' => 'required|string|min:8',
            'birthdate' => 'required|date|before:today|older_than:16'
        ];
    }

    /**
     * Return custom messages for errors
     * @return array
     */
    public function messages()
    {
        return [
            'first_name.required' => 'The First Name can\'t be empty!',
            'last_name.required' => 'The First Name can\'t be empty!',
            'birthdate.required' => 'Your birthdate can\'t be empty!',
            'birthdate.older_than' => 'You must have at least 16 years!',
            'email.required' => 'Your email can\'t be empty!',
            'email.unique' => 'Oops. This email isn\'t available!',
        ];
    }
}
