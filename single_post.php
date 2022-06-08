<?php

require_once 'layouts/header.php';

$id = $_GET['id'];

$data = show_update_artikel("SELECT * FROM articles INNER JOIN categories ON articles.id_kategori = categories.id_kategori WHERE id_artikel = '" . $id . "' ");

$artikel_rand = read_kategori("SELECT * FROM articles ORDER BY RAND() LIMIT 4");

$kategori = read_kategori("SELECT * FROM categories");
?>


<!-- Banner Starts Here -->
<div class="heading-page header-text">

</div>

<!-- Banner Ends Here -->

<!-- <section class="call-to-action">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-content">
                    <div class="row">
                        <div class="col-lg-8">
                            <span>Responsive Blog HTML5 / CSS3</span>
                            <h4>Great Responsive website BLOG For Bloggers!</h4>
                        </div>
                        <div class="col-lg-4">
                            <div class="main-button">
                                <a rel="nofollow" href="https://www.youtube.com/channel/UCiC5-n85_UzJs7C1FvFl-fg" target="_parent">More Info!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->


<section class="blog-posts grid-system">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="all-blog-posts">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="blog-post">
                                <div class="blog-thumb">
                                    <img src="assets/images/<?= $data['gambar'] ?>" alt="<?= $data['judul'] ?>">
                                </div>
                                <div class="down-content">
                                    <span><?= $data['kategori'] ?></span>
                                    <h4><?= $data['judul'] ?></h4>
                                    <ul class="post-info">
                                        <li><a href="#"><?= $data['author'] ?></a></li>
                                        <li><a href="#"><?= date("d-m-Y", strtotime($data['tgl_release'])); ?></a></li>
                                    </ul>
                                    <p><?= $data['isi'] ?></p>
                                    <div class="post-options">
                                        <div class="row">
                                            <div class="col-6">
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-tags"></i></li>
                                                    <li><a href="#">Great Responsive</a>,</li>
                                                    <li><a href="#">BLOG</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-6">
                                                <ul class="post-share">
                                                    <li><i class="fa fa-share-alt"></i></li>
                                                    <li><a href="#">Facebook</a>,</li>
                                                    <li><a href="#"> Twitter</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="row">

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


<?php

require_once 'layouts/footer.php';

?>