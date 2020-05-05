<?php

class UsersController extends Controller
{

  private $args;
  private $model;
  protected $name = "Users";

  public function __construct()
  {
    $this->model = new UsersModel();
  }


  public function index(): void
  {
    $data = $this->model->getAllUsers();
    $this->render('users/index', $data);
  }

  public function show(): void
  {
    // ignores other arguments. First one is assumed to be id of user, ignores others
    if (isset(func_get_args()[0][0]) && !empty(func_get_args()[0][0])) {
      $this->args = (int) func_get_args()[0][0];
      if ($this->args !== 0) {
        if ($data = $this->model->getOneUser($this->args)) {
          $this->render('users/show', $data);
        } else {
          $data = $this->args;
          $this->render('users/notfound', $data);
        }
      } else {
        $this->render('users/notfound');
      }
    } else {
      $this->render('users/notfound');
    }
  }

  public function delete()
  {
    $this->args = func_get_args();
    echo "delete 1 user";
  }
}
