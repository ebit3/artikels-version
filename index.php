<?php

require_once 'layouts/header.php';

$kategori = read_kategori("SELECT * FROM categories");

$artikel = read_kategori("SELECT * FROM articles ORDER BY RAND() LIMIT 5");

$artikel_rand = read_kategori("SELECT * FROM articles INNER JOIN categories ON articles.id_kategori = categories.id_kategori ORDER BY RAND() LIMIT 3");

?>


<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="main-banner header-text">
    <div class="container-fluid">

        <div class="owl-banner owl-carousel">

            <?php foreach ($artikel as $row) : ?>

                <div class="item">
                    <img src="assets/images/<?= $row['gambar'] ?>" alt="">
                    <div class="item-content">
                        <div class="main-content">
                            <a href="post-details.html">
                                <h4><?= $row['judul'] ?></h4>
                            </a>
                            <ul class="post-info">
                                <li><a href="#"><?= $row['author'] ?></a></li>
                                <li><a href="#"><?= date("d-m-Y", strtotime($row['tgl_release'])); ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>

    </div>
</div>
<!-- Banner Ends Here -->

<section class="call-to-action">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-content">
                    <div class="row">
                        <div class="col-lg-8">
                            <span>Responsive Blog HTML5 CSS3</span>
                            <h4>Great Responsive Blog Website For Bloggers!</h4>
                        </div>
                        <div class="col-lg-4">
                            <div class="main-button">
                                <a rel="nofollow" href="#" target="_parent">More Info!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="blog-posts">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="all-blog-posts">
                    <div class="row">

                        <?php foreach ($artikel_rand as $row) : ?>

                            <div class="col-lg-12">
                                <div class="blog-post">
                                    <div class="blog-thumb">
                                        <img src="assets/images/<?= $row['gambar'] ?>" alt="">
                                    </div>
                                    <div class="down-content">
                                        <span><?= $row['kategori'] ?></span>
                                        <a href="post-details.html">
                                            <h4><?= $row['judul'] ?></h4>
                                        </a>
                                        <ul class="post-info">
                                            <li><a href="#"><?= $row['author'] ?></a></li>
                                            <li><a href="#"> <?= date("d-m-Y", strtotime($row['tgl_release'])); ?></a></li>
                                        </ul>
                                        <p>
                                            <?= substr($row['isi'], 0, 300); ?>
                                        </p>
                                        <div class="post-options">
                                            <div class="row">
                                                <div class="col-6">
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-tags"></i></li>
                                                        <li><a>Majasastraskaneda</a>,</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>

                        <div class="col-lg-12">
                            <div class="main-button">
                                <a href="blog.html">View All Posts</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="row">
                        <!-- <div class="col-lg-12">
                            <div class="sidebar-item search">
                                <form id="search_form" name="gs" method="GET" action="#">
                                    <input type="text" name="q" class="searchText" placeholder="type to search..." autocomplete="on">
                                </form>
                            </div>
                        </div> -->

                        <div class="col-lg-12">
                            <div class="sidebar-item recent-posts">
                                <div class="sidebar-heading">
                                    <h2>Artikel lain</h2>
                                </div>
                                <div class="content">
                                    <ul>

                                        <?php foreach ($artikel as $row) : ?>

                                            <li>
                                                <a href="post-details.html">
                                                    <h5><?= $row['judul'] ?></h5>
                                                    <span>
                                                        <?= date("d-m-Y", strtotime($row['tgl_release'])); ?>
                                                    </span>
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
                                    <h2>Kategori Artikel</h2>
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