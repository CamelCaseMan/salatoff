<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Rules\CheckSmsCode;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        $messages = [
            'phone.unique' => 'Номер уже зарегистрирован',
            'name.required' => 'Имя обязательное поле',
            'code.required' => 'Код подтверждение обязательное поле',
        ];

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => [
                'bail',
                'required',
                'unique:users',
                'regex:/^([0-9\s\-\+\(\)]*)$/',
                'min:10',
            ],
            'code' => ['required', new CheckSmsCode()],
        ], $messages)->validate();

        return User::create([
            'name' => $input['name'],
            'phone' => $input['phone'],
        ]);
    }
}
