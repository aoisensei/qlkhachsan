<?php 
    class BookingModel extends DbContext{

        public function GetAllBooking(){
            $sql = "SELECT * FROM booking";
            return mysqli_query($this->con,$sql);
        }

        public function GetAllBookingId($userName){
            $sql = "SELECT * FROM booking INNER JOIN room ON booking.idRoom = room.idRoom WHERE booking.tenTK='".$userName."'";
            return mysqli_query($this->con,$sql);
        }

        // get idRoom in Booking
        public function GetIdRoomIdBooking($id){
            $sql = "SELECT idRoom FROM booking WHERE idBooking = '".$id."'";
            return mysqli_query($this->con,$sql);
        }

        // get amount room of idRoom in Booking
        public function GetAmountRoom($id){
            $sql = "SELECT amountBk FROM booking WHERE idRoom = '".$id."'";
            return mysqli_query($this->con,$sql);
        }
        
        public function CreactBooking($idBooking,$userName,$idRoom,$DateStart,$DateEnd,$Amount,$price){
            $sql="INSERT INTO booking(idBooking, username, idRoom, startDate, endDate, amountBk, price)
                 VALUES ('".$idBooking."','".$userName."','".$idRoom."','".$DateStart."','".$DateEnd."','".$Amount."','".$price."')";
            mysqli_query($this->con,$sql);
        }

        public function UpdateBooking($idBooking,$DateStart,$DateEnd,$Amount,$price){
            $sql = "UPDATE booking SET startDate='".$DateStart."',endDate='".$DateEnd."',amountBk='".$Amount."',price='".$price."' WHERE idBooking = '".$idBooking."'";
            mysqli_query($this->con,$sql);
        }

        public function DeleteBooking($idBooking){
            $sql = "DELETE FROM booking WHERE idBooking='".$idBooking."'";
            mysqli_query($this->con,$sql);
        }
    }
?>