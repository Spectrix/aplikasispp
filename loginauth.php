<?php
session_start();
//untuk memulai eskekusi session pada server dan kemudian menyimpannya pada browser.
if(isset($_SESSION['admin'])){//jika user teridentifikasi sebagai admin(true),maka akan diarahkan ke halaman index.php(dashboard)
    header('location: loginauth.php');
}
include 'config.php';
if(isset($_POST['login'])){
    $user = htmlentities(strip_tags($_POST['user']));
    $passwd = htmlentities(strip_tags($_POST['passwd']));
    $query = "SELECT * FROM admin WHERE user_admin = '$user'";
    $exec = mysqli_query($db,$query);
    if(mysqli_num_rows($exec) !== 0) {
        $query = "SELECT * FROM admin WHERE pass_admin = '$passwd'";
        $exec = mysqli_query($db,$query);
        if(mysqli_num_rows($exec) !== 0) {
            $res = mysqli_fetch_assoc($exec);
            $_SESSION['admin'] = $res['id_admin'];
            $_SESSION['nama_admin'] = $res['nama_admin'];
            header('location: index.php');
        }else{
            echo "<script>alert('password Yang Anda Masukkan Salah');
            document.location = 'loginauth.php';</script>";
        }
    }else{
        echo "<script>alert('User Admin Tidak Tersedia');
        document.location = 'loginauth.php';</script>";
    }
}
 ?>
 <!Doctype html>
 <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-
        fit=no">
        <meta name="desciption" content="">
        <meta name="author'" content="">
        
        <tittle>LOGIN</tittle>
        <link href="foto/logos.png" rel="icon" type="images/x-icon">
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,
        300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-lg-block bg-login-image">
                                <img width="100%" height="100%" src="img/SMKN 4.jpg">
</div>
<div class="col-lg-6">
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Aplikasi Pembayaran SPP</h1>
            <h5 class="text-gray-900 mb-4">SMK Negeri 4 TanjungPinang</h5>
</div>
<form class="user" method="POST" action="">
    <div class="form-group">
        <input type="text" autocomplete="off" required name="user"
        class="form-control form-control-user" placeholder="Enter Username...">
</div>
<div class="form-group">
    <input autocomplete="off" type="password" required name="passwd" class="form-control form-control-user"
    placeholder="Password">
</div>
<button type="Submit" name="login" class="btn btn-primary btn-user btn-block">LOGIN</button>
<hr />
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>
<script>$('input').attr('autocomplete','off');</script>
</body>
</html>