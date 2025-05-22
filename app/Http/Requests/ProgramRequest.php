<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgramRequest extends FormRequest
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
        $rules = [
            'title' => 'required|min:2|max:255',
            'slug' => 'required|min:2|max:255',
            'institution_id' => 'required|exists:institutions,id',
            'study_field_id' => 'required|exists:study_fields,id',
            'degree' => 'required|in:college,bachelor,master,training',
            'study_form' => 'required|in:full-time,part-time,distance',
            'duration_months' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'description' => 'required|max:1000',
            'is_active' => 'boolean'
        ];

        // Добавляем правило для изображения только при создании или если оно загружено
        if ($this->isMethod('POST') || $this->hasFile('image')) {
            $rules['image'] = 'nullable|image|max:4096'; 
        }

        return $rules;
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => 'Название',
            'slug' => 'Slug',
            'institution_id' => 'Учебное заведение',
            'study_field_id' => 'Направление',
            'degree' => 'Степень',
            'study_form' => 'Форма обучения',
            'duration_months' => 'Длительность',
            'price' => 'Стоимость',
            'description' => 'Описание',
            'is_active' => 'Активно',
            'image' => 'Изображение'
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
            'image.max' => 'Размер изображения не должен превышать 2MB',
            'image.image' => 'Файл должен быть изображением'
        ];
    }
}
