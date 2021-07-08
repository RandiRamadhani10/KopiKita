<?php
require_once "config/func.php";

$result = mysqli_query($conn, "SELECT * FROM pesanan");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'views/bootstrap.php'; ?>
    <title>Tambah Menu</title>
</head>

<body>
    <?php include "views/navbar-admin.php"; ?>
    <br>
    <div class="container">
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                Pesanan
            </a>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <a href="lihatDetailPesanan.php?id=<?= $row["id_pesanan"]?>" class="list-group-item list-group-item-action">
                <p style="color:black;">Nama: <?= $row["nama_pelanggan"]?></p>
                <p>Total Harga: Rp<?= $row["total_harga"]?></p>
            </a>
            <?php endwhile; ?>
        </div>
    </div>
</body>

</html>