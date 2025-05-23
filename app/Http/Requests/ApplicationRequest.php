<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
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
            'email' => 'required|email|max:255',
            'phone' => 'required|min:10|max:20',
            'degree' => 'required|string|in:college,bachelor,master,training',
            'program_id' => 'required|exists:programs,id',
            'message' => 'nullable|max:1000',
            'status' => 'required|in:new,in_progress,completed,cancelled'
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
            'name' => 'Имя',
            'email' => 'Email',
            'phone' => 'Телефон',
            'degree' => 'Образование',
            'program_id' => 'Программа',
            'message' => 'Сообщение',
            'status' => 'Статус'
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
            'name.required' => 'Пожалуйста, укажите ваше имя',
            'name.min' => 'Имя должно содержать минимум 2 символа',
            'email.required' => 'Пожалуйста, укажите ваш email',
            'email.email' => 'Пожалуйста, укажите корректный email',
            'phone.required' => 'Пожалуйста, укажите ваш телефон',
            'phone.min' => 'Телефон должен содержать минимум 10 символов',
            'degree.required' => 'Пожалуйста, выберите уровень образования',
            'program_id.required' => 'Пожалуйста, выберите программу обучения',
            'program_id.exists' => 'Выбранная программа не существует',
            'message.max' => 'Сообщение не должно превышать 1000 символов'        ];
    }
}
