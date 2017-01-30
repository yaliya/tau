<?php

/*
 |------------------------------------
 | Register the Composer Auto Loader
 |------------------------------------
 |
 |  Load all classes using composer autoloader.
 |  This will make our lifes easier down the road.
 |
*/

require "../vendor/autoload.php";

/*
 |------------------------------------
 | Register the Web Routes
 |------------------------------------
 |
 |  Web Routes include all Router routes which
 |  return a web view from the processed request.
 |
*/

require "../routes/web.php";

/*
 |------------------------------------
 | Register the Api Routes
 |------------------------------------
 |
 |  Api Routes include all Router routes which
 |  return json data from the processed request.
 |
*/

require "../routes/api.php";

/*
 |------------------------------------
 | Run the Application
 |------------------------------------
 |
 |  Here the application bootstraping ends
 |  and the request is processed by the Router.
 |
*/

return new Tau\Foundation\Application(
  realpath(dirname(__DIR__))
);
