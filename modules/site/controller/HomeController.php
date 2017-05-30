<?php
/**
 * Default home controller
 * @package site
 * @version 0.0.1
 * @upgrade false
 */

namespace Site\Controller;

class HomeController extends \SiteController
{
    public function indexAction(){
        $params = [
            'greeting' => 'We\'re about to get some phun'
        ];
        
        $this->respond('index', $params, 10);
    }
}