<div class="header">
    <?php 
        require_once "./mvc/views/components/header/header.php";
    ?>
</div>
<div class="home"> 
    <?php 
        require_once "./mvc/views/components/".$data["folder"]."/".$data["file"].".php";
    ?>
</div>
<div class="footer">
    <?php 
        require_once "./mvc/views/components/footer/footer.php";
    ?>     
</div>

<script>

    let header = document.querySelector(".header");
    let home = document.querySelector(".home");

    function scrolled(){
        if(document.body.scrollTop > 80 || document.documentElement.scrollTop >80){
            header.classList.add('active');
            home.classList.add('active');
        }else{
            header.classList.remove('active');
            home.classList.remove('active');
        }
    }

    window.onscroll = scrolled;

</script>