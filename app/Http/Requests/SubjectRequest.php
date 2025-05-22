<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:255',
            'slug' => 'required|unique:subjects,slug,' . ($this->id ?? ''),
            'program_id' => 'required|exists:programs,id',
            'course' => 'required|integer|min:1',
            'theory_hours' => 'required|integer|min:0',
            'practice_hours' => 'required|integer|min:0',
            'description' => 'nullable|max:1000'
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'Название',
            'slug' => 'Slug',
            'program_id' => 'Программа',
            'course' => 'Курс',
            'theory_hours' => 'Теор. часы',
            'practice_hours' => 'Практ. часы',
            'description' => 'Описание'
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
