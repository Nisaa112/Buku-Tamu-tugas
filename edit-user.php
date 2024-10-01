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
        if (ubah_users($_POST) > 0){
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
    // jika ada  id_user  di url 
    if (isset($_GET['id'])) {
        $id_user = $_GET['id'];
        // ambil data user yang sesuai dengan id_user
        $data = query("SELECT * FROM users WHERE id_users = '$id_user'") [0];
    }
    ?>

    <!-- konten edit data user -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6>Data user</h6>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <input type="hidden" name="id_users" id="id_users" value="<?= $id_user ?>">
                <div class="form-grup row">
                    <label for="username" class="col-sm-3 col-form-label">Username</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="username" name="username" value="<?= $data['username']?>">
                    </div>
                </div>
                <div class="form-grup row">
                    <label for="user_role" class="col-sm-3 col-form-label">User Role</label>
                    <div class="col-sm-8">
                        <select name="user_role" id="user_role" class="form-control">
                            <option value="admin" <?= $data['user_role'] == 'admin' ? 'selected' : '' ; ?>>Administrator</option>
                            <option value="operator" <?= $data['user_role'] == 'operator' ? 'selected' : '' ; ?>>Operator</option>
                        </select>
                    </div>
                </div>

                <div class="form-grup row">
                    <label for="" class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-8 d-flex justify-content-end">
                        <div>
                            <a href="users.php" class="btn btn-danger btn-icon-split" type="button">
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