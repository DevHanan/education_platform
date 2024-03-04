<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateInstructorRequest extends FormRequest
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
            'id' => 'required|exists:instructors,id',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => [
                'required',
                Rule::unique('instructors', 'email')->ignore($this->id)
            ],
            'password' => 'confirmed',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'userName' => [
                'required',
                Rule::unique('instructors', 'userName')->ignore($this->id)
            ],
            'track_id' => 'required|exists:tracks,id',



        ];
    }
}
