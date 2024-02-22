<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFormRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'max:12'],
            'last_name' => ['required', 'max:12'],
            'mid_name' => ['max:15'],
            'dob' => ['required'],
            'email' => ['required_without_all:phone'],
            'phone' => ['required_without_all:email'],
            'phoneCode' => ['required_without_all:email'],
            'about' => ['max:1000'],
            'status' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле обязательно для заполнения',
            'name.max' => 'Поле должно быть не длиннее 12 символов',
            'last_name.required' => 'Поле обязательно для заполнения',
            'last_name.max' => 'Поле должно быть не длиннее 12 символов',
            'mid_name.max' => 'Поле должно быть не длиннее 15 символов',
            'dob.required' => 'Поле обязательно для заполнения',
            'email.required_without_all' => 'Почта или телефон должны быть указаны',
            'phone.required_without_all' => 'Телефон или почта должны быть указаны',
            'phoneCode.required_without_all' => 'Телефон или почта должны быть указаны',
            'about' => 'Поле должно быть не длиннее 1000 символов',
            'status' => 'Поле обязательно для заполнения'
        ];
    }
}
