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
            'name' => ['required', 'max:15'],
            'lastName' => ['required', 'max:15'],
            'midName' => ['max:15'],
            'dob' => ['required'],
            'email' => ['required_without_all:phone'],
            'phone' => ['required_without_all:email'],
            'phoneCode' => ['required_without_all:email'],
            'docs.*' => ['mimes:png,jpg,pdf', 'max:5096'],
            'docs' => ['array', 'max:5'],
            'yourself' => ['max:1000'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле обязательно для заполнения',
            'name.max' => 'Поле должно быть не длиннее 15 символов',
            'lastName.required' => 'Поле обязательно для заполнения',
            'lastName.max' => 'Поле должно быть не длиннее 15 символов',
            'midName.max' => 'Поле должно быть не длиннее 15 символов',
            'dob.required' => 'Поле обязательно для заполнения',
            'email.required_without_all' => 'Почта или телефон должны быть указаны',
            'phone.required_without_all' => 'Телефон или почта должны быть указаны',
            'phoneCode.required_without_all' => 'Телефон или почта должны быть указаны',
            'yourself' => 'Поле должно быть не длиннее 1000 символов',
            'docs' => 'Размер файла не более 5Мб',
            'docs.*' => 'Допустимые форматы: png, jpg, pdf',
            'docs.max' => 'Не более 5 файлов',

        ];
    }
}
