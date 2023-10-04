<div class="content-wrapper" style="min-height: 353px;">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Thêm tài khoản</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Tài khoản</li>
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
      <form action="/qlkhachsan/adAccount/addAcc" method="post">
        <div class="card-body">
          <div class="form-group">
            <label>Tên tài khoản</label>
            <input type="text" required="required" name="username" class="form-control" placeholder="Tên tài khoản">
          </div>
          <div class="form-group">
            <label>Họ và tên</label>
            <input type="text" required="required" name="fullName" class="form-control" placeholder="Họ và tên">
          </div>
          <div class="form-group">
            <label>Mật khẩu</label>
            <input type="password" required="required" name="password" class="form-control" placeholder="Mật khẩu">
          </div>
          <div class="form-group">
            <label>Số điện thoại</label>
            <input type="number" required="required" name="phoneNumber" class="form-control" placeholder="Số điện thoại">
          </div>
          <div class="form-group">
            <label>Địa chỉ</label>
            <input type="text" required="required" name="address" class="form-control" placeholder="Địa chỉ">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" required="required" name="email" class="form-control" placeholder="Email">
          </div>
        </div>
        <button type="submit" name="addAcc" class="btn btn-primary" style="margin-left: 20px;  margin-bottom: 20px;">Thêm</button>
      </form>
    </div>
  </section>
</div>