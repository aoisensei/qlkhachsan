<?php

    class QLPhanHoi extends DbContext{
        function GetPhanHoi(){
            $sql = "SELECT * FROM cskh WHERE manhanvien = ''";
            return mysqli_query($this->con,$sql);
        }

        function KHPhanHoi($userName, $phanHoi)
        {
            $sql = "INSERT INTO cskh(makhachhang, manhanvien, phanhoi, cskh) VALUES ('".$userName."','', '".$phanHoi."', '')";
            return mysqli_query($this->con, $sql);
        }

        function ChamSocKH($userName, $chamSocKH, $maPhanHoi){
            $sql = "UPDATE cskh SET manhanvien='".$userName."', cskh='".$chamSocKH."' WHERE maphanhoi = '".$maPhanHoi."'";
            mysqli_query($this->con,$sql);
        }

        function GetPhanHoiById($maPhanHoi) {
            $sql = "SELECT * FROM cskh WHERE maphanhoi = '".$maPhanHoi."'";
            return mysqli_query($this->con,$sql);
        }
    }

?>

