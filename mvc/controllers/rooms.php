<?php 
    require_once "./mvc/core/FuncGlobal.php";

    class rooms extends Controller{

        public $Room;
        public $listBooking;

        public function __construct(){
            $this->Room = $this->model("Room");
            $this->listBooking = $this->model("BookingModel");
        }

        public function Show(){
           
            $this->view("app",[
                "layout"=>"home",
                "folder"=> "list-room",
                "file" => "listroom",
                "listRoom"=> $this->Room->GetAllRoom(),
            ]);
        }

        public function getAmountRoom($id){
            if($_SERVER['REQUEST_METHOD'] != "GET")
            {
                $this->response('',406);
            }
            
            $amountRoom="";
            $roomID = "";

            $result1 = $this->listBooking->GetIdRoomIdBooking($id);
            while ($row = $result1 -> fetch_row()) {
                $roomID = $row[0];
            }
            
            $result = $this->Room->GetAmountRoom($roomID);
            while ($row = $result -> fetch_row()) {
                $amountRoom = $row[0];
            }
            
            echo json_encode($amountRoom);
        }

        public function Booking($idRoom){

            $userName = $_COOKIE["id"];
            $DateStart = $_POST['dateIn'];
            $DateEnd = $_POST['dateOut'];
            $Amount = $_POST['quantity'];
            $idBooking="";
            $price ="";

            // lấy ra giá tiền phòng qua id
            $roomItem = $this->Room->GetRoom($idRoom);
            $row = $roomItem -> fetch_assoc();
            $priceRoom = (int)$row["priceRoom"];

            // lấy ra id cuối của booking
            // $roomItem = $this->Room->GetRoom($idRoom);

            // $getAllBooking =$this->listBooking->GetAllBooking();
            // while($row = mysqli_fetch_array($getAllBooking)){
            //     $idBooking = $row["idBooking"];
            // }; 
            // $idBooking = cutId($idBooking);

            
            //thêm dữ liệu vào bảng booking
            $arrayId = array();
            
            $result = $this->listBooking->GetAllBooking();
            
            while($row = mysqli_fetch_assoc($result)){
                array_push($arrayId,cutIdRoom($row["idBooking"]));
            };
         
             for($i=0; $i < count($arrayId)-1 ; $i++){
                 if((int)$arrayId[$i] > (int)$arrayId[$i + 1]){
                     $arrayId[$i + 1] = $arrayId[$i];
                 }
             }

             $idBooking = "BK".(string)((int)$arrayId[count($arrayId)-1] + 1)."";

            $AmountDate = amountDate($DateStart,$DateEnd);
            $price = $AmountDate * $priceRoom *(int)$Amount;

            //thêm
            $this->listBooking->CreactBooking($idBooking,$userName,$idRoom,$DateStart,$DateEnd,$Amount,$price);
            //cart
            header("Location: http://localhost:8080/qlkhachsan/cart");
        }
        
    };

    function cutIdRoom($stringId){
        $result = str_replace("BK","",$stringId);
        return $result;
    }
    
?>
