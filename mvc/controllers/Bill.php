<?php
class Bill extends Controller
{

    public function Show()
    {
        
        $username = $_COOKIE['id'];
        $bill = $this->model("hoaDonModel");
        $this->view("app", [
            "layout" => "home",
            "folder" => "bill",
            "file" => "bill",
            "hd" => $bill->getListRoom("$username"),
        ]);
        if(isset($_POST['back'])){
            $this->view("app",[
                "dlt"=>$bill->deleteBooking($_SESSION["last_id"]),
            ]); 
            echo "<script>window.location.href='/qlkhachsan/Cart'</script>";
        }
        else if(isset($_POST['submit'])){
            $paymentDate =date('Y-m-d H:i:s');
            $paymentType=$_POST["txtPaymentType"];
            $total=$_POST["txtTotal"];
            $a=$bill->SelectId($username);
            $this->view("app",[
                "submit"=>$bill->submitBill($paymentDate,$paymentType,$total,$_SESSION["last_id"],$a),
                $bill->updatedListRoom($username),
            ]); 
            echo "<script>window.location.href='/qlkhachsan/'</script>";
        }
    }

   
};