<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CourseRequest extends FormRequest
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
            'name'   => 'required',
            'price' => 'required',
            'course_type_id' => 'required|exists:course_types,id',
            // 'track_ids.*' => 'required|array',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'background_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'published_at' => 'required|date|before:start_date',
            'start_date' => 'required|date|after:published_at|before:end_date',
            'end_date' => 'required|date|after:start_date',





        ];
    }
}
