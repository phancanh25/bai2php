<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 4 Website Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head>
<body>

<div class="jumbotron text-center" style="margin-bottom:0">
  <h1>Quản lý nhân sự</h1>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>    
    </ul>
  </div>  
</nav>
<div class="container">
  <form action="<?= base_url() ?>index.php/nhansu/update_nhansu" method="post" enctype="multipart/form-data">
    <?php foreach ($dulieukq as $value): ?>

    <div class="form-group row">
      <div class="col-sm-6">
        <div class="row">
          <label for="FormControl">Ảnh đại diện</label>
          <div class="col-sm-6">
            <div class="row">
              <img class="card-img-top img-fluid" src="<?= $value['avatar'] ?>" alt="Card image cap">
            </div>
            <input name="id" type="hidden" value="<?= $value['id'] ?>">
            <input name="anh2" type="hidden" value="<?= $value['avatar'] ?>">
            <input name="anh" type="file" class="form-control-file" id="FormControl">
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="row">
          <label for="forname">Tên nhân viên</label>
          <input name="ten" class="form-control" id="forname" type="text" value="<?= $value['ten'] ?>">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="row">
          <label for="forage">Tuổi</label>
          <input name="tuoi" class="form-control" id="forage" type="number" value="<?= $value['tuoi'] ?>">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="row">
          <label for="fordonhang">Số đơn hàng</label>
          <input name="sodonhang" class="form-control" id="fordonhang" type="number" value="<?= $value['sodonhang'] ?>">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="row">
          <label for="forsdt">Tel</label>
          <input name="phonenum" class="form-control" id="forsdt" type="text" value="<?= $value['sdt'] ?>">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="row">
          <label for="forlinkfb">LinkFB</label>
          <input name="linkfb" class="form-control" id="forlinkfb" type="text" value="<?= $value['linkfb'] ?>">
        </div>
      </div>
    </div>
    <div class="form-group row text-center">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-outline-success">Sửa lại</button>
        </div>
      </div>
    <?php endforeach ?>
  </form>
</div>
</body>
</html>