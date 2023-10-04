<?php
class Customer extends DbContext
{
  function GetAccount()
  {
    $sql = "SELECT * FROM account";
    return mysqli_query($this->con, $sql);
  }
}
