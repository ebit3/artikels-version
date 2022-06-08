<?php

require_once 'layouts/header.php';

$kategori = read_kategori("SELECT * FROM categories");

$artikel = read_kategori("SELECT * FROM articles ORDER BY RAND() LIMIT 5");

$artikel_rand = read_kategori("SELECT * FROM articles ORDER BY RAND() LIMIT 3");

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
                                        <span>Lifestyle</span>
                                        <a href="post-details.html">
                                            <h4><?= $row['judul'] ?></h4>
                                        </a>
                                        <ul class="post-info">
                                            <li><a href="#"><?= $row['author'] ?></a></li>
                                            <li><a href="#"> <?= date("d-m-Y", strtotime($row['tgl_release'])); ?></a></li>
                                            <li><a href="#">12 Comments</a></li>
                                        </ul>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro sit aut cupiditate quos adipisci hic molestiae dicta perspiciatis minima tenetur sunt, repellendus omnis ad sed delectus? Nam voluptatum laboriosam ab, vel architecto numquam aut tempora ipsa. Ab incidunt in et error hic consectetur voluptatem nesciunt, inventore libero! Ut, fugiat reprehenderit.</p>
                                        <p>
                                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit inventore beatae dignissimos debitis soluta sed blanditiis atque eos dolorum ducimus nam, consequuntur nulla laborum temporibus repudiandae, architecto quo reprehenderit expedita quidem vitae. Consequatur, sunt sapiente ad laudantium molestias impedit nulla iste? Voluptatem eligendi distinctio nemo laudantium asperiores beatae, officia, sapiente suscipit repellendus eaque atque quae eos quisquam quia animi maxime nesciunt nulla iste? Sit omnis cum mollitia perspiciatis deserunt dolore dolor voluptate, aperiam veritatis voluptatibus laudantium voluptatem corporis culpa temporibus ea sed, officia expedita, consectetur reprehenderit aliquid numquam tempora quo ducimus? Laboriosam repudiandae quo dolor maiores maxime atque totam ipsa.
                                        </p>
                                        <div class="post-options">
                                            <div class="row">
                                                <div class="col-6">
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-tags"></i></li>
                                                        <li><a href="#">Beauty</a>,</li>
                                                        <li><a href="#">Nature</a></li>
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