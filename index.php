<?php
    include 'koneksi.php';
    session_start();

    $query =  "SELECT * FROM tb_pesawat;";
    $sql =  mysqli_query($conn, $query);

    $no = 0;

?>

<!DOCTYPE html>
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

    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
            Bootstrap 5
          </a>
        </div>
      </nav>

      <!-- Judul -->

      <div class="container">

        <h1 class="mt-4">Data Pesawat</h1>

        <figure>
          <blockquote class="blockquote">          
            <p>Berisikan data yang tersimpan di database</p>
          </blockquote>
          <figcaption class="blockquote-footer">
           <cite title="Source Title">( Create Read Update Delete )</cite>
          </figcaption>
        </figure>

        <a href="edit.php" type="button" class="btn btn-info mb-4"> <i class="fa fa-plane" aria-hidden="true"> </i>Tambah data</a>

        <?php
            if(isset($_SESSION['exsekusi'])):
        ?>

            <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong><?php echo $_SESSION['exsekusi']; ?></strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php
            session_destroy();
            endif;
        ?>

        <div class="table-responsive">
            <table class="table align-middle table-bordered table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Pesawat</th>
                  <th>Kode pesawat</th>
                  <th>Foto</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>

                <?php
                   while($result = mysqli_fetch_assoc($sql)){;
                ?>

                    <tr>

                      <td><?php echo ++$no;?></td>
                      <td><?php echo $result['nama_maskapai'];?></td>
                      <td><?php echo $result['kode_maskapai'];?></td>
                      <td><img src="img/<?php echo $result['foto'];?>" alt="" style="width: 70px;"></td>

                      <td>
                        <a href="edit.php?ubah=<?php echo $result['id_maskapai'];?>" type="button" class="btn btn-success btn-sm ">
                          <i class="fa fa-wrench" aria-hidden="true"></i></a>
                      
                          <a href="proses.php?hapus=<?php echo $result['id_maskapai'];?>" type="button"  class="btn btn-danger btn-sm" onClick="return confirm('Yakin hapus.?')">
                          <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                      </td>
      
                    </tr>
                <?php
                    }
                ?>

              </tbody>
            </table>
          </div>

      </div>


    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html> 