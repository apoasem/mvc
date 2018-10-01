<?php

namespace PHPMVC\Controllers;


use PHPMVC\LIB\FrontController;

class AbstractController   // ana 3aml el class da 34an bdl ma aro7 fe kol controller a7ot function  'notFoundAction' la ana ha7otha hna w kol el controllers y extendo
{
    protected $controller_name;
    protected $action_name;
    protected $params;
    protected $template;
    protected $language;

    protected $_data = [];

    public function NotFoundAction()
    {
        $this->_view();
    }


    public function setController($controllerName)
    {
        $this->controller_name = $controllerName;
    }

    public function setAction($actionName)
    {
        $this->action_name = $actionName;
    }

    public function setParams($params)
    {
        $this->params = $params;
    }

    public function setTemplate($template)
    {
        $this->template = $template;
    }

    public function setLanguage($language)
    {
        $this->language = $language;
    }

    protected function _view()
    {
        if($this->action_name == FrontController::NOT_FOUND_ACTION)
        {
            require_once VIEWS_PATH . 'notfound' . DS . 'notfound.view.php';
        }else{
            $view = VIEWS_PATH . DS . $this->controller_name . DS . $this->action_name . '.view.php';

            if(file_exists($view))  // pass data from controller to view
            {
                //var_dump($this->template); // to prevent class injection

                $this->_data = array_merge($this->_data, $this->language->getDictionary());

                $this->template->setActionView($view);
                $this->template->setAppData($this->_data);
                $this->template->renderApp();

            }else{  // still under construction
                require_once VIEWS_PATH . 'notfound' . DS . 'noview.view.php';
            }
        }
//        echo VIEWS_PATH . $this->controller_name . DS . $this->action_name;
    }
}