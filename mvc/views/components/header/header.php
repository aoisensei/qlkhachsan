<style>
    <?php 
        require_once "./mvc/views/components/header/header.css"; 
    ?>
</style>

<?php 
    
    $links = array(
        '/qlkhachsan' => array(
            'type' => 'Giới thiệu',
            'path' => '',
        ),
        '/qlkhachsan/new' => array(
            'type' => 'Tin tức',
            'path' => 'new',
        ),
        '/qlkhachsan/listroom' => array(
            'type' => 'Các phòng cho thuê',
            'path' => 'listroom',
        ),
        // '/qlkhachsan/contact' => array(
        //     'type' => 'Liên hệ',
        //     'path' => 'contact',
        // ),
        '/qlkhachsan/phanhoi' => array(
            'type' => 'Phản hồi',
            'path' => 'phanhoi',
        ),
    );

    $dropdownlinks = array(
        // '/qlkhachsan/cart' => array(
        //     'type' => 'Phòng đã đặt',
        //     'class' => "cart",
        // ),
        '/qlkhachsan/language' => array(
            'type' => 'Ngôn ngữ',
            'class' => 'language',
        ),
        '/qlkhachsan/changePassword' => array(
            'type' => 'Đổi mật khẩu',
            'class' => 'changepass',
        ),
        '/qlkhachsan/admin' => array(
            'type' => 'Quản lý khách sạn',
            'class' => 'admin',
        ),
        '/qlkhachsan/logout/logout' => array(
            'type' => 'Đăng xuất',
            'class' => 'logout',
        ),
    );

    
    $path = "";
    if(isset($_GET["url"])){
       $paths = explode("/",filter_var(trim($_GET["url"], "/")));
       if($paths[0])
            $path = $paths[0];
    }
?>

<div class="header__content">
    <div class="header__content__logo">
        <a href="/qlkhachsan">
            <img src="https://printgo.vn/uploads/media/774255/tong-hop-cac-mau-thiet-ke-logo-khach-san-sang-trong-dang-cap-2020_1587108774.jpg" alt="">
        </a>
    </div>
    <div class="header__content__link">
        <ul class="header__content__link__items">
            <?php 
                foreach($links as $link => $type){
                    $active = $path==$type["path"] ? "active" : "";
                    echo "<li class='header__content__link__items__item $active'><a href=".$link.">".$type['type']."</a></li>";
                }
            ?>
        </ul>
    </div>
    <div class="header__content__account">
        <div class="header__content__account__login">
            <a href="/qlkhachsan/login">Đăng Nhập</a>
        </div>
        <div class="header__content__account__register">
            <a href="/qlkhachsan/signup">Đăng Ký</a>
        </div>
        <div class="header__content__account__user">
            <i class='bx bx-user-circle'></i>
            <span class="header__content__account__user__name">văn đạt</span>
        </div>
    </div>
    <div class="header__content__setting">
        <i class='bx bxs-cog header__content__setting__icon'></i>
        <ul class="header__content__setting__dropdown">
            <?php 
                foreach($dropdownlinks as $link => $type){
                    echo "<li class='header__content__setting__dropdown__".$type['class']."'><a class=black href=".$link.">".$type['type']."</a></li>";
                }
            ?>
        </ul>
    </div>
</div>

<script>
    var hoverActiveDropdown = document.querySelector(".header__content__setting");
    var accountShowUser = document.querySelector(".header__content__account");
    var spanShowUserName = document.querySelector(".header__content__account__user__name");
    var adminShowUserName = document.querySelector(".header__content__setting__dropdown__admin");
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

    if(getCookie(userName) !== ""){
        hoverActiveDropdown.classList.add("active");
        accountShowUser.classList.add("active");
        spanShowUserName.innerHTML = getCookie(userName);

        fetch("http://localhost:8080/qlkhachsan/adAccount/getLevelUsername/"+getCookie(userName))
            .then(function(response) {
                return response.json();
            })
            .then(function(data){
                if(data===1){
                    adminShowUserName.classList.add("active");
                }
            })
            .catch(err => {
                console.log('Error :-S', err)
            });
    }
</script>
