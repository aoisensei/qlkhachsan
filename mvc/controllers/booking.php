<?php 
    require_once "./mvc/core/FuncGlobal.php";

    class booking extends Controller{
        public $Room;
        public $listBooking;
        
        public function __construct(){
            $this->Room = $this->model("Room");
            $this->listBooking = $this->model("BookingModel");
        }
        
        public function GetAmountRoomId($id){
            $roomID = "";
            $amountRoomID=0;

            $result1 = $this->listBooking->GetIdRoomIdBooking($id);
            while ($row = $result1 -> fetch_row()) {
                $roomID = $row[0];
            }

            $result2 = $this->listBooking->GetAmountRoom($roomID);
            while($row = mysqli_fetch_array($result2)){
                $amountRoomID += (int)$row["amountBk"];
            }
            echo json_encode($amountRoomID);
        }

        public function editbooking($idBooking){
            
            $DateStart = $_POST["dateIn"];
            $DateEnd = $_POST["dateOut"];
            $Amount = $_POST["quantity"];
            $roomID ="";

            $result1 = $this->listBooking->GetIdRoomIdBooking($idBooking);
            while ($row = $result1 -> fetch_row()) {
                $roomID = $row[0];
            }

            // Xử lý tiền phòng
            $roomItem = $this->Room->GetRoom($roomID);
            $row = $roomItem -> fetch_assoc();
            $priceRoom = (int)$row["priceRoom"];

            $AmountDate = amountDate($DateStart,$DateEnd);
            $price = $AmountDate * $priceRoom *(int)$Amount;

            $this->listBooking->UpdateBooking($idBooking,$DateStart,$DateEnd,$Amount,$price);
            
            header("Location: http://localhost:8080/qlkhachsan/cart");
        }

        public function deletebooking($idBooking){
            $this->listBooking->DeleteBooking($idBooking);
            header("Location: http://localhost:8080/qlkhachsan/cart");
        }
    };
    
?>
