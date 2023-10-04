<?php 
    class listroom extends Controller{

        public $listRooms;
        
        public function __construct(){
            
            $this->listRooms = $this->model("Room");
        }

        public function Show(){

            $this->view("app",[
                "layout"=>"home",
                "folder"=> "list-room",
                "file" => "listroom",
                "listRoom"=> $this->listRooms->GetAllRoom(),
            ]);
        }

        public function getListRoomFill(){
                $stringInput = "";
                $price = "";
                $type = "";
                if(isset($_POST["inputroom"])){
                    $stringInput = $_POST["inputroom"];
                }
                if(isset($_POST["priceroom"])){
                    $price = $_POST["priceroom"];
                }
                if(isset($_POST["typeroom"])){
                    $type = $_POST["typeroom"];
                }

                $this->view("app",[
                    "layout"=>"home",
                    "folder"=> "list-room",
                    "file" => "listroom",
                    "valueInput" => $stringInput,
                    "valuePrice" => $price,
                    "valueType" => $type,
                    "listRoom"=> $this->listRooms->GetFillRoom($stringInput,$price,$type),
                ]);
            
            
        }

        public function Booking($idRoom){

            $result = $this->listRooms->GetAmountRoomBK($idRoom);
            $result1 = $this->listRooms->GetAmountRoom($idRoom);

            $amountId;

            while ($row = $result1 -> fetch_row()) {
                $amountId = $row[0];
            }

            $amount = (int)$amountId - (int)$result->num_rows;

            $this->view("app",[
                "layout"=>"home",
                "folder"=> "booking",
                "file" => "booking",
                "roomItem" => $this->listRooms->GetRoom($idRoom),
                "amountIdBk" => $amount,
            ]);
        }
    };
?>