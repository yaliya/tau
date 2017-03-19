<?php

namespace Tau\Middlewares;

use Tau\Session;

class TestMiddleware
{
  public function request() {
    // Code
    Session::save("framework", array(
      "name"    => "Tau",
      "version" => $_ENV["APP_VERSION"],
      "licence" => $_ENV["APP_LICENCE"]
    ));
  }
}
