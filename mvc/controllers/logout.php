<?php
class logout extends Controller
{
  public function logout()
  {
    setcookie("id", true, time() - 3600, "/");
    setcookie("PHPSESSID", true, time()-3600,"/");
    
    header("Location: http://localhost:8080/qlkhachsan/");
  }
}
