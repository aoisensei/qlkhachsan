<?php 
    class Cart extends Controller{

        function Show(){
            $listCarts = $this->model("CartModel");
            $bill = $this->model("hoaDonModel");
            $username = $_COOKIE["id"];

            $this->view("app",[
                "layout"=>"home",
                "folder"=> "cart",
                "file" => "cart",
                "listcart"=> $listCarts->GetAllCart($username),
            ]); 

            if(isset($_POST["booking"])){
                $a=$bill->SelectId($username);
                $_SESSION["last_id"]=$bill->submitBooking($username,$a);
                echo "<script>window.location.href='/qlkhachsan/Bill'</script>";
            }
        }
        
        public function getCountBooking(){

            $listCarts = $this->model("CartModel");

            $username = $_COOKIE["id"];

            echo mysqli_num_rows($listCarts->GetAllCart($username));

        }
    };
?>