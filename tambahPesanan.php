<?php
session_start();
$idPesanan = $_SESSION["idPesanan"];
require_once "config/func.php";
$result = mysqli_query($conn, "SELECT * FROM menu");
$result2 = mysqli_query($conn, "SELECT menu.nama_menu, menu.harga, detail_pesanan.jumlah
                        FROM detail_pesanan
                        INNER JOIN menu ON detail_pesanan.id_menu = menu.id_menu WHERE detail_pesanan.id_pesanan = '$idPesanan';");
$totalHarga = 0;
if(isset($_POST["batal"])){
    batalPesanan($_POST);
    header("location:indexPesanan.php");
}

if(isset($_POST["bayar"])){
    tambahPesanan($_POST);
    echo"<script> alert('Pembayaran Berhasil!');</script>";
    echo"<script> location.href='indexPesanan.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include'views/bootstrap.php';?>
    <title>Pesanan</title>
</head>
<style></style>
<body>
    <div class="container row">
    <div class="container col-md-5">
        <ul class="list-group" style="padding: 10px;">
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <li class="list-group-item">
                    <div class="list" id="<?= $row["id_menu"] ?>">
                        <h5 style="padding-bottom: 5px; margin:0px;"><?= $row["nama_menu"] ?></h5>
                        <p style="font-size: 12px; margin-bottom:5px">Rp. <?= $row["harga"] ?></p>
                        <a class="btn btn-xm btn-success" href="jumlahPesanan.php?idMenu=<?= $row["id_menu"] ?>" type="submit" name="tambah">Tambah </a>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
    <div class="container col-md-3">
        <form action="" method="POST">
            <h2>Item</h2>
            <label for="namaPelanggan">Nama Pelanggan :</label>
            <input type="text" name="namaPelanggan" id="namaPelanggan">
            <hr>
            <ul class="list-group">
            <?php while ($row2 = mysqli_fetch_assoc($result2)) : ?>
                <p style="display: none;"><?= $totalHarga += $row2["harga"] * $row2["jumlah"] ; ?></p>
                <li  class="list-group-item">
                    <div class="listed">
                        <h3><?= $row2["nama_menu"] ?>  &#10141; <?= $row2["jumlah"] ?></h3>
                        <p style="font-size: 13px;">Rp. <?= $row2["harga"] ?></p>
                    </div>
                </li>
            <?php endwhile; ?>
            </ul>
            <input type="hidden" value="<?= $totalHarga ?>" name="totalHarga">
            <p class="fs-4">Total bayar</p>
            <h3 class="text-end" style="color: red;">Rp. <?= $totalHarga ?></h3>
            <button class="btn btn-sm btn-danger" type="submit" name="batal">Batal</button>
            <button class="btn btn-sm btn-primary" type="submit" name="bayar">Bayar</button>
        </form>
    </div>
    </div>
   

</body>

</html>