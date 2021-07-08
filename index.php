<?php
ini_set('display_errors', 'Off');
session_start();
require_once "config/func.php";
$idPesanan = $_SESSION["idPesanan"];
$totalHarga = 0;
$result = mysqli_query($conn, "SELECT * FROM menu");
$result2 = mysqli_query($conn, "SELECT menu.nama_menu, menu.harga, detail_pesanan.jumlah
                                FROM detail_pesanan
                                INNER JOIN menu ON detail_pesanan.id_menu = menu.id_menu WHERE detail_pesanan.id_pesanan = '$idPesanan'");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'views/bootstrap.php'; ?>
    <title>KOPI KITA</title>
</head>
<style>

</style>

<body>
    <?php include "views/navbar.php"; ?>
    <br>
    <div class="container">
        <div class=" col-md-12">
            <div class="row">
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <div class="col-md-2 col-sm-4">
                        <div class="card" style="width: 10rem;">
                            <img src="img/<?= $row["gambar"]; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text">Rp <?= $row["nama_menu"]; ?></p>
                                <p class="card-text">Rp <?= $row["harga"]; ?></p>
                            </div>
                        </div>
                        <br>
                    </div>
                <?php endwhile; ?>
            </div>

        </div>
    </div>

    <div class="container">
        <p class="fs-3">Item</p>
        <div class="container row">
            <div class="container col-md-4">
                <ul class="ul">
                    <?php while ($row2 = mysqli_fetch_assoc($result2)) : ?>
                        <p style="display: none;"><?= $totalHarga += $row2["harga"] * $row2["jumlah"]; ?></p>
                        <li class="li">
                            <div class="listed">
                                <p class="fs-5"><?= $row2["nama_menu"] ?> &#10141; <?= $row2["jumlah"] ?></p>
                                <p class="fs-6" style="color:red;">Rp. <?= $row2["harga"] ?></p>
                            </div>
                        </li>
                    <?php endwhile; ?>

                </ul>
            </div>
            <div class="container col-md-4">
                <input type="hidden" value="<?= $totalHarga ?>" name="totalHarga">
                <p class="fs-3">Total</p>
                <p class="fs-4">Rp <?= $totalHarga ?></p>
            </div>

        </div>

    </div>
    <script>
        setInterval(function() {
            location.reload();
        }, 2000);
    </script>

</body>

</html>