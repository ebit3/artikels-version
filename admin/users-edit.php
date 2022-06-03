<?php

ob_start();

include 'layouts/header.php';

require_once '../function/funsi.php';

$conn = koneksi();

$id = $_GET['id'];

$data = show_update_user("SELECT * FROM users WHERE id_user = '" . $id . "' ");

if (isset($_POST['submit'])) {

    if (update_user($_POST)) {

        return true;
    } else {

        return false;
    }
}


?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pengguna Tambah </h1>
    </div>

    <section>
        <div class="row">
            <div class="col-md-12">
                <form action="" method="post">
                    <div class="card">
                        <div class="card-header bg-primary pb-4"></div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <input type="hidden" name="user_id" id="" value="<?= $data['id_user'] ?>">
                                        <label for="" class="form-label">Nama Pengguna</label>
                                        <input type="text" name="nama" id="" class="form-control" placeholder="Enter nama" value="<?= $data['nama'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Username Pengguna</label>
                                        <input type="text" name="username" id="" class="form-control" placeholder="Enter username">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Password Pengguna</label>
                                        <input type="text" name="password" id="" class="form-control" placeholder="Enter password">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Role Pengguna</label>
                                        <select class="form-select" aria-label="Default select example" name="role">
                                            <option selected><?= $data['role'] ?></option>
                                            <option value="admin">Admin</option>
                                            <option value="publisher">Publisher</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="float-end">
                                <a href="users.php" class="btn btn-danger me-2">Kembali</a>
                                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<?php include 'layouts/footer.php' ?>