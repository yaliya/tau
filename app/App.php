<?php

namespace Tau;

use Tau\Views\View;
use Tau\Views\Twig;
use Tau\Router\Router;

class App
{
  public function __construct()
  {

  }

  public static function init()
  {
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
