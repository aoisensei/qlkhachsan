<style>
    <?php 
        require_once './mvc/views/components/room/room.css';
    ?>
</style>

<?php 
    require_once("./mvc/core/FuncGlobal.php");

   function Room($value) {
        $h1 =   "   <li>
                        <a href=/qlkhachsan/listroom/booking/".$value["idRoom"].">
                            <div class=room-item>
                                <div class=room-item__image>
                                    <img src=".$value["image"]." alt=>
                                </div>
                                <div class=room-item__introduce>
                                    <h1>".$value["nameRoom"]."</h1>
                                    <span>".$value["description"]."</span>
                                    <div class=room-item__introduce__content>
                                        <span class=room-item__introduce__content__type>".$value["typeRoom"]."</span>
                                        <span class=room-item__introduce__content__price>".cuttingPrice($value["priceRoom"])." VNĐ</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>";

        return $h1 ;
    }
?>