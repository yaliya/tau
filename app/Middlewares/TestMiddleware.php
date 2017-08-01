<?php

namespace Tau\Middlewares;

use Tau\Session;

class TestMiddleware
{
  public function request() {
    // Code
    Session::save("framework", array(
      "name"    => "Tau",
      "version" => getenv("APP_VERSION"),
      "licence" => getenv("APP_LICENCE")
    ));
  }
}
