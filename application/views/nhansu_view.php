<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 4 Website Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script type="text/javascript" src="<?php echo base_url() ?>jQuery-File-Upload/js/vendor/jquery.ui.widget.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>jQuery-File-Upload/js/jquery.fileupload.js"></script>
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
    <div class="form-group row">
      <div class="col-sm-6">
        <div class="row">
          <label for="anh">Ảnh đại diện</label>
          <input name="files[]" type="file" class="form-control-file" id="anh">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="row">
          <label for="ten">Tên nhân viên</label>
          <input name="ten" class="form-control" id="ten" type="text" placeholder="Nhập vào tên..." >
        </div>
      </div>
      <div class="col-sm-6">
        <div class="row">
          <label for="age">Tuổi</label>
          <input name="tuoi" class="form-control" id="age" type="number" placeholder="Nhập vào tuổi..." >
        </div>
      </div>
      <div class="col-sm-6">
        <div class="row">
          <label for="donhang">Số đơn hàng</label>
          <input name="sodonhang" class="form-control" id="donhang" type="number" placeholder="Nhập vào số đơn hàng..." >
        </div>
      </div>
      <div class="col-sm-6">
        <div class="row">
          <label for="sdt">Tel</label>
          <input name="phonenum" class="form-control" id="sdt" type="text" placeholder="Nhập vào sdt..." >
        </div>
      </div>
      <div class="col-sm-6">
        <div class="row">
          <label for="linkfb">LinkFB</label>
          <input name="linkfb" class="form-control" id="linkfb" type="text" placeholder="Nhập vào linkfb..." >
        </div>
      </div>
    </div>
    <div class="form-group row text-center">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="button" class="btn btn-outline-success nutajax">Thêm mới</button>
          <button type="reset" class="btn btn-outline-warning">Nhập lại</button>
        </div>
      </div>
  <!-- </form> -->
</div>
<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="card-deck">
      <?php foreach ($mangketqua as $value): ?>
      <div class="col-sm-4">
        <div class="card" style="width: 21rem;">
          <img class="card-img-top img-fluid" src="<?= $value['avatar'] ?>" alt="Card image cap">
          <div class="card-block">
            <h5 class="card-title ten"><?= $value['ten'] ?></h5>
            <p class="card-text tuoi">Tuổi: <b><?= $value['tuoi'] ?></b></p>
            <p class="card-text sdt">Tel: <b><?= $value['sdt'] ?></b></p>
            <p class="card-text sodonhang">Đơn hàng đã hoàn thành: <b><?= $value['sodonhang'] ?></b></p>
            <p class="card-text linkfb"><small> <a href="<?= $value['linkfb'] ?>" class="btn btn-secondary btn-xs">Facebook</a> </small> </p>
            <p class="card-text editns">
              <small> <a href="<?= base_url() ?>index.php/nhansu/sua_nhansu/<?= $value['id'] ?>" class="btn btn-warning btn-xs">Sửa</a> </small>
              <small> <a href="<?= base_url() ?>index.php/nhansu/xoa_nhansu/<?= $value['id'] ?>" class="btn btn-danger btn-xs">Xóa</a> </small>
            </p>
            
          </div>
        </div>
      </div>
    <?php endforeach ?>
    </div>
    
  
  </div>
</div>


</body>

<script>

  duongdan = '<?php echo base_url() ?>';
  

  $('#anh').fileupload({
    url: duongdan + 'index.php/nhansu/uploadfile',
    dataType: 'json',
    done: function (e, data) {
      $.each(data.result.files, function (index, file) {
        console.log(file.url);
      });
    },
  })

  $('.nutajax').click(function(event) {
    $.ajax({
      url: 'ajax_add',
      type: 'POST',
      dataType: 'json',
      data: {
        ten: $('#ten').val(),
        tuoi: $('#age').val(),
        phonenum: $('#sdt').val(),
        sodonhang: $('#donhang').val(),
        linkfb: $('#linkfb').val(),
        
      },
    })
    .done(function() {
      console.log("success");
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
      noidung = '<div class="col-sm-4">';
      noidung += '<div class="card" style="width: 21rem;">';
      noidung += ' <img class="card-img-top img-fluid" src="http://localhost:8889/project2/Fileupload/anh-gai-xinh-toc-ngan.jpg" alt="Card image cap">';
      noidung += '<div class="card-block">';
      noidung += '<h5 class="card-title ten">'+$('#ten').val()+'</h5>';
      noidung += '<p class="card-text tuoi">Tuổi: <b>'+$('#age').val()+'</b></p>';
      noidung += '<p class="card-text sdt">Tel: <b>'+$('#sdt').val()+'</b></p>';
      noidung += '<p class="card-text sodonhang">Đơn hàng đã hoàn thành: <b>'+$('#donhang').val()+'</b></p>';
      noidung += '<p class="card-text linkfb"><small> <a href="'+$('#linkfb').val()+'" class="btn btn-secondary btn-xs">Facebook</a> </small> </p>';
      noidung += '<p class="card-text editns">';
      noidung += '<small> <a href="<?= base_url() ?>index.php/nhansu/sua_nhansu/<?= $value['id'] ?>" class="btn btn-warning btn-xs">Sửa</a> </small>';
      noidung += '<small> <a href="<?= base_url() ?>index.php/nhansu/xoa_nhansu/<?= $value['id'] ?>" class="btn btn-danger btn-xs">Xóa</a> </small>';
      noidung += '</p>';
      noidung += '</div>';
      noidung += '</div>';
      $('.card-deck').append(noidung);
    });
  });
  
  
</script>

</html>