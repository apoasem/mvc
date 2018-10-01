<?php

namespace PHPMVC\LIB;

// this class is responsible for rendering views files

class Template
{
    private $_templateParts;
    private $_action_view;
    private $_appData;

    public function __construct(array $templateParts)
    {
        $this->_templateParts = $templateParts;
    }

    public function setActionView($actionViewPath)
    {
        $this->_action_view = $actionViewPath;
    }

    public function setAppData(Array $appData)
    {
        $this->_appData = $appData;
    }

    private function renderTemplateHeaderStart()
    {
        extract($this->_appData);  // 34an law 7byt amrr data ll goz2 da zay $title
        require_once TEMPLATE_PATH . 'templateheaderstart.php';
    }

    private function renderTemplateHeaderEnd()
    {
        extract($this->_appData);
        require_once TEMPLATE_PATH . 'templateheaderend.php';
    }

    private function renderTemplateFooter()
    {
        extract($this->_appData);
        require_once TEMPLATE_PATH . 'templatefooter.php';
    }

    public function renderTemplateBlocks()
    {
        //var_dump($this->_templateParts);
        if(! array_key_exists('template', $this->_templateParts))
        {
            trigger_error('sorry you have to define template parts', E_USER_WARNING);
        }else{
            $parts = $this->_templateParts['template'];

            if(!empty($parts))
            {
                extract($this->_appData);
                
                foreach ($parts as $partKey => $file)
                {
                    if ($partKey == ':view')
                    {
                        require_once $this->_action_view;
                    }else{
                        require_once $file;
                    }
                }
            }
        }
    }

    public function renderHeaderResources()
    {
        $output = '';

        if(! array_key_exists('header_resources', $this->_templateParts)) {
            trigger_error('sorry you have to define template parts', E_USER_WARNING);
        }else {
            $resources = $this->_templateParts['header_resources'];

            // generate css Links
            $css = $resources['css'];
            if (!empty($css))
            {
                foreach ($css as $cssKey => $path)
                {
                    $output .= '<link rel="stylesheet" href="' . $path . '"/>';
                }
            }

            // then generate Js Scripts
            $js = $resources['js'];
            if (!empty($js))
            {
                foreach ($js as $jsKey => $path)
                {
                    $output .= '<script src="' . $path . '"> </script>';
                }
            }
        }
        echo $output;
    }

    public function renderFooterResources()
    {
        $output = '';

        if (!array_key_exists('footer_resources', $this->_templateParts)) {
            trigger_error('sorry you have to define template parts', E_USER_WARNING);
        } else {
            $resources = $this->_templateParts['footer_resources'];

            // generate Js Scripts

            if (!empty($resources)) {
                foreach ($resources as $resourceKey => $path) {
                    $output .= '<script src="' . $path . '"> </script>';
                }
            }
        }
        echo $output;
    }

    public function renderApp()
    {
        $this->renderTemplateHeaderStart();  // static
        $this->renderHeaderResources();
        $this->renderTemplateHeaderEnd();   // static
        $this->renderTemplateBlocks();    // dynamic
        $this->renderFooterResources();   // static
        $this->renderTemplateFooter();    // dynamic
    }
}