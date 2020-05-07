<?php

namespace Neoan3\Components;

use Neoan3\Frame\Rbm;

/**
 * Class SearchEngineOptimization
 * Generated by neoan3-cli
 * @package Neoan3\Components
 */

class SearchEngineOptimization extends Rbm
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
            ->hook('main', 'searchEngineOptimization', [])
            ->vueComponents($this->vueComponents, [])
            ->output();
    }
}
