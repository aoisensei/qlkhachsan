<style>
  .creat-acc {
    margin-bottom: 20px;
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

    XLSX.writeFile(file, 'ListOrder.' + type);
  }
</script>
<div class="content-wrapper" style="min-height: 1203.6px;">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Danh sách đơn hàng</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Danh sách đơn hàng</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <div class="creat-acc">
    <form action="/qlkhachsan/adOrder/search" method="post">
      <input style="margin-left: 20px;" type="text" name="namekey" placeholder="Nhập mã hóa đơn ...">
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
                      <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">STT</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Mã hóa đơn</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Mã phòng</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Họ và tên</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Số điện thoại</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Ngày đến</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Ngày đi</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Tổng giá</th>

                      <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Xóa</th>

                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    $i = 1;
                    while ($row = mysqli_fetch_array($data["listOrder"])) { ?>
                      <tr role="row" class="odd">
                        <td class="sorting_1"><?php echo $i++; ?></td>
                        <td><?php echo $row["idBooking"]; ?></td>
                        <td><?php echo $row["idRoom"]; ?></td>
                        <td><?php echo $row["fullName"]; ?></td>
                        <td><?php echo $row["phoneNumber"]; ?></td>
                        <td><?php echo $row["startDate"]; ?></td>
                        <td><?php echo $row["endDate"]; ?></td>
                        <td><?php echo $row["phoneNumber"]; ?></td>

                        <td style="text-align: center;">
                          <span class="badge bg-danger">
                            <a href="/qlkhachsan/adOrder/delete/<?php echo $row['idBooking'] ?>">
                              <ion-icon name="trash-outline"></ion-icon>
                            </a>
                          </span>
                        </td>
                      </tr>
                    <?php
                    } ?>

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