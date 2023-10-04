<style>
  .creat-acc {
    margin-bottom: 20px;
    margin-left: 20px;
  }

  .creat-acc {
    display: flex;
    justify-content: space-between;
  }

  .btn-excel {
    margin-right: 20px;
    background-color: #5BBD2B;
    padding: 7px 25px;
    border-radius: 15px;
    color: #363636;
  }

  .btn-excel:hover {
    background-color: #367517;
    color: #F0F8FF;
  }
</style>

<?php
$total = 0;
$mang = [];
while ($row = mysqli_fetch_array($data["bill"])) {
  $mang[] = array(
    'username' => $row['username'],
    'idBill' => $row['idBill'],
    'paymentDate' => $row['paymentDate'],
    'notes' => $row['notes'],
    'paymentType' => $row['paymentType'],
    'total' => $row['total'],
  );
}
?>
<script>
  function html_table_to_excel(type) {
    var data = document.getElementById('example2');

    var file = XLSX.utils.table_to_book(data, {
      sheet: "sheet1"
    });

    XLSX.write(file, {
      bookType: type,
      bookSST: true,
      type: 'base64'
    });

    XLSX.writeFile(file, 'AllBill.' + type);
  }
</script>

<style>
  .btn-excel {
    background-color: #5BBD2B;
    padding: 7px 25px;
    border-radius: 15px;
    margin-bottom: 20px;
    color: #363636;
  }

  .btn-excel:hover {
    background-color: #367517;
    color: #F0F8FF;
  }
</style>


<div class="content-wrapper" style="min-height: 1203.6px;">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Danh sách hóa đơn</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Danh sách hóa đơn</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <div class="creat-acc">
    <form action="/qlkhachsan/adBill/search" method="post">
      <input type="text" name="namekey" placeholder="Nhập tên tài khoản ...">
      <input type="submit" value="Tìm kiếm" name="search">
    </form>
    <button class="btn-excel" onclick="html_table_to_excel('xlsx')">Xuất Excel</button>
  </div>
  <section>
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
          <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
              <div class="col-sm-12 col-md-6"></div>
              <div class="col-sm-12 col-md-6"></div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                  <thead>
                    <tr role="row">
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Mã hóa đơn</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Tên tài khoản</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Ngày trả tiền</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Phương thức thanh toán</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Ghi chú</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Tổng tiền</th>
                    </tr>
                  </thead>
                  <tbody>
                    <form action="" method="POST">
                      <tr>
                        <?php foreach ($mang as $row) : ?>
                      <tr>

                        <td class="col1"><?php echo $row['idBill'] ?></td>
                        <td class="col1"><?php echo $row['username'] ?></td>
                        <td class="col1"><?php echo $row['paymentDate'] ?></td>
                        <td class="col1"><?php echo $row['paymentType'] ?></td>
                        <td class="col1"><?php echo $row['notes'] ?></td>
                        <td class="col1"><?php echo $row['total'] ?></td>
                      </tr>
                    <?php endforeach; ?>
                    </tr>
                    </form>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
  </section>
</div>