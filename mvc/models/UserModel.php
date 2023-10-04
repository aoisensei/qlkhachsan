<?php

class UserModel
{
  private $db;
  public function __construct()
  {
    $this->db = new DbContext();
  }

  public function addAcc($username, $fullName, $password, $phoneNumber, $address, $email)
  {
    $sql = "INSERT INTO account(username, password, fullName, phoneNumber, address, email) VALUES ('$username', '$password', '$fullName', '$phoneNumber', '$address', '$email')";
    $result = $this->db->execute($sql);
    if ($result) {
      return true;
    } else {
      return false;
    }
  }

  public function getEdit($id)
  {
    $sql = "SELECT * FROM account WHERE id = '$id'";
    $result = $this->db->select($sql);
    return $result;
  }

  public function update($id, $username, $fullName, $address, $phoneNumber, $email)
  {
    $sql = "UPDATE account SET username = '$username', fullName = '$fullName', phoneNumber = '$phoneNumber', address = '$address', email = '$email' WHERE id = '$id'";
    $result = $this->db->execute($sql);
    if ($result) {
      return true;
    } else {
      return false;
    }
  }

  public function delete($id)
  {
    $sql = "DELETE FROM account WHERE id = $id";
    $result = false;
    $result = $this->db->execute($sql);
    if ($result) {
      return true;
    } else {
      return false;
    }
  }

  public function searchAcc($namekey)
  {
    $sql = "SELECT * FROM account WHERE fullName LIKE '%$namekey%' AND level = 0";
    $result = $this->db->select($sql);
    return $result;
  }
}
