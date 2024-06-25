<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'id' => 'required|exists:students,id',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => [
                'required',
                Rule::unique('students', 'email')->ignore($this->id)
            ],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'country_id' => 'exists:countries,id'



        ];
    }
}
