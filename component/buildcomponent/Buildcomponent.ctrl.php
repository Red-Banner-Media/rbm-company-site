<?php
/* Generated by neoan3-cli */

namespace Neoan3\Components;

use Neoan3\Frame\Rbm;

class Buildcomponent extends Rbm
{
    public string $final = '';

    function getBuildcomponent(array $body)
    {
        $modal_file = file_get_contents(base . 'asset/rbm-modal-component.html');
        $search = array_keys($body);
        $replace = array_values($body);
        $this->final = str_replace($search, $replace, $modal_file);
        return $this->final;
    }
}
