<?php

namespace Tau;

class Application
{
  public function __construct($rootDir) {

    Database::init([
      'driver'    => getenv("DB_DRIVER"),
      'host'      => getenv("DB_HOST"),
      'database'  => getenv("DB_NAME"),
      'username'  => getenv("DB_USER"),
      'password'  => getenv("DB_PASS"),
      'charset'   => 'utf8',
      'collation' => 'utf8_general_ci',
      'prefix'    => ''
    ]);

    View::init(new View\Twig([
      "debug" => true, 
      "views" => $rootDir."/app/Views/",
      "cache" => $rootDir."/storage/cache/templates/"
    ]));

    Route::route();
  }
};
