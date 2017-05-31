<?php
/**
 * site config file
 * @package site
 * @version 0.0.1
 * @upgrade true
 */

return [
    '__name' => 'site',
    '__version' => '0.0.1',
    '__git' => 'https://github.com/getphun/site',
    '__files' => [
        'modules/site/config.php' => ['install','remove','update'],
        'modules/site/library'    => ['install','remove','update'],
        'modules/site/controller' => ['install','remove']
    ],
    '__dependencies' => [],
    '_services' => [],
    '_autoload' => [
        'classes' => [
            'SiteController' => 'modules/site/controller/SiteController.php',
            'Site\\Controller\\HomeController' => 'modules/site/controller/HomeController.php',
            'Site\\Library\\Robot' => 'modules/site/library/Robot.php'
        ],
        'files' => []
    ],
    'robot' => [
        'sitemap' => [
            'site' => 'Site\\Library\\Robot::sitemap'
        ],
        'feed' => [
            'site' => 'Site\\Library\\Robot::feed'
        ]
    ]
];