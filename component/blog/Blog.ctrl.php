<?php

namespace Neoan3\Components;

use Neoan3\Frame\Rbm;
use Neoan3\Components\BlogListener;

/**
 * Class Blog
 * Generated by neoan3-cli
 * @package Neoan3\Components
 */
class Blog extends Rbm
{
    /**
     * @var array
     */
    protected array $allArticles = [];
    protected array $fullMenu = [];

    /**
     * init route
     */
    function init()
    {
        $targetFile = substr($_SERVER['QUERY_STRING'], 12);
        $findFiles = file_exists(path . '/component/blogArchive/' . $targetFile);
        if ($findFiles && $targetFile !== false ) {
            $files = file_get_contents(path . '/component/blogArchive/' . $targetFile);
        } else {
            $files =  file_get_contents(path . '/component/blog/blog-default.html');
            $this->fullMenu = self::createMenu();
        }


        $this
            ->hook('main', 'blog', [
                'blogContent' => $files,
                'menuItems' => $this->fullMenu
            ])
            ->output();
    }

    function createMenu(){
        $jsonFilePath = path. '/asset/menu.json';
        if(file_exists($jsonFilePath)){
            $menuJson = json_decode(file_get_contents($jsonFilePath), true);
        } else {
            $menuJson = [];
        }
        return $menuJson;
    }
}
