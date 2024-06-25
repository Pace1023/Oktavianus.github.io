<?php

include 'koneksi.php';

function tambah_data($data, $files){


    $nama = $data['nama'];
    $kode = $data['kode'];


    $split = explode ('.',$files['foto']['name']);
    $ekstensi = $split[count($split)-1];
    $foto = $id_maskapai.'.'.$ekstensi;
 

    $dir = "img/";
    $tmpFile = $files['foto']['tmp_name'];

    move_uploaded_file($tmpFile, $dir.$foto);

     // die();

    $query = "INSERT INTO tb_pesawat VALUE(null, '$nama', '$kode', '$foto')";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;

}

function ubah_data($data, $files){
    $id_maskapai = $data['id_maskapai'];
    $nama = $data['nama'];
    $kode = $data['kode'];

    $queryShow = "SELECT * FROM tb_pesawat WHERE id_maskapai ='$id_maskapai';";
    $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    if($files['foto']['name'] == ""){
        $foto = $result['foto'];
    }else{
        $split = explode ('.',$files['foto']['name']);
        $ekstensi = $split[count($split)-1];

        $foto = $result['id_maskapai'].'.'.$ekstensi;
        unlink("img/".$result['foto']);
        move_uploaded_file($files['foto']['tmp_name'], 'img/'.$foto);
    };
            

    $query = "UPDATE tb_pesawat SET nama_maskapai= '$nama', kode_maskapai= '$kode', foto= '$foto' WHERE id_maskapai= '$id_maskapai';";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;

}

function hapus_data($data){

    $id_maskapai = $data['hapus'];

    $queryShow = "SELECT * FROM tb_pesawat WHERE id_maskapai ='$id_maskapai';";
    $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    //var_dump($result);
    unlink("img/".$result['foto']);
    //die();

    $query = "DELETE FROM tb_pesawat WHERE id_maskapai= '$id_maskapai';";
    $sql = mysqli_query($GLOBALS['conn'], $query);
    // echo "Hapus data";

    return true;

}

?>