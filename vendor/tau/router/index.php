<?php

require "vendor/autoload.php";

use Tau\Router\Router;

Router::get("/", function() {
  return "Hi Home";
});

Router::get("/hello/:user", function($user) {
  return "Hello ".$user;
});

Router::route();
