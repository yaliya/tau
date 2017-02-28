<?php

use Tau\Router\Router;

Router::get("/api/test", "TestController@test");

Router::post("/api/auth", "CheckinController@auth");

Router::post("/api/send", "CheckinController@send");
