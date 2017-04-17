<?php

namespace Tau;

class Application
{
  public function __construct($rootDir) {

    Database::init([
      'driver'    => $_ENV["DB_DRIVER"],
      'host'      => $_ENV["DB_HOST"],
      'database'  => $_ENV["DB_NAME"],
      'username'  => $_ENV["DB_USER"],
      'password'  => $_ENV["DB_PASS"],
      'charset'   => 'utf8',
      'collation' => 'utf8_general_ci',
      'prefix'    => ''
    ]);

    View::init(new View\Twig(array(
      "debug" => $_ENV["APP_DEBUG"],
      "views" => $rootDir."/app/Views/",
      "cache" => $rootDir."/storage/cache/templates/"
    )));

    Route::route();
  }
};
