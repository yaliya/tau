<?php

namespace Tau\Controllers;

use Tau\View;
use Tau\Session;
use Tau\Http\Response;

class TestController
{
  public function index()
  {
    return View::render("index.html", array(
      "framework" => Session::get("framework")
    ));
  }

  public function test()
  {
    return Response::json(array(
      "framework" => Session::get("framework")
    ));
  }
}
