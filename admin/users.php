<?php

ob_start();

include 'layouts/header.php';

$halaman = 10;

$page = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;

$mulai = ($page > 1) ? ($page * $halaman) - $halaman : 0;

$data = read_user("SELECT * FROM users LIMIT $mulai, $halaman");

$conn = koneksi();

$query = mysqli_query($conn, "SELECT * FROM users ");


$next = $halaman + 1;

$total = mysqli_num_rows($query);

@$pages = ceil($total / $halaman);

$no    = $mulai + 1;


?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pengguna</h1>
    </div>

    <!-- responese -->
    <?php if (isset($_SESSION['status']) === true) : ?>

        <section>
            <div class="row">
                <div class="col-md-12">
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </symbol>
                    </svg>

                    <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                            <use xlink:href="#check-circle-fill" />
                        </svg>
                        <div>
                            <?= @$_SESSION['add_user'] ?>
                            <?= @$_SESSION['drop_user'] ?>
                            <?= @$_SESSION['edit_user'] ?>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                </div>
            </div>
        </section>

    <?php

    endif;

    unset($_SESSION['status']);
    unset($_SESSION['add_user']);
    unset($_SESSION['drop_user']);
    unset($_SESSION['edit_user']);

    ?>

    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-5">
                    <div class="card-header bg-white">
                        <a href="users-tambah.php" class="btn btn-primary">
                            <span data-feather="plus" class="align-text-bottom mb-1"></span>
                            Tambah Pengguna
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped align-middle table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Pengguna</th>
                                        <th scope="col">Username Pengguna</th>
                                        <th scope="col">Role Pengguna</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($data as $row) : ?>

                                        <tr>
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $row['nama'] ?></td>
                                            <td><?= $row['username'] ?></td>
                                            <td><?= $row['role'] ?></td>
                                            <td>
                                                <a href="users-hapus.php?id=<?= $row['id_user'] ?>" class="btn btn-sm btn-danger">
                                                    <span data-feather="trash" class="align-text-bottom"></span>
                                                </a>

                                                <a href="users-edit.php?id=<?= $row['id_user'] ?>" class="btn btn-sm btn-warning">
                                                    <span data-feather="edit" class="align-text-bottom"></span>
                                                </a>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">

                                <?php for ($no = 1; $no <= @$pages; $no++) : ?>

                                    <li class="page-item"><a class="page-link" href="kategori.php?halaman=<?= $no ?>"><?= $no ?></a></li>

                                <?php endfor; ?>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'layouts/footer.php' ?>