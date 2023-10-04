<?php
class Admin extends Controller
{

  function Show()
  {
    $listOrder = $this->model("Order");

    $this->view("app", [
      "layout" => "admin",
      "folder" => "admin",
      "file" => "adHome",

    ]);
  }
}
