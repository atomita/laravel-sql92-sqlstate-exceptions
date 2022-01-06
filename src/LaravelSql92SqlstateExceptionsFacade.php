<?php

namespace atomita\LaravelSql92SqlstateExceptions;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Atomita\LaravelSql92SqlstateExceptions\Skeleton\SkeletonClass
 */
class LaravelSql92SqlstateExceptionsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-sql92-sqlstate-exceptions';
    }
}
