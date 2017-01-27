<?php

namespace Tau\Controllers;

use Tau\Views\View;
use Tau\Http\Response;

class TestController
{
  public function index()
  {
    return View::render("index.html", array(
      "name" => "Tau"
    ));
  }

  public function test()
  {
    return Response::json(array(
      "name" => "Tau"
    ));
  }
}
