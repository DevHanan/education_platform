<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentRequest extends FormRequest
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
            'email'        => 'required|unique:students,email',
            'password' => 'required|confirmed',
            'phone' => 'regex:/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/'

            // 'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'userName'        => 'required|unique:students,userName',
            // 'country_id' => 'required|exists:countries,id',
            // 'track_id' => 'required|exists:tracks,id',



        ];
    }
}
