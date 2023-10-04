<?php 
    class CartModel extends DbContext{
        
        public function GetAllCart($userName){
            $sql = "SELECT * FROM booking INNER JOIN room ON booking.idRoom = room.idRoom WHERE booking.username='".$userName."' and startDate >= CURDATE() and checking=0";
            return mysqli_query($this->con,$sql);
        }

        
    }
?>