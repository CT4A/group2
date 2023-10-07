<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('custom_time', function ($attribute, $value, $parameters, $validator) {
            // 正規表現を使用して時間の形式（00:00）をチェックします
            return preg_match('/^([01][0-9]|2[0-3]):[0-5][0-9]$/', $value);
        });
    
        Validator::replacer('custom_time', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, ':attributeの形式は00:00で入力してください。');
        });
    
    }
}
