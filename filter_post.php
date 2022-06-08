<?php

require_once 'layouts/header.php';

$id_kategori = $_GET['kategori'];

$kategori = read_kategori("SELECT * FROM categories");

$artikel_rand = read_kategori("SELECT * FROM articles ORDER BY RAND() LIMIT 4");

$artikel = read_kategori("SELECT * FROM articles INNER JOIN categories ON articles.id_kategori = categories.id_kategori WHERE articles.id_kategori = '" . $id_kategori . "' ");

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
                                        <p class="text-center">Maaf Artikel Belum Tersedia</p>
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
                                        <a href="post-details.html">
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
                                <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
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
                                <form id="search_form" name="gs" method="GET" action="#">
                                    <input type="text" name="q" class="searchText" placeholder="type to search..." autocomplete="on">
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
                                                <a href="post-details.html">
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

                                            <li><a href="#"><?= $row['kategori'] ?></a></li>

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