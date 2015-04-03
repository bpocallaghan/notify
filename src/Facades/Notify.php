<?php namespace Bpocallaghan\Notify\Facades;

use Illuminate\Support\Facades\Facade;

class Notify extends Facade {

    /**
     * Get the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'notify';
    }

} 