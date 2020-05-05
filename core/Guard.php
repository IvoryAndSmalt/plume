<?php

abstract class Guard
{

  /**
   * @return bool
   * @param string $user *the user that is tested*
   * @param string $role *which role is allowed to access*
   * @param array $users *array of individual users allowed to access. Expecting (integer) user id*
   * @param bool $collate *whether the specified role AND users should have access.*
   * @param bool $inherit *whether higher roles should have access.*
   */
  public static function allow(
    string $user,
    string $role = "admin",
    array $users = [],
    bool $collate = false,
    bool $inherit = true
  ): bool {
    session_start();
    if(isset($_SESSION['userid']) && !empty($_SESSION['userid'])){
      $userid = $_SESSION['userid'];
      $usersmodel = new UsersModel();
      $userrole = $usersmodel->getOneUser($userid)["role"];
    }

    return false;
  }
}
