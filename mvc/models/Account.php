<?php 
    class Account extends DbContext{
        function GetAccount(){
            $sql = "SELECT * FROM account";
            return mysqli_query($this->con,$sql);
        }

        function GetAccountUser()
        {
            $sql = "SELECT * FROM account WHERE level = 0";
            return mysqli_query($this->con, $sql);
        }

        function GetLevelUsername($username){
            $sql = "SELECT level FROM account WHERE username='".$username."';";
            return mysqli_query($this->con, $sql);
        }

        function GetPassword($username){
            $sql = "SELECT password FROM account WHERE username='".$username."';";
            return mysqli_query($this->con, $sql);
        }

        function ChangePassword($username, $password){
            $sql = "UPDATE account SET `password` = '".$password."' WHERE username='".$username."';";
            return mysqli_query($this->con, $sql);
        }
    }

?>