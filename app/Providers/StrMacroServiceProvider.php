<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class StrMacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Str::macro('clearNumber', function ($str){
            $str =  preg_replace("/[^0-9]/","",$str);
            return $str;
        });


        Str::macro('formatPhoneNumber', function ($value) {

            $value = Str::clearNumber($value);

            $number = "+".substr($value,0, 3).
                " (".substr($value,3,2).") ".
                substr($value,5, 3 )." ".
                substr($value,8, 2 )." ".
                substr($value,10 );

            return $number;
        });
    }
}
