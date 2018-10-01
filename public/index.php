<?php
/**
 * Created by PhpStorm.
 * User: mohamed
 * Date: 9/17/2018
 * Time: 4:33 PM
 */

namespace PHPMVC;

session_start();

// teszzzzzzzzzzzzzzzzzzzz

use PHPMVC\LIB\FrontController;
use PHPMVC\LIB\Language;
use PHPMVC\LIB\Template;

// tesssssssssssssts

if(! defined('DS'))
{
    define('DS', DIRECTORY_SEPARATOR);
}

require_once '..' . DS . 'app' . DS . 'config' . DS . 'config.php';
require_once '..' . DS . 'app' . DS . 'lib' . DS . 'autoload.php';
$template_parts = require_once  '..' . DS . 'app' . DS . 'config' . DS . 'templateconfig.php';
//var_dump($template);

if(! isset($_SESSION['lang']))
{
    $_SESSION['lang'] = APP_DEFAULT_LANGUAGE;
}


$templateObj = new Template($template_parts);  // to prevent class injection
$languageObj = new Language();

$frontController = new FrontController($templateObj, $languageObj); // pass obj to Front controller   // to prevent class injection

$frontController->dispatch();

//
