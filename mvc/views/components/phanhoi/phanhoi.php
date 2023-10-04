<style>
    <?php require_once "./mvc/views/components/phanhoi/phanhoi.css" ?>
</style>

<?php 

    $cookieValue = $_COOKIE['id'];

    function getCookie($cname) { 
        $name = $cname . "="; 
        $ca = explode(';', $_COOKIE); 
        foreach ($ca as $cookie) { 
            $arr = explode('=', $cookie); 
            if (count($arr) == 2) { 
                if (trim($arr[0]) == "id") { 
                    return trim($arr[1]); 
                } 
            } 
        } 
        return ""; 
    }

?>

<form class="wrap-form" action="/qlkhachsan/phanhoi/PhanHoiKhachHang/<?php echo $cookieValue ?>" method="POST">
    <h1 class="label-ph">Phản hồi của khách hàng</h1>
    <div class="wrap-text" >
        <textarea id="feedbackkh" class="text-area" rows="5" cols="100" placeholder="Nhập nội dung phản hồi..." name="khachhangph"></textarea>
    </div>
    <button id="feedBack" type="submit" class="btn btn-primary">Phản hồi</button>
</form>


<script>
    document.getElementById("feedBack").addEventListener("click", function(event) {

        var feedbacktext = document.getElementById("feedbackkh").value;

        if(feedbacktext === '') {
            event.preventDefault();
            alert("Vui lòng nhập ý kiến phản hồi!!!");
        }
        else {
            alert("Phản hồi thành công!!!");
        }
    })
</script>