<?php

    define("ABSOLUTE_PATH", $_SERVER["DOCUMENT_ROOT"]."/projects/PP-sajt/");
    define("ENV_FILE", ABSOLUTE_PATH."config/.env");
    define("LOG_FILE", ABSOLUTE_PATH."data/log.txt");
    define("LOG_ACC", ABSOLUTE_PATH."data/accounts.txt");

    define("HOST", env("HOST"));
    define("DATABASE", env("DATABASE"));
    define("USERNAME", env("USERNAME"));
    define("PASSWORD", env("PASSWORD"));
      
    function env($element){
        
        $file = fopen(ENV_FILE, "r");
        $content = fread($file, filesize(ENV_FILE));
        $x = null;
        $arr = explode("\n", $content);

        for($i=0; $i<count($arr); $i++){
            list($name, $value) = explode("=", $arr[$i]);
            if($element == $name){
                $x = $value;
            }
        }
        return trim($x);

    }