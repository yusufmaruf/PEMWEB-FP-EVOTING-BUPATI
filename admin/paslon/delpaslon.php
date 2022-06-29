<?php

if(isset($_GET['kode'])){
    $sql_cek = "select * from tb_paslon where id_paslon='".$_GET['kode']."'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
}
?>

<?php
    // menghapus foto 
    $foto= $data_cek['foto_paslon'];
    if (file_exists("foto/$foto")){
        unlink("foto/$foto");
    }
    // menghapus data 
    $sql_hapus = "DELETE FROM tb_paslon WHERE id_paslon='".$_GET['kode']."'";
    $query_hapus = mysqli_query($koneksi, $sql_hapus);
    if ($query_hapus) {
        echo "<script>
        Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=data-paslon'
        ;}})</script>";
        }else{
        echo "<script>
        Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value) {window.location = 'index.php?page=data-paslon'
        ;}})</script>";
    }
