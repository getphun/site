<?php
/**
 * Default site controller base
 * @package site
 * @version 0.0.1
 * @upgrade false
 */

class SiteController extends Controller{
    
    public function notFoundAction(){
        $this->respond('404');
    }
    
    public function show404(){
        $this->notFoundAction();
    }
}