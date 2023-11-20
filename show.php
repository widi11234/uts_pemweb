<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        th {
            background-color: #343a40;
            color: white;
        }

        .btn {
            padding: 0.3rem 0.75rem;
        }

        /* Tambahkan gaya khusus jika diperlukan */
        /* Misalnya: Ubah warna latar belakang header, warna teks, dsb. */
        /* contoh: th {
            background-color: #f2f2f2;
            color: #333;
        } */
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Data produk</h1>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Nama produk</th>
                    <th>Harga</th>
                    <th>Gambar produk</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require './config/db.php';

                $products = mysqli_query($db_connect, "SELECT * FROM products");
                $no = 1;

                while ($row = mysqli_fetch_assoc($products)) {
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['name']; ?></td>
                        <td><?= $row['price']; ?></td>
                        <td><a href="<?= $row['image']; ?>" target="_blank">unduh</a></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-primary btn-sm mr-2">Edit</a>
                            <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="create.php" class="btn btn-success">Tambah produk</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
