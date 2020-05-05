<?php

class NotFoundController extends Controller
{

  protected $name = "Not Found";

  public function displayErrorMessage(String $message)
  {
    echo "404 : " . $message;
  }
}
