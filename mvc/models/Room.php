<?php 
    class Room extends DbContext{
        
        public function GetAllRoom(){
            $sql = "SELECT * FROM room";
            return mysqli_query($this->con,$sql);
        }

        public function GetRoom($idRoom){
            $sql = "SELECT * FROM room WHERE idRoom = '".$idRoom."'";
            return mysqli_query($this->con,$sql);
        }

        public function GetAmountRoom($idRoom){
            $sql = "SELECT amount FROM room WHERE idRoom = '".$idRoom."'";
            return mysqli_query($this->con,$sql);
        }

        public function GetAmountRoomBK($idRoom){
            $sql = "SELECT * FROM booking WHERE idRoom='".$idRoom."' AND checking=0";
            return mysqli_query($this->con,$sql);
        }

        public function GetFillRoom($string,$price,$type){
            if($price!="" && $type!=""){
                $sql = "SELECT * FROM room WHERE priceRoom>=".$price." AND nameRoom LIKE '%".$string."%' AND typeRoom='".$type."';";
                return mysqli_query($this->con,$sql);
            }
            else if($price!=""){
                $sql = "SELECT * FROM room WHERE priceRoom>=".$price." AND nameRoom LIKE '%".$string."%' ";
                return mysqli_query($this->con,$sql);
            }else if($type!=""){
                $sql = "SELECT * FROM room WHERE nameRoom LIKE '%".$string."%' AND typeRoom='".$type."';";
                return mysqli_query($this->con,$sql);
            }else{
                $sql = "SELECT * FROM room WHERE nameRoom LIKE '%".$string."%'";
                return mysqli_query($this->con,$sql);
            }
        }
    }
?>