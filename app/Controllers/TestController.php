<?php

namespace Tau\Controllers;

use Tau\View\View;
use Tau\Http\Response;
use Tau\Database\ORM\Model;

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
