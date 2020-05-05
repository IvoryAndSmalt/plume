<?php
class Controller
{

  private $view;

  public function getCtName(): string
  {
    return $this->name;
  }

  protected function render(string $viewPath, $data = null): void
  {
    $this->data = $data;
    $this->view = "./Views/{$viewPath}.php";
    require_once "./Views/layout.php";
  }
}
