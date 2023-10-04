<?php
class adAccount extends Controller
{
  public $UserModel;
  public function __construct()
  {
    $this->UserModel = $this->model("UserModel");
  }

  function Show()
  {
    $listAccount = $this->model("Account");

    $this->view("app", [
      "layout" => "admin",
      "folder" => "adAccount",
      "file" => "listAccount",
      "listAccount" => $listAccount->GetAccountUser(),
    ]);
  }

  //Thêm
  public function addAcc()
  {
    echo("aaa");
    $result_mess = false;
    if (isset($_POST['addAcc'])) {
      $username = $_POST["username"];
      $password = $_POST["password"];
      $fullName = $_POST["fullName"];
      $phoneNumber = $_POST["phoneNumber"];
      $address = $_POST["address"];
      $email = $_POST["email"];

      $result = $this->UserModel->addAcc($username, $fullName, $password, $phoneNumber, $address, $email);
      if ($result) {
        header('location: /qlkhachsan/adAccount');
      } else {
        $this->view("app", [
          "layout" => "admin",
          "folder" => "adAccount",
          "file" => "addAcc",
        ]);
      }
    }

    $this->view("app", [
      "layout" => "admin",
      "folder" => "adAccount",
      "file" => "addAcc",
    ]);
  }

  //Sửa
  function update($id)
  {
    $findUser = $this->UserModel->getEdit($id);

    if (isset($_POST['btn-edit'])) {
      $result = $this->UserModel->update($id, $_POST['username'], $_POST['fullName'], $_POST['phoneNumber'], $_POST['address'], $_POST['email']);
      if ($result) {
        header('location: /qlkhachsan/adAccount');
      } else {
        header('location: /qlkhachsan/adAccount/update/');
      }
    }

    $this->view("app", [
      "layout" => "admin",
      "folder" => "adAccount",
      "file" => "editAccount",
      "findUser" => $findUser,
    ]);
  }

  //Xóa
  public function delete($id)
  {
    $this->UserModel->delete($id);

    header('location: /qlkhachsan/adAccount');
  }

  //Tìm kiếm

  public function search()
  {
    $listSearchAcc = $this->model("UserModel");
    if (isset($_POST['search'])) {
      $namekey = $_POST['namekey'];
      $result = $this->UserModel->searchAcc($namekey);
      if ($result) {

        $this->view("app", [
          "layout" => "admin",
          "folder" => "adAccount",
          "file" => "searchAcc",
          "listSearchAcc" => $listSearchAcc->searchAcc($namekey),
        ]);
      } else {
        echo "Không tồn tại";
      }
    }
  }

  public function getLevelUsername($username){
    $listAccount = $this->model("Account");
    $result = $listAccount->GetLevelUsername($username);
    $row = $result -> fetch_assoc();
    $level = $row["level"];
    echo $level;
  }
};
