<?php

include 'layouts/header.php';

$kategori = hitung("SELECT * FROM categories");

$users = hitung("SELECT * FROM users");

$artikel = hitung("SELECT * FROM articles");

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>

    <section>
        <div class="row">

            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">
                            <?= $kategori ?>
                        </h5>

                        <p class="card-text">Jumlah Data Kategori</p>
                    </div>
                    <div class="card-footer">
                        link hasil
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">
                            <?= $users ?>
                        </h5>

                        <p class="card-text">Jumlah Data Pengguna</p>
                    </div>
                    <div class="card-footer">
                        link hasil
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">
                            <?= $artikel ?>
                        </h5>

                        <p class="card-text">Jumlah Data Artikel</p>
                    </div>
                    <div class="card-footer">
                        link hasil
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">
                            <?= $kategori ?>
                        </h5>

                        <p class="card-text">Jumlah Data Kategori</p>
                    </div>
                    <div class="card-footer">
                        link hasil
                    </div>
                </div>
            </div>

        </div>
    </section>

</main>

<?php include 'layouts/footer.php' ?>