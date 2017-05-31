<?php
/**
 * Robot provider
 * @package site
 * @version 0.0.1
 * @upgrade true
 */

namespace Site\Library;

class Robot
{
    static function feed(){
        $dis = \Phun::$dispatcher;
        
        $obj = (object)[
            'page'          => $dis->router->to('siteHome'),
            'published'     => date('c', strtotime($dis->config->install)),
            'description'   => 'Standart homepage description',
            'updated'       => null,
            'title'         => $dis->config->name . ' Homepage'
        ];
        
        if(module_exists('site-param')){
            $desc = $dis->setting->frontpage_description;
            if($desc)
                $obj->description = $desc;
            $title = $dis->setting->frontpage_title;
            if($title)
                $obj->title = $title;
        }
        
        return [$obj];
    }
    
    static function sitemap(){
        return [
            (object)[
                'url' => \Phun::$dispatcher->router->to('siteHome'),
                'lastmod' => date('Y-m-d'),
                'changefreq' => 'hourly',
                'priority' => 0.8
            ]
        ];
    }
}