<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;700;800&display=swap" rel="stylesheet" />
  <style>
    <?php require_once './mvc/views/components/signup/signup.css' ?>
  </style>
</head>

<body>

  <div class="container">
    <div class="form signup-form">
      <div class="login-form">
        <form action="qlkhachsan/Signup/signup" method="POST">
          <?php
          if (isset($data['result'])) {
            if ($data["result"] == "true") {
            } else { ?>
              <h5>
                <?php echo "Đã tồn tại toàn khoản đăng ký"
                ?>
              </h5>
          <?php
            }
          }
          ?>

          <h2>Đăng ký</h2>


          <div class="inputBox">
            <input type="text" required="required" name="username" />
            <i></i>
            <span>Tên tài khoản</span>
          </div>

          <div class="inputBox">
            <input type="text" required="required" name="fullName" />
            <i></i>
            <span>Họ và tên</span>
          </div>

          <div class="inputBox">
            <input type="password" required="required" name="password" />
            <i></i>
            <span>Mật khẩu</span>
          </div>

          <input class="btnLogin btnSignup" type="submit" value="Đăng ký" name="btn_submit" />
        </form>
      </div>
    </div>
  </div>
</body>

</html>