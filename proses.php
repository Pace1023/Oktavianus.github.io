<?php

include 'fungsi.php';
session_start();

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] =="add" ){
            
            $berhasil = tambah_data($_POST, $_FILES);

            if($berhasil){
                $_SESSION['exsekusi'] = "Create data";
                header("location: index.php");
                // echo "berhasil di tambahakan";
            }else{
                echo $berhasil;
            }
            // echo "<br>Tambah data";
        }else if($_POST['aksi'] =="edit" ){
            //echo "Edit data";

            $berhasil = ubah_data($_POST, $_FILES);

            if($berhasil){
                $_SESSION['exsekusi'] = "Update data";
                header("location: index.php");
            }else{
                echo $berhasil;
            }     
    }
}

    if(isset($_GET['hapus'])){
       
        $berhasil = hapus_data($_GET);

        if($berhasil){
            $_SESSION['exsekusi'] = "Delete data";
            header("location: index.php");
            // echo "berhasil di tambahakan";
        }else{
            echo $berhasil;
        }

    }

?>