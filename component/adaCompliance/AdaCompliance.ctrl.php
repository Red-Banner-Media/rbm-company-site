<?php

namespace Neoan3\Components;

use Neoan3\Frame\Rbm;

/**
 * Class AdaCompliance
 * Generated by neoan3-cli
 * @package Neoan3\Components
 */

class AdaCompliance extends Rbm
{
    /**
     * @var array
     */
    private $vueComponents = ['contactus'];
    
    /**
     * init route 
     */
    function init()
    {
        $this
            ->hook('main', 'adaCompliance', [])
            ->vueComponents($this->vueComponents, [])
            ->output();
    }
}
