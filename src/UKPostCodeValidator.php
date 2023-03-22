<?php

namespace Dinushchathurya\UKPostCode;

class UKPostCodeValidator
{
    public function validate($attribute, $value, $parameters, $validator)
    {
        $postcode = strtoupper(str_replace(' ', '', $value)); // Remove spaces and convert to uppercase
        
        // Regular expression for UK postal codes
        $pattern = '/^[A-Z]{1,2}[0-9R][0-9A-Z]? [0-9][A-Z]{2}$/';

        if (preg_match($pattern, $postcode)) {
            return true; // The postcode is valid
        } else {
            return false; // The postcode is invalid
        }
    }
}

