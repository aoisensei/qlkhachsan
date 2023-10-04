<div class="content-wrapper" style="min-height: 353px;">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Chăm sóc khách hàng</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Tài khoản</a></li>
            <li class="breadcrumb-item active">Admin</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

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

  <section class="content">
    <div class="container-fluid">
        <?php
            if (isset($data['result'])) {
                if($data['result'] == false) { ?>
                    <h5>Vui lòng nhập phản hồi</h5>
                <?php }
            }
        ?>
        <?php foreach ($data['findCSKH'] as $listFeedback) : extract($listFeedback); ?>
            <form action="/qlkhachsan/adCSKH/update/<?php echo $maphanhoi ?>/<?php echo $cookieValue ?>" method="post">
                <div class="wrap-text" >
                    <textarea id="feedbacknv" class="text-area" rows="5" cols="100" placeholder="Nhập nội dung phản hồi..." name="nhanvienph"></textarea>
                </div>
                
                <button type="submit" name="btn-cskh" class="btn btn-primary">Hoàn thành</button>
            </form>
        <?php endforeach; ?>
    </div>
  </section>
</div>

