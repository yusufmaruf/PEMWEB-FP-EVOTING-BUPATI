<?php
    // memulai session 
    session_start();
    // menghapus session yang berjalan 
    session_destroy();
    // menampilkan halaman login 
    echo "<script>location='login.php'</script>";
?>