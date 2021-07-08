<?php
require_once "config/func.php";

if (isset($_POST["hapus"])) {
    hapusMenu($_POST);
} else mysqli_error($conn);

$result = mysqli_query($conn, "SELECT * FROM menu");
$no = 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'views/bootstrap.php'; ?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.14.0/css/mdb.min.css" rel="stylesheet">
    <title>Lihat Menu</title>
</head>

<body>
    <?php include "views/navbar-admin.php"; ?>
    <div class="container col-md-12 col-sm-8">
        <form action="" method="POSt" name="form">
            <a class="button1 btn btn-sm btn-success" href="tambahMenu.php">Tambah Menu</a>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Menu</th>
                        <th>Harga Menu</th>
                        <th>Gambar</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                            <input type="hidden" name="gambar" value="<?= $row["gambar"]; ?>">
                            <td><?= $no++ ?></td>
                            <td><?= $row["nama_menu"]; ?></td>
                            <td><?= $row["harga"]; ?></td>
                            <td><img src="img/<?= $row["gambar"]; ?>" alt="" width="30px"></td>
                            <td>
                                <a class="button1 btn btn-sm btn-primary" href="editMenu.php?id=<?= $row["id_menu"]; ?>">Edit</a>
                                |
                                <button class="btn btn-sm btn-danger" type="submit" name="hapus" value="<?= $row["id_menu"]; ?>">Hapus</button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>

            </table>
    </div>
    <footer style="margin-top: 0px;" class="page-footer font-small red darken-3">
        <div class="footer-copyright text-center py-3">© 2021 Copyright:
            <a href="https://mdbootstrap.com/"> DWI RANDI RAMADHANi</a>
        </div>
    </footer>
</body>

</html>