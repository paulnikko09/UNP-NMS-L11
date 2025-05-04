<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ThresholdRule implements Rule
{
    protected $max;

    public function __construct($max)
    {
        $this->max = $max;
    }

    public function passes($attribute, $value)
    {
        return $value <= $this->max;
    }

    public function message()
    {
        return 'The :attribute exceeds the allowable threshold.';
    }
}
