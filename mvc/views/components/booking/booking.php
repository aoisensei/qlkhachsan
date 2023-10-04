<style>
    <?php 
        require_once "./mvc/views/components/booking/booking.css"; 
    ?>
</style>

<?php 
    $itemRoom = [];
    
    require_once("./mvc/core/FuncGlobal.php");

    while($row = mysqli_fetch_array($data["roomItem"])){
        $itemRoom = $row;
    };
?>


<div class="booking">
    <div class="booking__content">
        <div class="booking__content__image">
            <img src=<?php echo($itemRoom["image"]) ?> alt="">
        </div>
        <div class="booking__content__introduce">
            <h1><?php echo($itemRoom["nameRoom"]) ?></h1>
            <span class="booking__content__introduce__description"><?php echo($itemRoom["description"]) ?></span>
            <span class="booking__content__introduce__amount">Số phòng còn: 
                <span class="booking__content__introduce__amount__content"><?php echo($data["amountIdBk"]) ?></span>
                phòng
            </span>
            <span class="booking__content__introduce__price">Giá Phòng: 
                <span class="booking__content__introduce__price__content"><?php echo(cuttingPrice($itemRoom["priceRoom"])) ?> </span> VND
            </span>
        </div>
    </div>
    <form action="/qlkhachsan/rooms/Booking/<?php echo $itemRoom["idRoom"] ?>" method="POST" class="booking__box">
        <div class="booking__box__content">
            <div class="booking__box__content__date">
                <div class="booking__box__content__datestart">
                    <span>Ngày nhận phòng: </span>
                    <input id="datein" name="dateIn" type="date">
                </div>
                <div class="booking__box__content__dateend">
                    <span>Ngày trả phòng: </span>
                    <input id="dateout" name="dateOut" type="date">
                </div>
            </div>
            <div class="booking__box__content__amount">
                <span>Số phòng: </span>
                <input id="roomAcount" type="number" name="quantity" min="1" max="<?php echo($data["amountIdBk"]) ?>">
            </div>
        </div>
        <div class="booking__box__button">
            <button id="bookingRoom">Đặt phòng</button>
        </div>
    </form>
</div>

<script>

    // cho vào global
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

    function cutDate(date){
        return date.split("-");
    }

    let dateIn = document.getElementById("datein");
    let dateOut = document.getElementById("dateout");
    let inputAcount = document.getElementById("roomAcount");
    let roomAcount = document.querySelector(".booking__content__introduce__amount__content");


    // booking room
    document.getElementById("bookingRoom").addEventListener("click", function(event){
        var userName = document.cookie;
        
        if(getCookie(userName) === ""){
            event.preventDefault();
            alert("Vui lòng đăng nhập tài khoản!");
            window.location="http://localhost:8080/qlkhachsan/login";
        }else{
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
                let dateIn1 =new Date(arrDateIn[0],monthIn,arrDateIn[2]);
                let date = new Date(); 
                // let dateTest = new Date(2022,11,12);

                let arrDateOut = cutDate(dateOut.value);
                let monthOut = Number(arrDateOut[1])-1;
                let dateOut1 =new Date(arrDateOut[0],monthOut,arrDateOut[2]);
                
                if(dateIn1 < date && dateIn1.getDate() !== date.getDate()){
                    event.preventDefault();
                    alert("Vui lòng chọn lại ngày nhận phòng trước khi đặt!");
                }
                else if(dateIn1 >= dateOut1){
                    event.preventDefault();
                    alert("Vui lòng chọn lại ngày trả phòng trước khi đặt!");
                }
                else if(Number(roomAcount.innerText) < Number(inputAcount.value) || Number(inputAcount.value)<1){
                    event.preventDefault();
                    alert("Vui lòng chọn lại số lượng phòng!");
                }else{
                    if (confirm("Bạn có muốn chắc bạn muốn đặt phòng không?") == false) {
                        event.preventDefault();
                    }
                }

            }
        }

        });
</script>