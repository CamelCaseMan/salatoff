<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Http\Requests\Auth\AuthLoginRequest;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
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

            $request->validate([
                'phone' => 'required',
                'code' => ['required']
            ]);


            $user = User::where('phone', $request->phone)->first();

            if (!empty($user)) {
                return $user;
            }
        }

        );

        /*Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);*/

        RateLimiter::for ('login', function (Request $request) {
            return Limit::perMinute(5)->by($request->phone . $request->ip());
        });

        /*RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });*/
    }
}
