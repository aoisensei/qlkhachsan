<?php
class adRoom extends Controller
{
  public $dashboardRoom;
  public $Room;

  public function __construct()
  {
    $this->dashboardRoom = $this->model("dashboardRoom");
    $this->Room = $this->model("Room");
  }

  function Show()
  {
    $listRoom = $this->model("Room");

    $this->view("app", [
      "layout" => "admin",
      "folder" => "adRoom",
      "file" => "listRoom",
      "listRoom" => $listRoom->GetAllRoom(),
    ]);
  }

  //Thêm
  public function addRoom()
  {
    $result_mess = false;
    if (isset($_POST["addRoom"])) {
      $idRoom = $_POST["idRoom"];
      $typeRoom = $_POST["typeRoom"];
      $nameRoom = $_POST["nameRoom"];
      $priceRoom = $_POST["priceRoom"];
      $amount = $_POST["amount"];

      $result = $this->Room->addRoom($idRoom, $typeRoom, $nameRoom, $priceRoom, $amount);
      if ($result) {
        header('location:8080/qlkhachsan/adRoom');
      }
    }
    $this->view("app", [
      "layout" => "admin",
      "folder" => "adRoom",
      "file" => "addRoom",
    ]);
  }

  //Sửa
  function update($idRoom)
  {
    $findRoom = $this->dashboardRoom->GetRoom($idRoom);

    if (isset($_POST['btn-editRoom'])) {
      $result = $this->dashboardRoom->update($idRoom, $_POST['typeRoom'], $_POST['nameRoom'], $_POST['priceRoom'], $_POST['amount']);
      if ($result) {
        header('location: /qlkhachsan/adRoom');
      } else {
        $message = "Sửa thất bại!";
        echo "<script type='text/javascript'>alert('$message');</script>";
      }
    }

    $this->view("app", [
      "layout" => "admin",
      "folder" => "adRoom",
      "file" => "editRoom",
      "findRoom" => $findRoom,
    ]);
  }

  //Xóa
  public function delete($idRoom)
  {
    $delete = $this->dashboardRoom->delete($idRoom);
    if ($delete) {
      header('location: /qlkhachsan/adRoom');
    }
    $listRoom = $this->model("Room");
    $this->view("app", [
      "layout" => "admin",
      "folder" => "adRoom",
      "file" => "listRoom",
      "listRoom" => $listRoom->GetAllRoom(),
    ]);
  }

  public function search()
  {
    $listSearchRoom = $this->model("dashboardRoom");
    if (isset($_POST['search'])) {
      $namekey = $_POST['namekey'];
      $result = $this->dashboardRoom->searchRoom($namekey);
      if ($result) {

        $this->view("app", [
          "layout" => "admin",
          "folder" => "adRoom",
          "file" => "searchRoom",
          "listSearchRoom" => $listSearchRoom->searchRoom($namekey),
        ]);
      } else {
        echo "Không tồn tại";
      }
    }
  }
}
