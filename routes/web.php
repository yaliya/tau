<?php

use Tau\Route;

//Simple route with controller
Route::get("/", "TestController@index")
      //using middleware
      ->after("TestMiddleware");
