<?php
class dashboardRoom
{
  private $db;
  public function __construct()
  {
    $this->db = new DbContext();
  }


  public function GetRoom($idRoom)
  {
    $sql = "SELECT * FROM room WHERE idRoom = '$idRoom'";
    $result = $this->db->select($sql);
    return $result;
  }

  public function delete($idRoom)
  {
    $sql = "DELETE FROM room WHERE idRoom = '$idRoom'";
    $result = false;
    $result = $this->db->execute($sql);
    if ($result) {
      return true;
    } else {
      return false;
    }
  }

  public function update($idRoom, $typeRoom, $nameRoom, $priceRoom, $amount)
  {
    $sql = "UPDATE room SET typeRoom = '$typeRoom', nameRoom = '$nameRoom', priceRoom = '$priceRoom', amount = '$amount' WHERE idRoom = '$idRoom'";
    $result = $this->db->execute($sql);
    if ($result) {
      return true;
    } else {
      return false;
    }
  }

  public function addRoom($idRoom, $typeRoom, $nameRoom, $priceRoom, $amount)
  {
    $sql = "i room SET typeRoom = '$typeRoom', nameRoom = '$nameRoom', priceRoom = '$priceRoom', amount = '$amount' WHERE idRoom = '$idRoom'";
    $result = $this->db->execute($sql);
    if ($result) {
      return true;
    } else {
      return false;
    }
  }

  public function searchRoom($namekey)
  {
    $sql = "SELECT * FROM room WHERE idRoom LIKE '%$namekey%'";
    $result = $this->db->select($sql);
    return $result;
  }
}
