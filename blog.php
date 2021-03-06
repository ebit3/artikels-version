<?php

require_once 'layouts/header.php';

$kategori = read_kategori("SELECT * FROM categories");

$artikel_rand = read_kategori("SELECT * FROM articles ORDER BY RAND() LIMIT 4");

if (isset($_POST['cari'])) {

    $artikel = read_kategori("SELECT * FROM articles INNER JOIN categories ON articles.id_kategori = categories.id_kategori WHERE judul LIKE '%" . $_POST['cari'] . "%' ");
} else {

    $halaman = 4;

    $page = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;

    $mulai = ($page > 1) ? ($page * $halaman) - $halaman : 0;


    $artikel = read_kategori("SELECT * FROM articles INNER JOIN categories ON articles.id_kategori = categories.id_kategori LIMIT $mulai , $halaman");

    $conn = koneksi();

    $query = mysqli_query($conn, "SELECT * FROM articles");

    $total = mysqli_num_rows($query);

    @$pages = ceil($total / $halaman);
}

?>


<div class="heading-page header-text">

</div>

<!-- Banner Ends Here -->

<section class="blog-posts grid-system">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="all-blog-posts">
                    <div class="row">

                        <?php if ($artikel == null) : ?>

                            <div class="col-md-12">
                                <div class="blog-post">
                                    <div class="down-content">
                                        <p class="text-center">Maaf Artikel Yang Anda Cari Belum Terdaftar</p>
                                    </div>
                                </div>
                            </div>

                        <?php endif; ?>

                        <?php foreach ($artikel as $row) : ?>

                            <div class="col-lg-6">
                                <div class="blog-post">
                                    <div class="blog-thumb">
                                        <img src="assets/images/<?= $row['gambar'] ?>" alt="<?= $row['judul'] ?>">
                                    </div>
                                    <div class="down-content">
                                        <span><?= $row['kategori'] ?></span>
                                        <a href="single_post.php?id=<?= $row['id_artikel'] ?>">
                                            <h4><?= $row['judul'] ?></h4>
                                        </a>
                                        <ul class="post-info">
                                            <li><a href="#"><?= $row['author'] ?></a></li>
                                            <li><a href="#"><?= date("d-m-Y", strtotime($row['tgl_release'])); ?></a></li>
                                        </ul>
                                        <p>
                                            <?= substr($row['isi'], 0, 250) ?>
                                            <a href="">baca lebih lanjut...</a>
                                        </p>
                                        <div class="post-options">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-tags"></i></li>
                                                        <li><a href="#">Great Responsive</a>,</li>
                                                        <li><a href="#">Website</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>

                        <div class="col-lg-12">
                            <ul class="page-numbers">
                                <?php for ($no = 1; $no <= @$pages; $no++) : ?>

                                    <li><a href="blog.php?halaman=<?= $no ?>"><?= $no; ?></a></li>

                                <?php endfor; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sidebar-item search">
                                <form id="search_form" name="gs" method="post" action="">
                                    <?php if (isset($_POST['cari'])) { ?>

                                        <input type="text" name="cari" class="searchText" placeholder="type to search..." autocomplete="on" value="<?= $_POST['cari'] ?>">

                                    <?php } else { ?>

                                        <input type="text" name="cari" class="searchText" placeholder="type to search..." autocomplete="on">

                                    <?php } ?>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="sidebar-item recent-posts">
                                <div class="sidebar-heading">
                                    <h2>Recent Posts</h2>
                                </div>
                                <div class="content">
                                    <ul>

                                        <?php foreach ($artikel_rand as $row) : ?>

                                            <li>
                                                <a href="single_post.php?id=<?= $row['id_artikel'] ?>">
                                                    <h5><?= $row['judul'] ?></h5>
                                                    <span><?= date("d-m-Y", strtotime($row['tgl_release'])); ?></span>
                                                </a>
                                            </li>

                                        <?php endforeach; ?>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="sidebar-item tags">
                                <div class="sidebar-heading">
                                    <h2>Tag Clouds & Languages</h2>
                                </div>
                                <div class="content">
                                    <ul>

                                        <?php foreach ($kategori as $row) : ?>

                                            <li><a href="filter_post.php?kategori=<?= $row['id_kategori'] ?>"><?= $row['kategori'] ?></a></li>

                                        <?php endforeach; ?>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php require_once 'layouts/footer.php'; ?>