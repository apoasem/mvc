<?php

namespace PHPMVC\LIB;

class FrontController
{  // da el pattern aw el class ely byst2bl el request w ytl3ly el controller , action , params w y7dd el controller ely hnady 3leh w anhy action goah


    const NOT_FOUND_ACTION = 'NotFoundAction';
    const NOT_FOUND_CONTROLLER = 'PHPMVC\Controllers\NotFoundController';

    private $_controller = 'index';
    private $_action = 'default';
    private $_params = array();
    private $_template;
    private $_language;

    function __construct(Template $template, Language $language)
    {
        $this->parseUrl();
        $this->_template = $template;
        $this->_language = $language;
    }

    private function parseUrl()
    {
        $url = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'), 3);

        if(isset($url[0]) && $url[0] != '')
        {
            $this->_controller = $url[0];
        }

        if(isset($url[1]) && $url[1] != '')
        {
            $this->_action = $url[1];
        }

        if(isset($url[2]) && $url[2] != '')
        {
            $this->_params = explode('/', $url[2]);
        }

        //var_dump($this);
    }

    public function dispatch()
    {
        // call classes from index/controller/params

        $controllerClassName = 'PHPMVC\Controllers\\' . ucfirst($this->_controller) . 'Controller';

        $actionName = $this->_action . 'Action';  // kda el mafrod 3ndy defaultAction function fe kol Controller fa bdl kda h7ot function wa7da fel abstractController w 5las


        if(!class_exists($controllerClassName)) // fire autoload
        {
            $controllerClassName =  self::NOT_FOUND_CONTROLLER;
        }

        // else
        $controller = new $controllerClassName();

        if(!method_exists($controller, $actionName) )
        {
            $this->_action = $actionName = self::NOT_FOUND_ACTION;
        }// else $actionName still equal 'DefaultAction'

        $controller->setController($this->_controller);
        $controller->setAction($this->_action);
        $controller->setParams($this->_params);
        $controller->setTemplate($this->_template);    // to prevent class injection
        $controller->setLanguage($this->_language);

        //var_dump($controller);
        $controller->$actionName();  // hnady 3la Action function goa ayan ma kan el controller ely tl3
    }
}