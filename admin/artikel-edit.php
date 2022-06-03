<?php

ob_start();

include 'layouts/header.php';

require_once '../function/funsi.php';

$id = $_GET['id'];

$data = show_update_artikel("SELECT * FROM articles INNER JOIN categories ON articles.id_kategori = categories.id_kategori WHERE id_artikel = '" . $id . "' ");

$data2 = read_kategori("SELECT * FROM categories");

$conn = koneksi();

if (isset($_POST['submit'])) {

    if (update_artikel($_POST)) {

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

                            <input type="hidden" name="artikel_id" id="" value="<?= $data['id_artikel'] ?>">

                            <div class="mb-3">
                                <label for="" class="form-label">Kategori Artikel</label>
                                <select class="form-select" aria-label="Default select example" name="kategori">
                                    <option value="<?= $data['id_kategori'] ?>"><?= $data['kategori'] ?></option>

                                    <?php foreach ($data2 as $row) : ?>

                                        <option value="<?= $row['id_kategori'] ?>"><?= $row['kategori'] ?></option>

                                    <?php endforeach; ?>

                                </select>
                            </div>


                            <div class="mb-3">
                                <label for="" class="form-label">Judul Artikel</label>
                                <input type="text" name="judul" id="" class="form-control" placeholder="Enter kategori" value="<?= $data['judul'] ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Gambar Artikel</label>
                                <input type="file" name="gambar" id="" class="form-control" placeholder="Enter kategori">
                                <input type="hidden" name="gambar_lama" class="form-control" id="exampleInputEmail1" placeholder="Enter gambar" value="<?= $data['gambar'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Author Artikel</label>
                                <input type="text" name="author" id="" class="form-control" value="<?= $_SESSION['profile']['nama'] ?>" placeholder="Enter author" required readonly>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Isi Artikel</label>
                                <textarea class="ckeditor" name="isi" id="isi" required><?= $data['isi'] ?></textarea>
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