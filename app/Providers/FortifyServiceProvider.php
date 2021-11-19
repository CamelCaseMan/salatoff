<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Http\Requests\Auth\AuthLoginRequest;
use App\Models\User;
use App\Rules\CheckSmsCode;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Регистрация
        Fortify::createUsersUsing(CreateNewUser::class);

        //Авторизация
        Fortify::authenticateUsing(function (Request $request) {
            $messages = [
                'phone.required' => 'Номер телефона обязательное поле',
                'phone.exists' => 'Номер телефона не зарегистрирован',
                'code.required' => 'Код обязательное поле',
            ];
            \Validator::make($request->all(), [
                'phone' => 'required', 'exists:users,phone',
                'code' => ['required', new CheckSmsCode($request->phone)]
            ], $messages)->validate();


            $user = User::where('phone', $request->phone)->first();

            if (!empty($user)) {
                session()->forget('sms_code');
                return $user;
            }
        }

        );

        /*Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);*/


    }
}
