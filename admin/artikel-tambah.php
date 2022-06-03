<?php

ob_start();

include 'layouts/header.php';

require_once '../function/funsi.php';

$conn = koneksi();

$data = read_kategori("SELECT * FROM categories");

if (isset($_POST['submit'])) {

    if (create_artikel($_POST)) {

        return true;
    } else {

        return false;
    }
}


?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Artikel Tambah </h1>
    </div>

    <section>
        <div class="row">
            <div class="col-md-12">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="card mb-5">
                        <div class="card-header bg-primary pb-4"></div>
                        <div class="card-body">

                            <div class="mb-3">
                                <label for="" class="form-label">Kategori Artikel</label>
                                <select class="form-select" aria-label="Default select example" name="kategori">
                                    <option selected>Open this select menu</option>

                                    <?php foreach ($data as $row) : ?>

                                        <option value="<?= $row['id_kategori'] ?>"><?= $row['kategori'] ?></option>

                                    <?php endforeach; ?>

                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Judul Artikel</label>
                                <input type="text" name="judul" id="" class="form-control" placeholder="Enter kategori" required>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Author Artikel</label>
                                <input type="text" name="author" id="" class="form-control" value="<?= $_SESSION['profile']['nama'] ?>" placeholder="Enter author" required readonly>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Gambar Artikel</label>
                                <input type="file" name="gambar" id="" class="form-control" placeholder="Enter kategori">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Isi Artikel</label>
                                <textarea class="ckeditor" name="isi" id="isi" required></textarea>
                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="float-end">
                                <a href="artikel.php" class="btn btn-danger me-2">Kembali</a>
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