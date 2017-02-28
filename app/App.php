<?php

namespace Tau;

use Tau\View\View;
use Tau\Router\Router;
use Tau\Database\DBAL\MySQL;
use Tau\Database\ORM\Model;

class App
{
  public function __construct($path) {
    $dotenv = new \Dotenv\Dotenv($path);
    $dotenv->load();

    ini_set('display_errors', $_ENV["APP_DEBUG"]);

    MySQL::connect(array(
      "host" => $_ENV["DB_HOST"],
      "user" => $_ENV["DB_USER"],
      "password" => $_ENV["DB_PASSWORD"],
      "database" => $_ENV["DB_DATABASE"]
    ));

    View::init(new \Tau\View\Twig(array(
      "debug" => $_ENV["APP_DEBUG"],
      "views" => $path."/".$_ENV["APP_VIEWS"]
    )));

    Router::route();
  }
}
