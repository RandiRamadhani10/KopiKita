<?php
require_once "config/func.php";
if (isset($_POST["submit"])) {
    if (tambahMenu($_POST) > 0) {
        header("location: lihatMenu.php");
    } else mysqli_error($conn);
}
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
   <form class="form-group" action="" method="POST" enctype="multipart/form-data">
        <ul>
            <div class="mb-3">
                <label class="form-label" for="namaMenu">Nama Menu</label>
                <input class="form-control" type="text" name="nama" id="namaMenu" require>
            </div>
            <div class="mb-3">
                <label for="harga">Harga Menu</label>
                <input class="form-control" type="text" name="harga" id="harga" require>
            </div>
            <div class="mb-3">
                <label for="gambar">Gambar</label>
                <input class="form-control" type="file" name="gambar" id="gambar" require>
            </div>
            <div class="mb-3">
                <button class="btn btn-sm btn-success" type="submit" name="submit"> TAMBAH</button>
                <a class="btn btn-sm btn-danger" href="lihatMenu.php">Batal</a>
            </div>
        </ul>
    </form>
   </div>
</body>

</html>