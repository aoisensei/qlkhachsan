<style>
    <?php 
        require_once "./mvc/views/components/list-room/listroom.css";
    ?>
</style>

<div class="list--room">
    <div class="list--room__image">
       <img src="http://chupanhnoithat.vn/upload/images/ch%E1%BB%A5p%20h%C3%ACnh%20qu%E1%BA%A3ng%20c%C3%A1o%20kh%C3%A1ch%20s%E1%BA%A1n.JPG" alt="">
    </div>
    <div class="list--room__content">
        <div class="list--room__content__layout">
            <form method="POST" action="/qlkhachsan/listroom/getListRoomFill" class="list--room__content__layout__filter">
                <div class="list--room__content__layout__filter__input">
                    <input name="inputroom" type="text" placeholder="Nhập thông tin tìm kiếm" <?php if(isset($data["valueInput"])){
                                    print("value = ".$data["valueInput"]."");
                                }?>  >
                </div>
                <div class="list--room__content__layout__filter__option">
                    <div class="list--room__content__layout__filter__option__price">
                        <span>Chọn giá phòng: </span>
                        <select name="priceroom" id="priceroom">
                            <option value="">---Tất cả---</option>
                            
                            <option value="1000000" <?php if(isset($data["valuePrice"])){
                                    (int)$data["valuePrice"] == 1000000 ? print("selected") : "";
                                }?>  >từ 1.000.000 VNĐ trở lên</option>
                            
                            <option value="2000000" <?php if(isset($data["valuePrice"])){
                                    (int)$data["valuePrice"] == 2000000 ? print("selected") : ""; 
                                }?>  >từ 2.000.000 VNĐ trở lên</option>
                            
                            <option value="3000000" <?php if(isset($data["valuePrice"])){
                                    (int)$data["valuePrice"] == 3000000 ? print("selected") : ""; 
                                }?>  >từ 3.000.000 VNĐ trở lên</option>
                        </select>
                    </div>
                    <div class="list--room__content__layout__filter__option__type">
                        <span>Chọn loại phòng: </span>
                        <select name="typeroom" id="typeroom">
                            <option value="">---Tất cả---</option>

                            <option value="vip" <?php if(isset($data["valueType"])){
                                    $data["valueType"] == "vip" ? print("selected") : ""; 
                                }?>  >Vip</option>

                            <option value="thường" <?php if(isset($data["valueType"])){
                                    $data["valueType"] == "thường" ? print("selected") : ""; 
                                }?>  >Thường</option>
                        </select>
                    </div>
                </div>
                <div class="list--room__content__layout__filter__submit">
                    <button type="submit">Tìm Kiếm</button>
                </div>
                
            </form>

            <?php 
                require_once "./mvc/views/components/room/room.php";
            ?>

            <ul class="list--room__content__layout__rooms">
                <?php 
                    if($data["listRoom"])
                        while($row = mysqli_fetch_array($data["listRoom"])){
                            echo(
                                Room($row)
                            );
                        };
                ?>
            </ul>
        </div>
    </div>
</div>