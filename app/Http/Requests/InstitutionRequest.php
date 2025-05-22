<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstitutionRequest extends FormRequest
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
            'slug' => 'required|unique:institutions,slug,' . ($this->id ?? ''),
            'type' => 'required|in:university,college',
            'description' => 'nullable|max:1000',
            'logo' => 'nullable|image|max:2048',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|max:255',
            'person' => 'nullable|max:255',
            'is_active' => 'boolean'
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
            'type' => 'Тип',
            'description' => 'Описание',
            'logo' => 'Логотип',
            'email' => 'Email',
            'phone' => 'Телефон',
            'person' => 'Контактное лицо',
            'is_active' => 'Активно'
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
