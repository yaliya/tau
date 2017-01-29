<?php

namespace Tau;

use Tau\View\View;
use Tau\View\Twig;
use Tau\Router\Router;
use Tau\Database\DBAL\MySQL;
use Dontenv\Dontenv;

class App
{
  public function __construct()
  {

  }

  public static function init()
  {
    $dotenv = new \Dotenv\Dotenv(__DIR__."/../");
    $dotenv->load();

    MySQL::connect(array(
      "host"      => $_ENV["DB_HOST"],
      "user"      => $_ENV["DB_USER"],
      "password"  => $_ENV["DB_PASSWORD"],
      "database"  => $_ENV["DB_DATABASE"]
    ));

    View::init(new Twig(array(
      "debug" => true,
      "views" => __DIR__."/../app/Views/",
      "cache" => __DIR__."/../storage/cache/templates/"
    )));
  }

  public static function run()
  {
    Router::route();
  }
}
