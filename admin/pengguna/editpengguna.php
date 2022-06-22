<?php
    // memeriksa kode
    if(isset($_GET['kode'])){
        // mengambil data dari db 
        $sql_cek = "SELECT * FROM tb_user WHERE iduser ='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Ubah Data</h3>
    </div>
    <!-- form ubah data  -->
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">

            <input type='hidden' class="form-control" name="id_pengguna" value="<?php echo $data_cek['iduser']; ?>"
             readonly/>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">NIK</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="username" name="nik" value="<?php echo $data_cek['nik']; ?>"
                    />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Pengguna</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" value="<?php echo $data_cek['namauser']; ?>"
                    />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" id="pass" name="password" value="<?php echo $data_cek['password']; ?>"
                    />
                    <input id="mybutton" onclick="change()" type="checkbox" class="form-checkbox"> Lihat Password
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Level</label>
                <div class="col-sm-4">
                    <select name="level" id="level" class="form-control">
                        <option value="">-- Pilih Level --</option>
            <?php
                //menhecek data yg dipilih sebelumnya
                if ($data_cek['level'] == "Admin") echo "<option value='Admin' selected>Admin</option>";
                else echo "<option value='Admin'>Admin</option>";
            ?>
                    </select>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
            <a href="?page=data-pengguna" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>



<?php

    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE tb_user SET
        nik='".$_POST['nik']."',
        namauser='".$_POST['nama_pengguna']."',
        password='".$_POST['password']."',
        level='".$_POST['level']."'
        WHERE iduser='".$_POST['id_pengguna']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pengguna';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pengguna';
        }
      })</script>";
    }}
?>

<script type="text/javascript">
    function change()
    {
    var x = document.getElementById('pass').type;

    if (x == 'kode_akses')
    {
        document.getElementById('pass').type = 'text';
        document.getElementById('mybutton').innerHTML;
    }
    else
    {
        document.getElementById('pass').type = 'kode_akses';
        document.getElementById('mybutton').innerHTML;
    }
    }
</script>