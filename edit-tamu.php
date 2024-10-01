<?php
include_once('templates/header.php');
include_once('function.php')
?>

<!-- begin page content -->
<div class="container-fluid">

    <!-- page heading -->
    <h1 class="h3 mb-4 text-gray-800">Dashboard Admin</h1>

    <?php
    // jika ada tombol simpan 
    if (isset($_POST['simpan'])) {
        if (ubah_tamu($_POST) > 0){
    ?> 
            <div class="alert alert-success" role="alert">
                Data Berhasil Diubah!
            </div>
        
        <?php
        } else {
        ?>

            <div class="alert alert-danger" role="alert">
                Data Gagal Diubah!
            </div>

    <?php
        }
    }    
    ?>       



    <?php
    // jika ada  id_tamu  di url 
    if (isset($_GET['id'])) {
        $id_tamu = $_GET['id'];
        // ambil data tamu yang sesuai dengan id_tamu
        $data = query("SELECT * FROM buku_tamu WHERE id_tamu = '$id_tamu'") [0];
    }
    ?>

    <!-- konten edit data tamu -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6>Data Tamu</h6>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <input type="hidden" name="id_tamu" id="id_tamu" value="<?= $id_tamu ?>">
                <div class="form-grup row">
                    <label for="nama_tamu" class="col-sm-3 col-form-label">Nama Tamu</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama_tamu" name="nama_tamu" value="<?= $data['nama_tamu']?>">
                    </div>
                </div>
                <div class="form-grup row">
                    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-8">
                        <textarea name="alamat" id="alamat" class="form-control" ><?= $data['alamat']?></textarea>
                    </div>
                </div>
                <div class="form-grup row">
                    <label for="no_hp" class="col-sm-3 col-form-label">No. Telepon</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $data['no_hp']?>">
                    </div>
                </div>
                <div class="form-grup row">
                    <label for="bertemu" class="col-sm-3 col-form-label">Bertemu dg.</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="bertemu" name="bertemu" value="<?= $data['bertemu']?>">
                    </div>
                </div>
                <div class="form-grup row">
                    <label for="kepentingan" class="col-sm-3 col-form-label">Kepentingan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="kepentingan" name="kepentingan" value="<?= $data['kepentingan']?>">
                    </div>
                </div>
                <div class="form-grup row">
                    <label for="" class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-8 d-flex justify-content-end">
                        <div>
                            <a type="button" class="btn btn-danger btn-icon-split" href="buku_tamu.php" >
                                <span class="icon text-white-50">
                                    <i class="fas fa-chevron-left"></i>
                                </span>
                                <span class="text">Kembali</span>
                            </a>
                            <button class="btn btn-primary" name="simpan" type="submit">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>    
        </div>
    </div>
</div>

</div>

<!-- /.container-fluid -->

<?php
include_once('templates/footer.php')
?>