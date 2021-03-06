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
 | Application bootstraping
 |------------------------------------
 |
 |  Include all things that do stuff that needs
 |  to be done before the application is bootstraped
 |
*/

require "../bootstrap/app.php";

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

return new Tau\Application(
  realpath(dirname(__DIR__))
);
