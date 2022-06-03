<?php

session_start();

// koneksi
function koneksi()
{
    $conn = mysqli_connect('localhost', 'root', '', 'db_artikel') or die(mysqli_error($conn));

    return $conn;
}


// =================================================================================================== start login

function login($data)
{
    $conn = koneksi();

    $user = $data['username'];
    $pass = $data['password'];

    $cek_username = mysqli_query($conn, "SELECT * FROM users WHERE username = '" . $user . "' ");

    // cek username 
    if (mysqli_num_rows($cek_username) === 1) {

        $row = mysqli_fetch_assoc($cek_username);

        if (password_verify($pass, $row['password'])) {

            $_SESSION['login_admin'] = true;
            $_SESSION['profile'] = $row;
            header('location:../admin/index.php');
        } else {

            header("location:../admin/login.php");
            $_SESSION['status'] = true;
            $_SESSION['e_password'] = "Password anda salah";
        }
    } else {

        header("location:../admin/login.php");
        $_SESSION['status'] = true;
        $_SESSION['e_username'] = "Username anda salah";
    }

    return $cek_username;
}




// =================================================================================================== end login



// =================================================================================================== start kategori

// create kategori
function create_kategori($data)
{

    $conn = koneksi();

    $kategori = $data['kategori'];

    $sql = "INSERT INTO categories VALUES(null, '" . $kategori . "')";

    mysqli_query($conn, $sql);

    $cek = mysqli_affected_rows($conn);

    if ($cek > 0) {

        header("location:kategori.php");
        $_SESSION['status'] = true;
        $_SESSION['add_kategori'] = "Tambah data berhasil";
    } else {

        echo "  
            <script>
                alert('Data Gagal di Tambahkan ');
                history.go(-1);
            </script>
            ";
    }

    return $cek;
}


// read kategori
function read_kategori($query)
{

    $conn = koneksi();

    $query = mysqli_query($conn, $query);

    $data = [];

    while ($row = mysqli_fetch_assoc($query)) {

        $data[] = $row;
    }

    return $data;
}


function hitung($query)
{
    $conn = koneksi();

    $query = mysqli_query($conn, $query);

    $cek = mysqli_num_rows($query);

    return $cek;
}



// update kategori
function show_update_kategori($query)
{
    $conn = koneksi();

    $sql = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($sql);

    return $row;
}


function update_kategori($data)
{
    $conn = koneksi();

    $kategori_id = $data['kategori_id'];
    $kategori = $data['kategori'];

    $sql = "UPDATE categories SET kategori = '" . $kategori . "' WHERE id_kategori = '" . $kategori_id . "'  ";

    mysqli_query($conn, $sql);

    $cek = mysqli_affected_rows($conn);

    if ($cek > 0) {

        header("location:kategori.php");
        $_SESSION['status'] = true;
        $_SESSION['edit_kategori'] = "Edit data berhasil";
    } else {

        echo "  
            <script>
                alert('Data Gagal di Update');
                history.go(-1);
            </script>
            ";
    }

    return $cek;
}



// delete kategori 
function delete_kategori($id)
{
    $conn = koneksi();

    $sql = "DELETE FROM categories WHERE id_kategori = '" . $id . "' ";

    mysqli_query($conn, $sql);

    $cek = mysqli_affected_rows($conn);

    if ($cek > 0) {

        header("location:kategori.php");
        $_SESSION['status'] = true;
        $_SESSION['drop_kategori'] = "Hapus data berhasil";
    } else {

        echo "  
            <script>
                alert('Data Gagal di Hapus');
                history.go(-1);
            </script>
            ";
    }

    return $cek;
}


// =================================================================================================== end kategori

// =================================================================================================== start user

// create user
function create_user($data)
{
    $conn = koneksi();

    $nama       = $data['nama'];
    $username   = strtolower(htmlspecialchars($data['username']));
    $password   = mysqli_real_escape_string($conn, $data['password']);
    $role       = $data['role'];

    // cek username 
    $ambil = mysqli_query($conn, "SELECT * FROM users WHERE username = '" . $username . "' ");

    if (mysqli_fetch_assoc($ambil) >   1) {

        echo "  
            <script>
                alert('Username Sudah Terdaftar');
                history.go(-1);
            </script>
            ";

        return false;
    }

    // hash password 
    $password = password_hash($password, PASSWORD_DEFAULT);

    // masuk query
    mysqli_query($conn, "INSERT INTO users VALUES(NULL, '" . $nama . "', '" . $username . "', '" . $password . "', '" . $role . "')");

    $cek = mysqli_affected_rows($conn);

    if ($cek > 0) {

        header("location:users.php");
        $_SESSION['status'] = true;
        $_SESSION['add_user'] = "Tambah data berhasil";
    } else {

        echo "  
            <script>
                alert('Data Gagal di Tambahkan');
                history.go(-1);
            </script>
            ";
    }

    return $cek;
}


// read user
function read_user($query)
{
    $conn = koneksi();

    $query = mysqli_query($conn, $query);

    $data = [];

    while ($row = mysqli_fetch_assoc($query)) {

        $data[] = $row;
    }

    return $data;
}



// update kategori
function show_update_user($query)
{
    $conn = koneksi();

    $sql = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($sql);

    return $row;
}


function update_user($data)
{
    $conn = koneksi();

    $nama       = $data['nama'];
    $username   = strtolower(htmlspecialchars($data['username']));
    $password   = mysqli_real_escape_string($conn, $data['password']);
    $role       = $data['role'];
    $user_id    = $data['user_id'];

    if ($password !== "") {

        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE users SET nama = '" . $nama . "', password = '" . $password . "', role = '" . $role . "' WHERE id_user = '" . $user_id . "' ";

        mysqli_query($conn, $sql);

        $cek = mysqli_affected_rows($conn);

        if ($cek > 0) {

            header("location:users.php");
            $_SESSION['status'] = true;
            $_SESSION['edit_user'] = "Edit data berhasil";
        } else {

            echo "  
            <script>
                alert('Data Gagal di Update');
                history.go(-1);
            </script>
            ";
        }

        return $cek;
    } elseif ($username !== "") {

        // cek username 
        $ambil = mysqli_query($conn, "SELECT * FROM users WHERE username = '" . $username . "' ");

        if (mysqli_fetch_assoc($ambil) >   1) {

            echo "  
            <script>
                alert('Username Sudah Terdaftar');
                history.go(-1);
            </script>
            ";

            return false;
        }

        $sql = "UPDATE users SET nama = '" . $nama . "', username = '" . $username . "', role = '" . $role . "' WHERE id_user = '" . $user_id . "' ";

        mysqli_query($conn, $sql);

        $cek = mysqli_affected_rows($conn);

        if ($cek > 0) {

            header("location:users.php");
            $_SESSION['status'] = true;
            $_SESSION['edit_user'] = "Edit data berhasil";
        } else {

            echo "  
            <script>
                alert('Data Gagal di Update');
                history.go(-1);
            </script>
            ";
        }

        return $cek;
    } else {

        $sql = "UPDATE users SET nama = '" . $nama . "', role = '" . $role . "' WHERE id_user = '" . $user_id . "' ";

        mysqli_query($conn, $sql);

        $cek = mysqli_affected_rows($conn);

        if ($cek > 0) {

            header("location:users.php");
            $_SESSION['status'] = true;
            $_SESSION['edit_user'] = "Edit data berhasil";
        } else {

            echo "  
            <script>
                alert('Data Gagal di Update');
                history.go(-1);
            </script>
            ";
        }

        return $cek;
    }
}



// delete user 
function delete_user($id)
{
    $conn = koneksi();

    $sql = "DELETE FROM users WHERE id_user = '" . $id . "' ";

    mysqli_query($conn, $sql);

    $cek = mysqli_affected_rows($conn);

    if ($cek > 0) {

        header("location:users.php");
        $_SESSION['status'] = true;
        $_SESSION['drop_user'] = "Hapus data berhasil";
    } else {

        echo "  
            <script>
                alert('Data Gagal di Hapus');
                history.go(-1);
            </script>
            ";
    }

    return $cek;
}

// =================================================================================================== end user

// =================================================================================================== start artikel


//create artikel 
function create_artikel($data)
{

    $conn = koneksi();

    $judul      = $data['judul'];
    $isi        = addslashes($data['isi']);
    $gambar     = upload();
    $kategori   = $data['kategori'];
    $author     = $data['author'];

    if (!$gambar) {

        return false;
    }

    $sql = "INSERT INTO articles VALUES(NULL, '" . $kategori . "', '" . $judul . "', '" . $isi . "', '" . $gambar . "', '" . $author . "', '" . date("Y-m-d") . "') ";

    mysqli_query($conn, $sql);

    $cek = mysqli_affected_rows($conn);

    if ($cek > 0) {

        header('location:artikel.php');
        $_SESSION['status'] = true;
        $_SESSION['add_artikel'] = "Tambah data berhasil";
    } else {

        echo "<script>alert('Tambah Data Gagal');history.go(-1);</script>" . mysqli_error($conn);
    }

    return $cek;
}


// upload function
function upload()
{
    $conn = koneksi();

    $nama_file = $_FILES['gambar']['name'];
    $tipe_file = $_FILES['gambar']['type'];
    $ukuran_file = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmp_file = $_FILES['gambar']['tmp_name'];

    // gambar kosong
    if ($error == 4) {

        // echo "<script>alert('Hapus Data Gagal');history.go(-1);</script>";

        return 'default.jpg';
    }

    // cek ekstensi file
    $daftar_gambar = ['jpg', 'jpeg', 'png'];
    $ekstensi_file = explode('.', $nama_file);
    $ekstensi_file = strtolower(end($ekstensi_file));

    if (!in_array($ekstensi_file, $daftar_gambar)) {

        echo "<script>alert('ekstensi gambar salah');history.go(-1);</script>";

        return false;
    }

    // cek type file
    if ($tipe_file !== 'image/jpeg' && $tipe_file !== 'image/png') {

        echo "<script>alert('Gambar anda salah');history.go(-1);</script>";

        return false;
    }

    // cek ukuran file
    if ($ukuran_file >= 4000000) {

        echo "<script>alert('Ukuran terlalu besar');history.go(-1);</script>";

        return false;
    }

    // berhasil
    $nama_file_baru = uniqid();
    $nama_file_baru .= '.';
    $nama_file_baru .= $ekstensi_file;

    move_uploaded_file($tmp_file, '../assets/images/' . $nama_file_baru);

    return $nama_file_baru;
}


// update artikel
function show_update_artikel($query)
{
    $conn = koneksi();

    $sql = mysqli_query($conn, $query);

    $data = mysqli_fetch_assoc($sql);

    return $data;
}


// update artikel
function update_artikel($data)
{
    $conn = koneksi();

    $judul      = $data['judul'];
    $isi        = addslashes($data['isi']);
    $artikel_id = $data['artikel_id'];
    $gambar     = upload();
    $kategori   = $data['kategori'];

    $gambar_lama = $data['gambar_lama'];

    $author     = $data['author'];


    if (!$gambar) {

        return false;
    }

    if ($gambar == 'default.jpg') {

        $gambar = $gambar_lama;
    } else {

        $a = "SELECT * FROM articles WHERE id_artikel = '$artikel_id'";

        $b = mysqli_query($conn, $a);

        $c = mysqli_fetch_assoc($b);

        if (is_file("../assets/images/" . $c['gambar']))
            unlink("../assets/images/" . $c['gambar']);
    }

    $sql = "UPDATE articles SET id_kategori = '" . $kategori . "', judul = '" . $judul . "', isi = '" . $isi . "', gambar = '" . $gambar . "', author = '" . $author . "', tgl_release = '" . date("Y-m-d") . "' WHERE id_artikel = '" . $artikel_id . "' ";

    mysqli_query($conn, $sql);

    $cek = mysqli_affected_rows($conn);

    if ($cek > 0) {

        header("location:artikel.php");
        $_SESSION['status'] = true;
        $_SESSION['edit_artikel'] = "Edit data berhasil";
    } else {

        echo "gagal" . mysqli_error($conn);
    }

    return $cek;
}

// delete artikel
function delete_artikel($id)
{
    $conn = koneksi();

    // ambil query gambar 
    $result = mysqli_query($conn, "SELECT * FROM articles WHERE id_artikel = '" . $id . "' ");

    $ambil_gambar = mysqli_fetch_assoc($result);

    $gambar = $ambil_gambar['gambar'];

    unlink("../assets/images/" . $gambar);


    // query delete
    mysqli_query($conn, "DELETE FROM articles WHERE id_artikel = '" . $id . "' ");


    $cek = mysqli_affected_rows($conn);

    if ($cek > 0) {

        header("location:artikel.php");
        $_SESSION['status'] = true;
        $_SESSION['drop_artikel'] = "Hapus data berhasil";
    } else {

        echo "gagal" . mysqli_error($conn);
    }

    return $cek;
}

// =================================================================================================== end artikel