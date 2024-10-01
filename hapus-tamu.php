<?php
// panggil file function php
require_once 'function.php';

// jika ada id
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (hapus_tamu($id) > 0 ) {
        // jika data berhasil dihapus maka akan muncul alert
        echo "<script>alert('Data berhasil di hapus!')</script>";
        // redirect ke halaman buku-tamu.php
        echo "<script>window.location.href='buku_tamu.php'</script>";

    }else {
        // jika gagal dihapus
        echo "<script>alert('Data gagal di hapus!')</script>";
    }
} else if (isset($_POST['ganti_password'])) {
    if (ganti_password($_POST) > 0) {
    ?>
        <div class="alert alert-success" role="alert">
            Password berhasil diubah!
        </div>
    <?php
    } else {
    ?>
        <div class="alert alert-danger" role="alert">
            Password gagal diubah!
        </div>
<?php
    }
}
?>