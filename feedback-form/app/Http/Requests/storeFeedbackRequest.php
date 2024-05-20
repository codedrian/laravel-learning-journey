<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class storeFeedbackRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'name' => strip_tags($this->name),
            'course' => strip_tags($this->course),
            'score' => strip_tags($this->score),
            'reason' => strip_tags($this->reason),
        ]);
    }
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
    public function rules(): array
    {
        return [
            'name' => 'string|nullable',
            'course' => 'string|required',
            'score' => 'integer|required',
            'reason' => 'required|string',
        ];
    }
}
