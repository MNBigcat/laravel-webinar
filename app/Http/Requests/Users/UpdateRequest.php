<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:2', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:50'],
        ];
    }

    public function messages(): array
    {
        return [
            'name'=> 'Поле :attribute обязательно',   //00:52  зачем указал name.required?
        ];
    }

    public function attributes(): array
    {
        return [
            'name'=> '"Имя пользователя"',
        ];
    }

    public function getName(string $name): string
    {
        return $this->validated('name');
    }

}