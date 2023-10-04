<style>
    <?php 
        require_once './mvc/views/components/room-home/roomhome.css';
    ?>
</style>

<?php 
    $array = [];

    require_once './mvc/views/components/room/room.php';

    while($row = mysqli_fetch_array($data["listRoom"])){
        array_push($array,$row);
    };

?>

<div class="home--room">
    <div class="home__room">
        <h1 class="home__room__title">Phòng khách sạn</h1>
        <span>223 phòng nghỉ từ tiêu chuẩn đến cao cấp được bố trí hài hòa
            trong khuôn viên khách sạn. Tất cả các phòng nghỉ đều sở hữu tiện
            nghi đẳng cấp, không gian thoáng đạt cùng hiên ban công lãng mạn với
            tầm nhìn bảo quát khung cảnh thiên kỳ vĩ.
        </span>
        <ul class="home__room__items">
            <?php 
            if(count($array)<3){
                for($i=0; $i< count($array); $i++){
                    echo(
                        Room($array[$i])
                    );
                }
            }else{
                for($i=0; $i< 3; $i++){
                    echo(
                        Room($array[$i])
                    );
                }
            }
            ?>
        </ul>
    </div>
</div>