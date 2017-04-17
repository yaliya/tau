<?php

use Tau\Route;

//Api route with custom response
Route::get("/api/test", "TestController@test")
      //After middleware
      ->after("TestMiddleware");
