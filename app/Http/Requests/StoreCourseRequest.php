<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
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
            'department_id' => 'required|integer|exists:departments,departmentID',
            'instructor_id' => 'required|integer|exists:instructors,instructorID',
            'title' => 'required|string|min:3|max:100|unique:courses,title',
            'credit' => 'required|string',
        ];
    }
}
