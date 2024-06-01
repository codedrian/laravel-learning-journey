<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
    public function prepareForValidation()
    {
        $input = $this->all();
        $input = array_map(function ($value) {
            if (is_string($value)) {
                return trim(strip_tags($value));
            }
        }, $input);
        $this->replace($input);
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'contact_number' => 'required|string|unique:phone_books,contact_number',
        ];
    }
}
