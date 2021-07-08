<?php
    session_start();

    require_once "config/func.php";
    
    $idPesanan = $_SESSION["idPesanan"];
    $idMenu = $_GET["idMenu"];
    
    $result = mysqli_query($conn, "SELECT * FROM menu WHERE id_menu = '$idMenu'");
    $row = mysqli_fetch_assoc($result);
    
    if (isset($_POST["tambah"])) {
        tambahDetailPesanan($_POST);
        header("location: tambahPesanan.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include'views/bootstrap.php';?>
    <title>Jumlah Pesanan</title>
</head>

<body>
<?php include 'views/navbar.php'; ?>
    <div class="container">
        <div class="col-md-push-3">
        <form action="" method="POST">
        <input type="hidden" value="<?= $idPesanan ?>" name="idPesanan">
        <input type="hidden" value="<?= $row["id_menu"] ?>" name="idMenu">
        <h2><?= $row["nama_menu"] ?></h2>
        <div class="mb-3">
        <input class="form-control" type="number" name="jumlah">
        </div>
        
        <button class="btn btn-lg btn-success" type="submit" name="tambah">Tambah</button>
    </form>
        </div>
    </div>
    
</body>

</html>