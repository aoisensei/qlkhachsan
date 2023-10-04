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

    XLSX.writeFile(file, 'ListAcc.' + type);
  }
</script>

<?php 

    $cookieValue = $_COOKIE['id'];

    function getCookie($cname) { 
        $name = $cname . "="; 
        $ca = explode(';', $_COOKIE); 
        foreach ($ca as $cookie) { 
            $arr = explode('=', $cookie); 
            if (count($arr) == 2) { 
                if (trim($arr[0]) == "id") { 
                    return trim($arr[1]); 
                } 
            } 
        } 
        return ""; 
    }

?>

<div class="content-wrapper" style="min-height: 1203.6px;">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Danh sách phản hồi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Danh sách phản hồi</li>
          </ol>
        </div>
      </div>
    </div>
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
                      <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Mã phản hồi</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Mã khách hàng</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Phản hồi của khách hàng</th>

                      <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Phản hồi</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($data["listFeedback"])) { ?>
                      <tr role="row" class="odd">
                        <td><?php echo $row["maphanhoi"]; ?></td>
                        <td><?php echo $row["makhachhang"]; ?></td>
                        <td><?php echo $row["phanhoi"]; ?></td>
                        <td style="text-align: center;">
                          <span class="badge bg-primary">
                            <a href="/qlkhachsan/adCSKH/update/<?php echo $row['maphanhoi'] ?>/<?php echo $cookieValue ?>">
                              <ion-icon name="create-outline"></ion-icon>
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
