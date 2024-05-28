<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    /*To sanitize the input*/
    public function prepareForValidation()
    {
        /*to get all the input*/
        $input = $this->all();
        $input = array_map(function($value){
            return trim(strip_tags($value));
        }, $input);
        $input['email'] = strtolower($input['email']);
        $this->replace($input);
    }
    public function rules(): array
    {
        /*TODO: Add unique in the email validator*/
        return [
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
            'terms' => 'required|accepted'
        ];
    }
}
