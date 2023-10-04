<?php
class hoaDonModel extends DbContext
{

    public function GetListRoom($username){
        $sql = "SELECT * FROM booking INNER JOIN room ON booking.idRoom = room.idRoom WHERE booking.username='".$username."' and startDate >= CURDATE() and checking=0";
        return mysqli_query($this->con,$sql);
    }

    public function SelectId($username){
        $sql = "select idBooking from booking where username='$username' and checking=0";
        $result=mysqli_query($this->con,$sql);
        $row = mysqli_fetch_array($result);
        $array[0]=array(
                'Mã Đặt Phòng'=>$row['idBooking']
            );
        for($i=1;$i < mysqli_num_rows($result);$i++){
            $row = mysqli_fetch_array($result);
            $array[$i]=array(
                'Mã Đặt Phòng'=>$row['idBooking']
            );
        
        }
            
        return json_encode($array,JSON_UNESCAPED_UNICODE);
    }

    public function updatedListRoom($username){
        $sql = "update booking set checking=1 where username='$username' ";
        return mysqli_query($this->con,$sql);
    }

    public function submitBooking($username,$ListIdBooking){
        $sql = "insert into bill(username,idBooking) values('$username','$ListIdBooking')";
        mysqli_query($this->con,$sql);
        return mysqli_insert_id($this->con);
    }

    public function submitBill($paymentDate,$paymentType,$total,$idBill,$ListIdBooking){
        $sql = "update bill set paymentDate='$paymentDate',paymentType='$paymentType',total ='$total',idBooking= '$ListIdBooking' where idBill='$idBill'";
        return mysqli_query($this->con,$sql);
    }

    public function deleteBooking($idBill){
        $sql = "delete from bill where idBill='$idBill'";
        return mysqli_query($this->con,$sql);
    }

    public function GetAllBill(){
        $sql = "select * from bill";
        return mysqli_query($this->con,$sql);
    }

    public function searchBill($namekey)
    {

        $sql = "SELECT * FROM bill WHERE username LIKE '%$namekey%'";

        $result = $this->select($sql);

        return $result;

    }
}