<?php
session_start();
require_once "config/func.php";
if (isset($_POST["tambah"])) {
    mysqli_query($conn, "INSERT INTO pesanan
    VALUES ()");
    $result = mysqli_query($conn, "SELECT * FROM pesanan ORDER BY id_pesanan DESC LIMIT 1");
    $row = mysqli_fetch_assoc($result);
    $_SESSION["idPesanan"] = $row["id_pesanan"];
    header("location: tambahPesanan.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'views/bootstrap.php'; ?>
    <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.14.0/css/mdb.min.css" rel="stylesheet">
    <title>Tambah</title>
</head>
<style>
    .container {
        width: 100%;
        height: 50vh;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
    }

    .form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
</style>

<body>
    <?php include 'views/navbar.php'; ?>
    <div class="container fluid">
        <form action="" method="POST">
            <button class="btn btn-lg btn-danger" name="tambah"> Buat Pesanan </button>
        </form>
    </div>
    <footer style="margin-top: 34.5vh;" class="page-footer font-small red darken-3">
        <div class="footer-copyright text-center py-3">© 2021 Copyright:
            <a href="https://mdbootstrap.com/"> DWI RANDI RAMADHANi</a>
        </div>
    </footer>
</body>

</html>