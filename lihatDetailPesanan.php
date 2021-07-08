<?php
require_once "config/func.php";
$idPesanan = $_GET["id"];
$result = mysqli_query($conn, "SELECT * FROM pesanan WHERE id_pesanan = '$idPesanan' ");
$result2 = mysqli_query($conn, "SELECT menu.nama_menu, menu.harga, detail_pesanan.jumlah
                        FROM detail_pesanan
                        INNER JOIN menu ON detail_pesanan.id_menu = menu.id_menu WHERE detail_pesanan.id_pesanan = '$idPesanan';");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'views/bootstrap.php'; ?>
    <title>Detail Pesanan</title>
</head>
<style></style>

<body>
    <?php include "views/navbar-admin.php"; ?>
    <br>
    <div class="container d-flex justify-content-center">
        <div class="col-md-6">
            <ul class="list-group">
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <p class="fs-3"> Nama Pelanggan: <?= $row["nama_pelanggan"] ?> </p>
                    <p class="fs-4"> Total Harga:  <p class="fs-4"style="color:red; margin:0px;">Rp<?= $row["total_harga"] ?></p></p>
                <?php endwhile; ?>
            </ul>
        </div>
        <div class=" col-md-6">
            <form action="" method="POST">
                <ul class="list-group">
                    <?php while ($row2 = mysqli_fetch_assoc($result2)) : ?>
                        <p style="display: none;"><?= $totalHarga += $row2["harga"] * $row2["jumlah"]; ?></p>
                        <li class="list-group-item">
                            <div class="listed">
                                <h3><?= $row2["nama_menu"] ?> &#10141; <?= $row2["jumlah"] ?></h3>
                                <p style="font-size: 13px;">Rp. <?= $row2["harga"] ?></p>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </form>
        </div>
    </div>


</body>

</html>