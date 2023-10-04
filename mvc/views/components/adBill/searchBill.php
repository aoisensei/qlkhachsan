<style>
  .creat-acc {
    margin-bottom: 20px;
    margin-left: 20px;
  }

  .btn-add {
    background-color: #007bff;
    color: #fff;
    padding: 10px 30px;
    border-radius: 20px;
    margin-left: 20px;
    font-size: 16px;
  }

  .btn-add:hover {
    background-color: #009298;
    color: #000;
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

    XLSX.writeFile(file, 'ListAcc.' + type);
  }
</script>

<div class="content-wrapper" style="min-height: 1203.6px;">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Danh sách tài khoản</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Danh sách tài khoản</li>
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
                    <?php
                    foreach ($data['listSearchBill'] as $value) { ?>
                      <tr role="row" class="odd">
                        <td><?php echo $value["idBill"]; ?></td>
                        <td><?php echo $value["username"]; ?></td>
                        <td><?php echo $value["paymentDate"]; ?></td>
                        <td><?php echo $value["paymentType"]; ?></td>
                        <td><?php echo $value["notes"]; ?></td>
                        <td><?php echo $value["total"]; ?></td>
                      </tr>
                    <?php }; ?>
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
