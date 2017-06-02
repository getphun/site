<?php
/**
 * Home meta provider
 * @package site
 * @version 0.0.1
 * @upgrade true
 */

namespace Site\Meta;

class Home
{

    static function index(){
        $home = (object)[
            '_schemas' => [],
            '_metas'   => []
        ];
        
        $mod_site_param = module_exists('site-param');
        
        $dis = \Phun::$dispatcher;
        
        $page_name  = $dis->config->name;
        $page_title = $dis->config->name;
        $page_url   = $dis->router->to('siteHome');
        $page_logo  = $page_url . 'theme/site/static/logo/500x500.png';
        $page_desc  = 'Default frontpage of ' . $page_title;
        $page_keys  = '';
        
        if($mod_site_param){
            $page_title = $dis->setting->frontpage_title ?? $page_title;
            $page_desc  = $dis->setting->frontpage_description ?? $page_desc;
            $page_keys  = $dis->setting->frontpage_keywords;
        }
        
        // Standar site meta
        $home->_metas = [
            'title'         => $page_title,
            'image'         => $page_logo,
            'description'   => $page_desc,
            'keywords'      => $page_keys,
            'type'          => 'website',
            'canonical'     => $page_url
        ];
        
        // Global RSS Feed
        if(module_exists('robot'))
            $home->_metas['feed'] = $dis->router->to('robotFeedXML');
        
        // SCHEMA Organization
        $schema = [
            '@context'      => 'http://schema.org',
            '@type'         => 'Organization',
            'name'          => $page_name,
            'url'           => $page_url,
            'logo'          => $page_logo
        ];
        
        // SCHEMA Organization Socials
        $site_socials = [
            'facebook',
            'google_plus',
            'instagram',
            'linkedin',
            'myspace',
            'pinterest',
            'soundcloud',
            'tumblr',
            'twitter',
            'youtube'
        ];
        $socials = [];
        if($mod_site_param){
            foreach($site_socials as $soc){
                $url = $dis->setting->{'social_' . $soc};
                if($url)
                    $socials[] = $url;
            }
        }
        if($socials)
            $schema['sameAs'] = $socials;
        
        // SCHEMA Organization Contact
        $phone_numbers = [
            'billing_support'       => 'billing support',
            'customer_support'      => 'customer support',
            'emergency'             => 'emergency',
            'reservations'          => 'reservations',
            'sales'                 => 'sales',
            'technical_support'     => 'technical support'
        ];
        $contacts = [];
        if($mod_site_param){
            foreach($phone_numbers as $type => $name){
                $val = $dis->setting->{'phone_' . $type};
                if(!$val)
                    continue;
                $contacts[] = [
                    '@type'         => 'ContactPoint',
                    'telephone'     => $val,
                    'contactType'   => $name
                ];
            }
        }
        if($contacts)
            $schema['contactPoint'] = $contacts;
        
        $home->_schemas[] = $schema;
        
        // SCHEMA Website
        $schema = [
            '@context'      => 'http://schema.org',
            '@type'         => 'WebSite',
            'url'           => $page_url,
            'description'   => $page_desc,
            'headline'      => $page_title,
            'publisher'     => [
                '@type'         => 'Organization',
                'name'          => $page_name
            ],
            'image'         => $page_logo,
            'name'          => $page_name
        ];
        
        // SCHEMA Website Search Action
        if($dis->router->exists('siteSearch')){
            $schema['potentialAction'] = [
                '@type'             => 'SearchAction',
                'target'            => $dis->router->to('siteSearch') . '?q={search_term_string}',
                'query-input'       => 'required name=search_term_string'
            ];
        }

        $home->_schemas[] = $schema;
        
        return $home;
    }
}