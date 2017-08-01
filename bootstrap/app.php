<?php

/*
 |------------------------------------
 | Register the Environment Config
 |------------------------------------
 |
 |  Dotenv makes it easy to create app configs that
 |  will be globally accessible through the entire app.
 |
*/

$dotenv = new \Dotenv\Dotenv(realpath(dirname(__DIR__)));

/*
 |------------------------------------
 | Load the enviroment configuration
 |------------------------------------
 |
 |  This will load the .env file and make
 |  everything available through the $_ENV global
 |
*/

$dotenv->overload();


/*
 |------------------------------------
 | Display PHP errors based
 |------------------------------------
 |
 |  This will use the APP_DEBUG global in the environment
 |  congiruation and set instruct PHP wether to display errors.
 |
*/
ini_set('display_errors',  getenv('APP_DEBUG'));

/*
 |------------------------------------
 | Display PHP errors based
 |------------------------------------
 |
 |  This will use the APP_DEBUG global in the environment
 |  congiruation and set instruct PHP wether to display errors.
 |
*/
ini_set('display_startup_errors', getenv('APP_DEBUG'));

/*
 |------------------------------------
 | Set default application timezone
 |------------------------------------
 |
 |  This will set the default application timezone.
 |
*/
date_default_timezone_set(getenv("APP_TIMEZONE"));

