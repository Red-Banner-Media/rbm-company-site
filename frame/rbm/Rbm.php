<?php
/**
 * Created by PhpStorm.
 * User: sroehrl
 * Date: 2/4/2019
 * Time: 1:36 PM
 */

namespace Neoan3\Frame;

use mysql_xdevapi\TableDelete;
use Neoan3\Core\Serve;

class Rbm extends Serve
{
    private $loadedComponents = [];

    function __construct()
    {
        parent::__construct();
    }

    function constants()
    {
        return [
            'base' => [base],
            'meta' => [
                ['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0']
            ],
            'link' => [
                [
                    'sizes' => '32x32',
                    'type' => 'image/png',
                    'rel' => 'icon',
                    'href' => 'asset/RedBannerMedia_Favicon.png'
                ],
                [
                    'href' => 'https://fonts.googleapis.com/css2?family=Lora&display=swap',
                    'rel' => 'stylesheet'
                ]
            ],
            'stylesheet' => [
                '' . base . 'frame/rbm/style.css',
            ],
            'js' => [
                ['src' => base . 'node_modules/axios/dist/axios.min.js'],
                ['src' => base . 'node_modules/vue/dist/vue.js'],
                // TODO: Remove regular and replace with min version after production
                // ['src' => base . 'node_modules/vue/dist/vue.min.js'],
                ['src' => base . 'node_modules/lodash/lodash.min.js'],
                ['src' => base . 'frame/rbm/main.js', 'data' => ['base' => base]]
            ]
        ];
    }

    // vuejs integration
    function output($params = [])
    {
        $this->js .= 'new Vue({el:"#root"});';
        $this->main = '<div id="root" class="main">' . $this->header . $this->main . '</div>';
        $this->header = '';
        parent::output($params);
    }

    function vueComponents($components, $params = [])
    {
        foreach ($components as $component) {
            $this->vueComponent($component, $params);
        }
        return $this;
    }

    function vueComponent($element, $params = [])
    {
        if(in_array($element,$this->loadedComponents)){
            return $this;
        }
        $this->loadedComponents[] = $element;
        $params['base'] = base;
        $path = path . '/component/' . $element . '/' . $element . '.ce.';
        if (file_exists($path . $this->viewExt)) {
            $this->footer .= '<template id="' . $element . '">' . $this->fileContent($path . $this->viewExt, $params) .
                '</template>';
        }
        if (file_exists($path . $this->styleExt)) {
            $this->style .= $this->fileContent($path . $this->styleExt, $params);
        }
        if (file_exists($path . 'js')) {
            $this->js .= $this->fileContent($path . 'js', $params);
        }
        // dependencies?
        $phpCtrl = path . '/component/' . $element . '/' . ucfirst($element) . '.ctrl.php';
        if (file_exists($phpCtrl)) {
            $class = '\\Neoan3\\Components\\' . ucfirst($element);
            if (method_exists($class, 'dependencies')) {
                $dependencies = "$class::dependencies";
                $this->vueComponents($dependencies(), $params);
            }
        }

        return $this;
    }
}
