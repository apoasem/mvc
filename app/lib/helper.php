<?php
/**
 * Created by PhpStorm.
 * User: mohamed
 * Date: 9/19/2018
 * Time: 10:30 PM
 */

namespace PHPMVC\LIB;


trait Helper
{
    public function redirect($path)
    {
        session_write_close();    // law feh session sha3'ala e2flha
        header('Location: ' . $path);
        exit;   //exit application
    }
}