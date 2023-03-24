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

    public function registerUkPostecodeRule()
    {
        Validator::extend('UkPostcode', function ($attribute, $postcode) {
            return preg_match('/^(?:0|94|\+94)?(?:(?P<area>11|21|23|24|25|26|27|31|32|33|34|35|36|37|38|41|45|47|51|52|54|55|57|63|65|66|67|81|912)(?P<land_carrier>0|2|3|4|5|7|9)|7(?P<mobile_carrier>0|1|2|4|5|6|7|8)\d)\d{6}$/', $postcode);
        }, trans('post-validator::validation.postcode'));
    }
}