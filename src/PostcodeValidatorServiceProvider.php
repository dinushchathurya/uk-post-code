<?php

namespace Dinushchathurya\UkPostcodeValidator;

use Illuminate\Support\ServiceProvider;
use Validator;
use Illuminate\Validation\Rule;

class PostcodeValidatorServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'post-validator');
        $this->registerUkPostcodeRule();

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/post-validator'),
            ], 'translations');
        }
    }

    public function registerUkPostcodeRule()
    {
        Validator::extend('UkPostcode', function ($attribute, $postcode) {
            $pattern = '/^(?:(?:(?:[A-Z][A-HJ-Y]?\d[A-Z\d]??|\d{1,2}[A-Z]{2})\s*\d[A-Z]{2})|GIR\s*0AA)$/i';
            return preg_match($pattern, strtoupper(str_replace(' ', '', $postcode))) === 1;
        }, trans('post-validator::validation.postcode'));
    }
}