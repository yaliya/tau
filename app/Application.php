<?php

namespace Tau;

use Tau\View\View;
use Tau\View\Twig;
use Tau\Router\Router;
use Tau\Database\DBAL\MySQL;

class Application
{
  public function __construct($rootDir) {
    $dotenv = new \Dotenv\Dotenv($rootDir);
    $dotenv->load();

    ini_set('display_errors', $_ENV["APP_DEBUG"]);

    MySQL::connect(array(
      "host" => $_ENV["DB_HOST"],
      "user" => $_ENV["DB_USER"],
      "password" => $_ENV["DB_PASSWORD"],
      "database" => $_ENV["DB_DATABASE"]
    ));

    View::init(new Twig(array(
      "debug" => $_ENV["APP_DEBUG"],
      "views" => $rootDir."/app/Views/",
      "cache" => $rootDir."/storage/cache/templates/"
    )));

    Router::route();
  }
};
