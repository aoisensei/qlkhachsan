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

      <?php foreach ($data['findUser'] as $listAccount) : extract($listAccount); ?>
        <form action="/qlkhachsan/adAccount/update/<?= $id ?>" method="post">
          <div class="card-body">
            <div class="form-group">
              <label>Tên tài khoản</label>
              <input type="text" name="username" class="form-control" value="<?= $username ?>">
            </div>
            <div class="form-group">
              <label>Họ và tên</label>
              <input type="text" name="fullName" class="form-control" value="<?= $fullName ?>">
            </div>
            <div class="form-group">
              <label>Số điện thoại</label>
              <input type="text" name="phoneNumber" class="form-control" value="<?= $phoneNumber ?>">
            </div>
            <div class="form-group">
              <label>Địa chỉ</label>
              <input type="text" name="address" class="form-control" value="<?= $address ?>">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" name="email" class="form-control" value="<?= $email ?>">
            </div>
            <button type="submit" name="btn-edit" class="btn btn-primary">Hoàn thành</button>
          </div>
        </form>
      <?php endforeach; ?>

    </div>
  </section>
</div>