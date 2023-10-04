<?php
class Order extends DbContext
{
  public function GetAllOrder()
  {
    $sql = "SELECT booking.idBooking, booking.idRoom, account.fullName, account.phoneNumber, booking.startDate, booking.endDate FROM `booking` INNER JOIN account ON booking.username = account.username;";
    return mysqli_query($this->con, $sql);
  }
  public function delete($idBooking)
  {
    $sql = "DELETE FROM booking WHERE idBooking = '$idBooking'";
    return mysqli_query($this->con, $sql);
  }

  public function searchOrder($namekey)
  {
    $sql = "SELECT booking.idBooking, booking.idRoom, account.fullName, account.phoneNumber, booking.startDate, booking.endDate FROM `booking` INNER JOIN account ON booking.username = account.username WHERE idBooking LIKE '%$namekey%'";
    $result = $this->select($sql);
    return $result;
  }
}
