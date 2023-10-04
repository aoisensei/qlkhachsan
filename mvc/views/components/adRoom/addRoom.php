<div class="content-wrapper" style="min-height: 353px;">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Thêm phòng</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Phòng</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <?php
      if (isset($data['result'])) {
        if ($data['result'] == true) { ?>
          <h3>
            <?php echo "Thêm thành công"; ?>
          </h3>
        <?php
        } else { ?>
          <h3>
            <?php echo "Thêm thất bại"; ?>
          </h3>
      <?php
        }
      }
      ?>
      <form action="/qlkhachsan/adRoom/addRoom" method="post">
        <div class="card-body">
          <div class="form-group">
            <label>Id Room</label>
            <input type="text" required="required" name="idRoom" class="form-control" placeholder="ID Room">
          </div>
          <div class="form-group">
            <label>Kiểu phòng</label>
            <input type="text" required="required" name="typeRoom" class="form-control" placeholder="Kiểu phòng">
          </div>
          <div class="form-group">
            <label>Tên Phòng</label>
            <input type="text" required="required" name="nameRoom" class="form-control" placeholder="Tên Phòng">
          </div>
          <div class="form-group">
            <label>Giá</label>
            <input type="number" required="required" name="priceRoom" class="form-control" placeholder="Giá">
          </div>
          <div class="form-group">
            <label>Số lượng</label>
            <input type="number" required="required" name="amount" class="form-control" placeholder="Số lượng">
          </div>
        </div>
        <button type="submit" name="addRoom" class="btn btn-primary" style="margin-left: 20px;  margin-bottom: 20px;">Thêm</button>
      </form>
    </div>
  </section>
</div>