<?php
namespace ZiNETHQ\SparkRoles\Facades;

use Illuminate\Support\Facades\Facade;
use ZiNETHQ\SparkRoles\SparkRoles as Roles;

class SparkRoles extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Roles::class;
    }
}
