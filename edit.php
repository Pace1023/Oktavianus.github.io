<!DOCTYPE html>

      
      <?php

        include 'koneksi.php';

        $nama = '';
        $kode = '';

        if(isset($_GET['ubah'])){

        $id_maskapai = $_GET['ubah'];
        
        $query = "SELECT * FROM tb_pesawat WHERE id_maskapai = '$id_maskapai';";
        $sql  = mysqli_query($conn, $query);
        $result = mysqli_fetch_assoc($sql);

        $nama = $result['nama_maskapai'];
        $kode = $result['kode_maskapai'];

        //var_dump($result);

        //die();

       }
      ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <title>belajar crud</title>
</head>
<body>

    <!-- navbar -->

    <nav class="navbar navbar-light bg-light mb-4">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
            Bootstrap 5
          </a>
        </div>
      </nav>

      <div class="container">

        <form method="POST" action="proses.php" enctype="multipart/form-data">

        <input type="hidden" value= "<?php echo $id_maskapai?>" name= "id_maskapai">

          <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama pesawat</label>
              <div class="col-sm-10">
                <input required type="text" name="nama"class="form-control" id="nama" placeholder="ex : Pace" value="<?php echo $nama; ?>">
              </div>
          </div>

          <div class="mb-3 row">
            <label for="kode" class="col-sm-2 col-form-label">Kode Pesawat</label>
              <div class="col-sm-10">
                <input required  type="text" name="kode" class="form-control" id="kode" placeholder="ex : 321" value="<?php echo $kode; ?>">
              </div>
          </div>

          <div class="mb-3 row">
            <label for="foto" class="col-sm-2 col-form-label">Foto</label>
              <div class="col-sm-10">
                <input <?php if(!isset($_GET['ubah'])){echo "required";} ?> class="form-control" name="foto" type="file" id="foto" accept="image/*">
              </div>
          </div>

            <div class="mb-3 row">
                </div class="col">
                  <?php
                    if(isset($_GET['ubah'])){
                  ?>
                      <button type="submit" name="aksi" value="edit" class="btn btn-info mb-4"> <i class="fa fa-address-book" aria-hidden="true"></i> </i>Simpan</button>
                  <?php
                    }else {
                  ?>
                    <button type="submit" name="aksi" value="add" class="btn btn-info mb-4"> <i class="fa fa-address-book" aria-hidden="true"></i> </i>Tambakan</button>
                  <?php
                    }
                  ?>
                    <a href="index.php" type="button" class="btn btn-warning mb-4"> <i class="fa fa-reply-all" aria-hidden="true"></i> </i>Batal</a>
                </div>
            </div>

        </form>

      </div>      

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html> 