<?php

class Validator
{
    private static $VALIDATOR_MAP = [
        'I' => 'is_int',
        'S' => 'is_string'
    ];

    public function isValid($value, $type, $length = null)
    {
        $isValid = null !== $length ? $length == strlen($value) : true;

        $validator = static::$VALIDATOR_MAP[$type];
        return $isValid && $validator($value);
    }
}
