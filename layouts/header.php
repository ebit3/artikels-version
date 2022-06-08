<?php require_once 'function/funsi.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Responsive Blog">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">

    <title>Responsive Blog Using HTML5/CSS3</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/temp-user/css/fontawesome.css">
    <link rel="stylesheet" href="assets/temp-user/css/template.css?<?php echo time() ?>">
    <link rel="stylesheet" href="assets/temp-user/css/owl.css?<?= time() ?>">

</head>

<body>

    <!-- Header -->
    <header class="">
        <nav class="navbar navbar-expand-lg">

            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <h2>Responsive Blog<em>.</em></h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About Us</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="blog.php">Blog</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="post-details.html">Post Details</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact Us</a>
                        </li>

                    </ul>
                </div>
            </div><!-- container div-->
        </nav>
    </header>