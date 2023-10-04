<?php
class Login extends Controller
{

  function Show()
  {

    $this->view("app", [
      "layout" => "login",
    ]);
  }

  /* function GetListAccount()
  {
    $model = $this->model("Account");
    $this->view("page/service", ["listAccount" => $model->GetAccount()]);
  } */

  public $User;

  public function __construct()
  {
    $this->User = $this->model("User");
  }
  public function login()
  {
    $result_mess = false;
    if (isset($_POST['submit'])) {
      $username = $_POST['username'];
      $password_input = $_POST['password'];

      if (empty($_POST["username"]) || empty($_POST["password"])) {
        $this->view("app", [
          "layout" => "login",
          "result" => $result_mess,
        ]);
      }

      $result = $this->User->login($username);
      if (mysqli_num_rows($result)) {

        while ($row = mysqli_fetch_array($result)) {
          $id = $row["id"];
          $username = $row["username"];
          $password = $row["password"];
        }
        if ($password === $password_input) {
          setcookie("id", $username, time() + 3600, "/", "", 0);
          header("location: http://localhost:8080/qlkhachsan/");
        } else {
          $this->view("app", [
            "layout" => "login",
            "result" => $result_mess,
          ]);
        }
      } else {
        $this->view("app", [
          "layout" => "login",
          "result" => $result_mess,
        ]);
      }
    } else {
      $this->view("app", [
        "layout" => "login",
        "result" => $result_mess,
      ]);
    }
  }
  public function logout()
  {
    setcookie("id", true, time() - 3600, "/");
    $this->view("app", [
      "layout" => "home",
      "folder" => "home-content",
      "file" => "homecontent",
    ]);
  }
}
