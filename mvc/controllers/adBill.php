<?php
class adBill extends Controller
{
  public $hoaDonModel;

  public function __construct()

  {

    $this->hoaDonModel = $this->model("hoaDonModel");

  }

  function Show()
  {
    $u = $this->model('hoaDonModel');
    $this->view("app", [
      "layout" => "admin",
      "folder" => "adBill",
      "file" => "listBill",
      "bill" => $u->GetAllBill(),
    ]);
  }
  
  public function search()

  {

    $listSearchBill = $this->model('hoaDonModel');

    if (isset($_POST['search'])) {

      $namekey = $_POST['namekey'];

      $result = $this->hoaDonModel->searchBill($namekey);

      if ($result) {



        $this->view("app", [

          "layout" => "admin",

          "folder" => "adBill",

          "file" => "searchBill",

          "listSearchBill" => $listSearchBill->searchBill($namekey),

        ]);

      } else {

        echo "Không tồn tại";

      }

    }

  }
}
