<style>
  <?php
  require_once "./mvc/views/components/bill/bill.css";
  ?>
</style>

<?php date_default_timezone_set('Asia/Ho_Chi_Minh'); ?>
<?php
$total = 0;
$mang = [];
while ($row = mysqli_fetch_array($data["hd"])) {
  $mang[] = array(
    'username' => $row['username'],
    'idRoom' => $row['idRoom'],
    'startDate' => $row['startDate'],
    'endDate' => $row['endDate'],
    'typeRoom' => $row['typeRoom'],
    'amountBk' => $row['amountBk'],
    'price' => $row['price']
  );
}
?>

<?php foreach ($mang as $row) : ?>
<?php endforeach; ?>
<section class="content">
  <div class="container">

    <form action="" method="POST">
      <table class="box">
        <tr class="element1">
          <td class="colu col1"><span>Mã hóa đơn: </span></td>
          <td class="colu col2"><input class="bill-input" type="text" name="txtIDBill" value="<?php echo $_SESSION['last_id']; ?>" readonly="true"></td>
        </tr>
        <tr class="element1">
          <td class="colu col1"><span>Tên tài khoản: </span></td>
          <td class="colu col2"><input class="bill-input" type="text" name="txtUsername" value="<?php echo $_COOKIE['id'] ?> " readonly="true"></td>
        </tr>
        <tr class="element1">
          <td class="colu col1"><span>Ngày thanh toán: </span></td>
          <td class="colu col2"><input class="bill-input" type="datetime-local" name="txtPaymentDate" value="<?php echo date('Y-m-d H:i:s') ?>" readonly="true"></td>
        </tr>
        <tr>
          <td class="colu col1"><span>Kiểu thanh toán: </span></td>
          <td class="colu col2">
            <select name="txtPaymentType" id="" class="bill-input">
              <option value="Cash">Cash</option>
              <option value="Checks">Checks</option>
              <option value="Debit cards">Debit cards</option>
              <option value="Credit cards">Credit cards</option>
              <option value="Mobile payments">Mobile payments</option>
              <option value="Electronic bank transfers">Electronic bank transfers</option>
            </select>
          </td>
        </tr>
      </table>

      <tr class="element">
        <td colspan="2">
          <table id="example3" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <tr>
              <th class=" sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Mã Phòng</th>
              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Ngày nhận phòng</th>
              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Ngày trả phòng</th>
              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Kiểu phòng</th>
              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Số lượng</th>
              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Giá phòng</th>
            </tr>
            <tr>
              <?php foreach ($mang as $row) : ?>
            <tr>
              <td class="col1"><?php echo $row['idRoom'] ?></td>
              <td class="col1"><?php echo $row['startDate'] ?></td>
              <td class="col1"><?php echo $row['endDate'] ?></td>
              <td class="col1"><?php echo $row['typeRoom'] ?></td>
              <td class="col1"><?php echo $row['amountBk'] ?></td>
              <td class="col1"><?php echo $row['price'] ?></td>
            </tr>
            <?php
                $total = $total + $row['price'];
            ?>
          <?php endforeach; ?>
      </tr>
      <tr colspan="2">
        <td class="col1"><span>Tổng tiền :</span></td>
        <td class="col2"><input type="text" name="txtTotal" value="<?php echo $total ?>"></td>
      </tr>
      </table>
      </td>
      </tr>
      <div class="btns">

        <button name="submit" class="btn btn-primary btn-bill">Thanh toán</button>
        <button name="back" class="btn btn-primary btn-bill">Quay lại</button>
      </div>
    </form>
  </div>
</section>