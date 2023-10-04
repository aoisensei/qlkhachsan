<?php
class Signup extends Controller
{
  public $User;

  public function __construct()
  {
    $this->User = $this->model("User");
  }

  function Show()
  {

    $this->view("app", [
      "layout" => "signup",
    ]);
  }


  public function signup()
  {
    $result_mess = false;
    if (isset($_POST["btn_submit"])) {
      $username = $_POST["username"];
      $password = $_POST["password"];
      //$password = password_hash($password, PASSWORD_DEFAULT);
      $fullName = $_POST["fullName"];

      $result = $this->User->signup($username, $fullName, $password);
      if ($result) {
        header('location: /qlkhachsan/login');
      }
    } else {
      $this->view("app", [
        "layout" => "signup",
        "result" => $result_mess,
      ]);
    }
  }
}
