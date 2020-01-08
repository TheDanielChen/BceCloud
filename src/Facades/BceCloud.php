<?php

namespace Cstopery\BceCloud\Facades;

use Illuminate\Support\Facades\Facade;

class BceCloud extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'BceCloud';
    }
}