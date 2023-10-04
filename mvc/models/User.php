<?php
class User extends DbContext
{
  public function signup($username, $fullName, $password)
  {
    $sql = "INSERT INTO account(username, password, fullName) VALUES ('$username', '$password', '$fullName')";
    return mysqli_query($this->con, $sql);
  }
  public function login($username)
  {
    $sql = "SELECT * FROM account WHERE username = '$username'";
    return mysqli_query($this->con, $sql);
  }
}
