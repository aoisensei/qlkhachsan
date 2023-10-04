<?php
    class DbContext{
        public $con;
        public $servername="localhost";
        public $username="root";
        public $password="";
        public $dbname="qlkhachsan";

        function __construct(){
            $this->con = mysqli_connect($this->servername, $this->username, $this->password);
            mysqli_select_db($this->con,$this->dbname);
            mysqli_query($this->con, "SET NAMES 'utf8'");
        }

        public function execute($sql)
        {
            $result = $this->con->query($sql);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
        public function select($sql)
        {
            $data = null;
            $result = $this->con->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
                return $data;
            }
        }
    }
?>