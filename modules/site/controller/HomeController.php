<?php
/**
 * Default home controller
 * @package site
 * @version 0.0.1
 * @upgrade false
 */

namespace Site\Controller;
use Site\Meta\Home;

class HomeController extends \SiteController
{
    public function indexAction(){
        $params = [
            'home' => new \stdClass()
        ];
        
        $params['home']->meta = Home::index();
        
        $this->respond('index', $params, 10);
    }
}