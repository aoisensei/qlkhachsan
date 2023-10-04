<?php 
    function cuttingPrice($stringPrice){
        $stringPrices = strrev($stringPrice);
        $result = "";
        $i=0;
        while($i<strlen($stringPrices)){
            $result ="".$result."".substr($stringPrices,$i,3).".";
            $i += 3;
            
        }

        return substr(strrev($result),1);
    }

    function cutId($stringId){
        $result = str_replace("BK","",$stringId);
        $result = (int)$result + 1;
        return "BK$result";
    }

    function amountDate($dateStart, $dateEnd){
        $first_date = strtotime($dateStart);
        $second_date = strtotime($dateEnd);
        $datediff = abs($first_date - $second_date);
        return floor($datediff / (60*60*24));
    }
?>