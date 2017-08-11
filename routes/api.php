<?php

use Tau\Route;


//Api route with custom response
Route::post("/api/test", "TestController@test")
      //After middleware
      ->after("TestMiddleware");