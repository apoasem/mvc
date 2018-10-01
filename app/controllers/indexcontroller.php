<?php
/**
 * Created by PhpStorm.
 * User: mohamed
 * Date: 9/17/2018
 * Time: 11:03 PM
 */

namespace PHPMVC\Controllers;

class IndexController extends AbstractController
{
    public function defaultAction()
    {
        $this->language->load('template.common');
        $this->_view();
    }
}