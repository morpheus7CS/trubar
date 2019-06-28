<?php

namespace Wewowweb\Trubar;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Wewowweb\Trubar\Skeleton\SkeletonClass
 */
class TrubarFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'trubar';
    }
}
