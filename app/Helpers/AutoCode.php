<?php

namespace App\Helpers;


class AutoCode {
    public static function code($code)
    {
        return $code.'-'.rand();
    }
}
