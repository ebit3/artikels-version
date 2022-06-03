<?php

ob_start();

include '../function/funsi.php';

if (isset($_POST['submit'])) {

    if (login($_POST) > 0) {

        return true;
    } else {

        return false;
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>Dashboard Template · Bootstrap v5.2</title>


    <link rel="stylesheet" href="../vendor/css/bootstrap.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
            font-family: 'Poppins', sans-serif;
        }

        .form-signin {
            max-width: 430px;
            /* padding: 15px; */
        }
    </style>

</head>

<body class="">

    <main class="form-signin w-100 m-auto">

        <!-- responese -->
        <?php if (isset($_SESSION['status']) === true) : ?>

            <section>
                <div class="row d-flex">
                    <div class="col-md-12 m-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </symbol>
                        </svg>


                        <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                <use xlink:href="#exclamation-triangle-fill" />
                            </svg>
                            <div>
                                <?= @$_SESSION['e_password'] ?>
                                <?= @$_SESSION['e_username'] ?>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                    </div>
                </div>
            </section>

        <?php

        endif;

        unset($_SESSION['status']);
        unset($_SESSION['e_password']);
        unset($_SESSION['e_username']);


        ?>


        <form method="post">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter username" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required autofocus>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary" type="submit" name="submit">Sing In</button>
                        <p class="text-muted text-center mt-2">Silahkan login terlebih dahulu</p>
                    </div>
                </div>
            </div>
        </form>
    </main>

    <script src="../vendor/js/bootstrap.bundle.min.js"></script>

</body>

</html>