<?php

namespace Tau;

use Tau\Http\Request;
use Tau\Http\Response;
use Tau\Router\Router;

class View
{
  public static function render($file, $content)
  {
    $loader = new \Twig_Loader_Filesystem(__DIR__."/Views");
    $twig   = new \Twig_Environment($loader, array("debug" => true));
    return $twig->render($file, $content);
  }
};

class App
{
  public function __construct()
  {

  }

  public static function run()
  {
    Router::route();
  }
}
