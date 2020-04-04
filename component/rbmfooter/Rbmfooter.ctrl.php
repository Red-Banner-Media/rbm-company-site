<?php

namespace Neoan3\Components;

use Neoan3\Frame\Rbm;

/**
 * Class some
 * @package Neoan3\Components
 */
class Rbmfooter extends Rbm
{
    /**
     * @var array of dependencies as strings
     * NOTE: only global params can be passed in
     */
    private static array $requiredComponents = [];

    /**
     * This function is called by the RBM frame
     *
     * @return array
     */
    static function dependencies()
    {
        return self::$requiredComponents;
    }
}

