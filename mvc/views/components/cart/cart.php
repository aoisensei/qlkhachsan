<style>
    <?php 
        require_once "./mvc/views/components/cart/cart.css";
    ?>
</style>

<?php

    require_once "./mvc/core/FuncGlobal.php";

    $statistical = 0;
    $array = [];

    while($row = mysqli_fetch_array($data["listcart"])){
        array_push($array,$row);
    }

    for($i=0; $i< count($array); $i++){
        $statistical += (int)($array[$i]["price"]);
    }
    
?>



    <div class="cart">
        <div class="cart__statistical">
            <span class="cart__statistical__content">Bạn đang có 
                <span><?php echo count($array)?></span> sản phẩm trong giỏ hàng
            </span>
            <div class="cart__statistical__price">
                <span>Thành tiền: </span>
                <span><?php echo cuttingPrice($statistical) ?> VNĐ</span>
            </div>
            <button id="cart__statistical__booking" class="cart__statistical__button" >Tiếp tục đặt hàng</button>
            <form action="" method="POST">
                <button type="submit" name="booking" style="padding: 7px 40px;" class="cart__statistical__button" onclick="tt()">Thanh toán</button>
            </form>
            <button id="cart__statistical__home" class="cart__statistical__button">Quay lại trang chủ</button>
        </div>
    <table class="cart__table table table-dark">
        <thead class="cart__table__header">
            <tr>
                <th scope="col">Ảnh phòng</th>
                <th scope="col">Tên phòng</th>
                <th scope="col">Loại phòng</th>
                <th scope="col">Ngày nhận</th>
                <th scope="col">Ngày trả</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Thành tiền</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody class="cart__table__body">
             <?php 
                for($i=0; $i< count($array); $i++){
                    echo(
                        "<tr class=cart__table__body__item>
                            <td class=cart__table__body__item__image>
                                <img src=".$array[$i]["image"]." alt=>
                            </td>
                            <td class=cart__table__body__item__name>".$array[$i]["nameRoom"]."</td>
                            <td class=cart__table__body__item__type>".$array[$i]["typeRoom"]."</td>
                            <td class='cart__table__body__item__date-start__".$array[$i]["idBooking"]."'>".$array[$i]["startDate"]."</td>
                            <td class='cart__table__body__item__date-end__".$array[$i]["idBooking"]."'>".$array[$i]["endDate"]."</td>
                            <td class='cart__table__body__item__amountBk__".$array[$i]["idBooking"]."'>".$array[$i]["amountBk"]."</td>
                            <td class=cart__table__body__item__price>".$array[$i]["price"]."</td>
                            <td class='cart__table__body__item__icon cart__table__body__item__edit' onclick=editBooking('".$array[$i]["idBooking"]."')>
                                <i class='bx bxs-edit-alt'></i>
                            </td>
                            <td class='cart__table__body__item__icon cart__table__body__item__delete' onclick=deleteBooking('".$array[$i]["idBooking"]."')>
                                <i class='bx bxs-trash'></i>
                            </td>
                        </tr>"
                    );
                };
            ?>
            
        </tbody>
    </table>
    <div class="cart__edit">
        <i class='bx bx-x cart__edit__close' onclick="closeBooking()" ></i>
        <form action="" method="POST" class="cart__edit__form">
            <h1>Thay đổi thông tin đặt phòng</h1>
            <div class="cart__edit__content">
                <div class="cart__edit__content__date">
                    <div class="cart__edit__content__datestart">
                        <span>Ngày nhận phòng: </span>
                        <input id="datein" name="dateIn" type="date">
                    </div>
                    <div class="cart__edit__content__dateend">
                        <span>Ngày trả phòng: </span>
                        <input id="dateout" name="dateOut" type="date">
                    </div>
                </div>
                <div class="cart__edit__content__amount">
                    <span>Số phòng: </span>
                    <input id="roomAcount" type="number" name="quantity" min="1" max="12">
                </div>
            </div>
            <div class="cart__edit__button">
                <button id="myCheckedit">Lưu thay đổi</button>
            </div>
        </form>
    </div>
</div>



<script>

    let editbooking = document.querySelector(".cart__edit");
    let formBooking = document.querySelector(".cart__edit__form");
    let dateIn = document.getElementById("datein");
    let dateOut = document.getElementById("dateout");
    let inputAcount = document.getElementById("roomAcount");
    let roomAcount;
    let roomAcountUsed;

    //trang chủ
    document.getElementById("cart__statistical__home").addEventListener("click", function(event){
        window.location="http://localhost:8080/qlkhachsan";
    });

    //tiếp tục đặt hàng
    document.getElementById("cart__statistical__booking").addEventListener("click", function(event){
        window.location="http://localhost:8080/qlkhachsan/listroom";
    });


    function editBooking(id){
        editbooking.classList.add('active');
        formBooking.action="/qlkhachsan/booking/editbooking/"+id;

        let startDateId = document.querySelector(".cart__table__body__item__date-start__"+id);
        let startEndId = document.querySelector(".cart__table__body__item__date-end__"+id);
        let amountBkId = document.querySelector(".cart__table__body__item__amountBk__"+id);

        console.log(startDateId)

        dateIn.value = startDateId.innerHTML;
        dateOut.value = startEndId.innerHTML;
        inputAcount.value = amountBkId.innerHTML;

        //fetch api get amount
        fetch("http://localhost:8080/qlkhachsan/rooms/getAmountRoom/"+id)
            .then(function(response) {
                return response.json();
            })
            .then(function(data){
                roomAcount=data;
            })
            .catch(err => {
                console.log('Error :-S', err)
            });

        // fetch api get amount user
        fetch("http://localhost:8080/qlkhachsan/booking/GetAmountRoomId/"+id)
            .then(function(response) {
                return response.json();
            })
            .then(function(data){
                roomAcountUsed = data;
            })
            .catch(err => {
                console.log('Error :-S', err)
            });
    }

    function cutDate(date){
        return date.split("-");
    }

    //change
    document.getElementById("myCheckedit").addEventListener("click", function(event){

        if(dateIn.value === "" || dateOut.value === "" || inputAcount.value === "" ){
            if(dateIn.value === ""){
                event.preventDefault();
                alert("Vui lòng chọn ngày nhận phòng trước khi đặt!");
            }
            else if(dateOut.value === ""){
                event.preventDefault();
                alert("Vui lòng chọn ngày trả phòng trước khi đặt!");
            }
            else if(inputAcount.value === ""){
                event.preventDefault();
                alert("Vui lòng chọn số lượng phòng muốn đặt đặt!");
            }
        }
        else{
            let arrDateIn = cutDate(dateIn.value);
            let monthIn = Number(arrDateIn[1])-1;
            let dateIn1 =new Date(arrDateIn[0],monthIn,arrDateIn[2])
            let dateIn2 = new Date()

            let arrDateOut = cutDate(dateOut.value);
            let monthOut = Number(arrDateOut[1])-1;
            let dateOut1 =new Date(arrDateOut[0],monthOut,arrDateOut[2]);

            if(dateIn1 < dateIn2){
                event.preventDefault();
                alert("Vui lòng chọn lại ngày nhận phòng trước khi đặt!");
            }
            else if(dateIn1 > dateOut1){
                event.preventDefault();
                alert("Vui lòng chọn lại ngày trả phòng trước khi đặt!");
            }
            else if((Number(roomAcount) - Number(roomAcountUsed) ) < Number(inputAcount.value)){
                event.preventDefault();
                alert("Vui lòng chọn lại số lượng phòng!");
            }else{
                if (confirm("Bạn có muốn thay đổi dữ liệu không") == false) {
                    event.preventDefault();
                }
            }
        }
    });

    // close
    function deleteBooking(id){
        if (confirm("Bạn có muốn hủy đơn đặt phòng không") == true) {
            window.location="http://localhost:8080/qlkhachsan/booking/deletebooking/"+id;
        }
        
    }

    function closeBooking(){
        editbooking.classList.remove('active');
    }

    ///toản mới thêm
    let dem=0;

    async function getCountBK() {

        let response = await fetch("http://localhost:8080/qlkhachsan/Cart/getCountBooking");

        let data = await response.json();
        console.log(data)

        return data;

    }

    getCountBK().then(data => {

        return dem=data;

    });

    function tt(){

        if(dem === 0){

            event.preventDefault();

            alert("Hãy đặt tối thiểu 1 phòng !!");

        }

    }
</script>