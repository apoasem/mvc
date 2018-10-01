<?php
namespace PHPMVC\LIB;

class Language 
{
    private $dictionary = [];

    public function load($path)
    {
        $default_lang = APP_DEFAULT_LANGUAGE;

        if(isset($_SESSION['lang']))
        {
            $default_lang = $_SESSION['lang'];
        }
        
        $pathArr = explode('.', $path);
        $languageFileToload = LANGUAGES_PATH . $default_lang . DS . $pathArr[0] . DS . $pathArr[1] . '.lang.php';
        //var_dump($languageFileToload);

        if(file_exists($languageFileToload))
        {
            require $languageFileToload;

            if (is_array($_) && !empty($_))
            {
                    foreach ($_ as $key => $value)
                    {
                        if(! array_key_exists($key, $this->dictionary))
                        {
                            $this->dictionary[$key] = $value;
                        }
                    }
                //var_dump($this->dictionary);

            }else{
                trigger_error("sorry the language file" . $path . "doesn't exists", E_USER_WARNING);
            }
        }
    }


    public function getDictionary()
    {
        return $this->dictionary;
    }
}