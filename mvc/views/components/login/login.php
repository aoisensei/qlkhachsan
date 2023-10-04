<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <!-- <link rel="stylesheet" type="text/css" href="../../public/css/login.css" /> -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;700;800&display=swap" rel="stylesheet" />
  <style>
    <?php require_once "./mvc/views/components/login/login.css" ?>
  </style>
</head>

<body>

  <div class="container">

    <div class="form">

      <div class="login-form">

        <?php
        if (isset($data['result'])) {
          if ($data["result"] == "true") {
          } else { ?>
            <h5>
              <?php echo "Tài khoản hoặc mật khẩu không đúng"
              ?>
            </h5>
        <?php
          }
        }
        ?>
        <form action="qlkhachsan/login/login" method="POST">
          <h2>Đăng nhập</h2>

          <div class="inputBox">
            <input type="text" required="required" name="username" />
            <i></i>
            <span>Tên tài khoản</span>
          </div>

          <div class="inputBox">
            <input type="password" required="required" name="password" />
            <i></i>
            <span>Mật khẩu</span>
          </div>

          <div class="links">
            <a href="#">Quên mật khẩu</a>
            <a href="/qlkhachsan/signup">Đăng ký</a>
          </div>

          <div class="noti"></div>

          <input class="btnLogin" type="submit" value="Login" name="submit" />
        </form>
      </div>
    </div>
  </div>

</body>

</html>