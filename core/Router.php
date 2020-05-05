<?php

class Router
{
  // 1. constructor
  public function __construct()
  {
    // URL parser: check for url presence
    if (isset($_GET['url'])) {
      // explode url to find route & parameters
      $tokens = explode('/', rtrim($_GET['url'], '/'));
      // glue route together
      $route = implode("/", array_slice($tokens, 0, 2));
      // check for existing route
      if (in_array($route, Registry::routes())) {

        $controllerName = ucfirst(array_shift($tokens)) . 'Controller';
        $controller = new $controllerName;
        $method = array_shift($tokens);
        $controller->$method($tokens);
      }
      // route not found. Either controller or method is wrong
      else {

        $controller = new NotFoundController;
        $controller->displayErrorMessage("Unregistered route");
      }
    }
    //no url has been found... call home controller instead
    else {
      if (file_exists('Controllers/HomeController.php')) {
        $controller = new HomeController;
        $controller->index();
      } else {
        echo "Default controller not found.";
      }
    }
  }

  static function redirect(string $route, bool $guarded = false): void
  {
    if ($guarded) {
      header("Location: " . Env::baseUrl() . $route);
      exit;
    }
  }
}
