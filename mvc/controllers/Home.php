<?php 
    class Home extends Controller{

        function Show(){
            $listRooms = $this->model("Room");

            $this->view("app",[
                "layout"=>"home",
                "folder"=> "home-content",
                "file" => "homecontent",
                "listRoom"=> $listRooms->GetAllRoom(),
            ]);
        }

        function GetListAccount(){
            $model = $this->model("Account");
            $this->view("page/service",["listAccount"=> $model->GetAccount()]);
        }
        
    };
?>