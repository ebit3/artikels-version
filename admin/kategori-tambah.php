<?php

ob_start();

include 'layouts/header.php';

require_once '../function/funsi.php';

$conn = koneksi();

if (isset($_POST['submit'])) {

    if (create_kategori($_POST)) {

        return true;
    } else {

        return false;
    }
}


?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kategori Tambah </h1>
    </div>

    <section>
        <div class="row">
            <div class="col-md-12">
                <form action="" method="post">
                    <div class="card">
                        <div class="card-header bg-primary pb-4"></div>
                        <div class="card-body">

                            <label for="" class="form-label">Nama Kategori</label>
                            <input type="text" name="kategori" id="" class="form-control" placeholder="Enter kategori" required>

                        </div>
                        <div class="card-footer">
                            <div class="float-end">
                                <a href="kategori.php" class="btn btn-danger me-2">Kembali</a>
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