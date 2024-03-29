<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InstructorRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email'        => 'required|unique:instructors,email',
            'password' => 'required|confirmed',
            'userName'        => 'required|unique:instructors,userName',
            'track_id' => 'required|exists:tracks,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',


        ];
    }
}
