<?php

namespace Dinushchathurya\UKPostCode;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class UKPostCodeValidatorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Validator::extend('uk_postal_code', 'Dinushchathurya\UKPostCode\UKPostCodeValidator@validate');
    }

    public function register()
    {
        //
    }
}
