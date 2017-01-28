<?php

namespace Tau;

use Tau\Views\View;
use Tau\Views\Twig;
use Tau\Router\Router;
use Tau\Database\DBAL\MySQL;

class App
{
  public function __construct()
  {

  }

  public static function init()
  {
    MySQL::connect(array(
      "host"      => "localhost",
      "user"      => "homestead",
      "password"  => "secret",
      "database"  => "homestead"
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
