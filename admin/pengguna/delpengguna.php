<?php
// mengambil id yang akan di delete 
if(isset($_GET['kode'])){
    // proses delete 
            $kode = $_GET['kode'];  
            $sql_hapus = "DELETE FROM tb_user WHERE iduser='".$kode."'";
            
            $query_hapus = mysqli_query($koneksi, $sql_hapus);

            // menampilkan alert succes delete 
            if ($query_hapus) {
                echo "<script>
                Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=data-pengguna';
                    }
                })</script>";
                }else{
                    // menampilkan erorr delete 
                echo "<script>
                Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=data-pengguna';
                    }
                })</script>";
            }
        }