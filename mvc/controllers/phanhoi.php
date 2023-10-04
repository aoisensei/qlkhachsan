<?php

    class phanhoi extends Controller {
        public function __construct() {
            $this->feedback = $this->model("QLPhanHoi");
        }

        function Show(){

            $this->view("app",[
                "layout"=>"home",
                "folder"=> "phanhoi",
                "file" => "phanhoi",
            ]);
        }

        function PhanHoiKhachHang($cookieValue) {
            $khachhangph = $_POST['khachhangph'];

            $this->feedback->KHPhanHoi($cookieValue, $khachhangph);

            header("Location: http://localhost:8080/qlkhachsan/phanhoi");
            
        }
    }

?>