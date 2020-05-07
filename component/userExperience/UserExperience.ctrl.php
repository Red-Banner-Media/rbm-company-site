<?php

namespace Neoan3\Components;

use Neoan3\Frame\Rbm;

/**
 * Class UserExperience
 * Generated by neoan3-cli
 * @package Neoan3\Components
 */

class UserExperience extends Rbm
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
            ->hook('main', 'userExperience', [])
            ->vueComponents($this->vueComponents, [])
            ->output();
    }
}