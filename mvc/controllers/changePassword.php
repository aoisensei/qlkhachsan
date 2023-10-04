<?php
class changePassword extends Controller
{
  public $account;

  public function __construct()
  {
    $this->account = $this->model("Account");
  }

  function Show()
  {
    $this->view("app", [
      "layout" => "changePassLayout",
    ]);
  }

  function editPassword($username)
  {
    $password = $_POST["password"];
    $passwordnew = $_POST["passwordnew"];
    $passwordSV;

    $result = $this->account->GetPassword($username);


    while ($row = $result -> fetch_row()) {
        $passwordSV = $row[0];
    }

    if((string)$passwordSV != (string)$password){
        $this->view("app", [
            "layout" => "changePassLayout",
            "active" => "Mật khẩu không chính xác",
          ]);
    }else{
        $this->view("app", [
            "layout" => "changePassLayout",
            "listRoom"=> $this->account->ChangePassword($username, $passwordnew),
            "active" => "Thay đổi mật khẩu thành công",
          ]);
    }
  }

}
