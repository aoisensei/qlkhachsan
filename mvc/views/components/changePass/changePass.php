<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;700;800&display=swap" rel="stylesheet" />
  <style>
    <?php require_once './mvc/views/components/changePass/changePass.css' ?>
  </style>
</head>

<body>

  <div class="container">
    <div class="form signup-form">
      <div class="login-form">
        <form class="form__change" action="" method="POST">
          <h2>Đổi mật khẩu</h2>
          <div class="inputBox">
            <input type="password"  class="password"  required="required" name="password" />
            <i></i>
            <span>Mật khẩu cũ</span>
          </div>

          <div class="inputBox">
            <input type="password" class="passwordnew" required="required" name="passwordnew" />
            <i></i>
            <span>Mật khẩu mới</span>
          </div>

          <div class="inputBox">
            <input type="password" class="passwordnewRetype" required="required" name="passwordnewRetype" />
            <i></i>
            <span>Nhập lại mật khẩu</span>
          </div>

          <input class="btnLogin btnSignup" id="change__password" type="submit" value="Đổi mật khẩu" name="btn_submit" />
        </form>
        <?php
            if(isset($data["active"])){
                echo '
                    <span class=text__conment>'.$data["active"].'</span>
                    <form action=/qlkhachsan>
                        <button class=text__return__home>Quay lại trang chủ</button>
                    </form>
                ';
            };
            
        ?>
        
      </div>
    </div>
  </div>
</body>

<script>
    var formChange = document.querySelector('.form__change');
    var passwordnewRetype = document.querySelector(".passwordnewRetype");
    var passwordnew = document.querySelector(".passwordnew");
    var password = document.querySelector(".password");
    var userName = document.cookie;

    function getCookie(cname) {
        let name = cname + "=";
        let ca = document.cookie.split(';');
        for(let i=0; i<ca.length; i++) {
            let c = ca[i];
            let arr = c.split('=');
            if(arr.length == 2){
                if(String(arr[0]) == " id"){
                    return String(arr[1]);
                }
            }
        }
        return "";
    }
    console.log("đạt")
    
    formChange.action="/qlkhachsan/changePassword/editPassword/"+getCookie(userName);
    
    document.getElementById("change__password").addEventListener("click", function(event){
        console.log(passwordnew.innerHTML);
        if(password.value !== ""){
            if(passwordnew.value !== passwordnewRetype.value){
                event.preventDefault();
                alert("Mật khẩu mới và nhập lại mật khẩu không trùng nhau!!!");
                // passwordnewRetype.forcus();
            }
        }
    });

    
</script>

</html>