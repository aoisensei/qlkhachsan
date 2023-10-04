<div class="content-wrapper" style="min-height: 353px;">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Sửa tài khoản</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Tài khoản</a></li>
            <li class="breadcrumb-item active">Admin</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">

      <?php foreach ($data['findRoom'] as $listRoom) : extract($listRoom); ?>
        <form action="/qlkhachsan/adRoom/update/<?= $idRoom ?>" method="post">
          <div class="card-body">
            <div class="form-group">
              <label>Kiểu phòng</label>
              <input type="text" name="typeRoom" class="form-control" value="<?= $typeRoom ?>">
            </div>
            <div class="form-group">
              <label>Tên phòng</label>
              <input type="text" name="nameRoom" class="form-control" value="<?= $nameRoom ?>">
            </div>
            <div class="form-group">
              <label>Giá</label>
              <input type="text" name="priceRoom" class="form-control" value="<?= $priceRoom ?>">
            </div>
            <div class="form-group">
              <label>Số lượng</label>
              <input type="text" name="amount" class="form-control" value="<?= $amount ?>">
            </div>
            <button type="submit" name="btn-editRoom" class="btn btn-primary">Hoàn thành</button>
          </div>
        </form>
      <?php endforeach; ?>

    </div>
  </section>
</div>