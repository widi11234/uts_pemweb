<?php
require './config/db.php';

// Variabel untuk menyimpan status edit
$editStatus = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Mengambil data produk berdasarkan ID
    $query = "SELECT * FROM products WHERE id = $productId";
    $result = mysqli_query($db_connect, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
    } else {
        echo "Produk tidak ditemukan.";
        exit();
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Memproses data yang dikirim dari form edit
    $productId = $_POST['id'];
    $productName = $_POST['name'];
    $productPrice = $_POST['price'];

    // Melakukan update data produk
    $updateQuery = "UPDATE products SET name = '$productName', price = '$productPrice' WHERE id = $productId";
    $updateResult = mysqli_query($db_connect, $updateQuery);

    if ($updateResult) {
        $editStatus = 'success'; // Set status berhasil edit
    } else {
        echo "Gagal melakukan pengeditan produk.";
        exit();
    }
} else {
    echo "Permintaan tidak valid.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Aturan CSS Anda di sini */
    </style>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container">
        <h1 class="text-center mb-4">Edit Produk</h1>
        <?php if ($editStatus === 'success') : ?>
            <!-- Modal untuk menampilkan pesan berhasil edit -->
            <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="successModalLabel">Edit Produk Berhasil</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Rekaman produk berhasil diubah.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" onclick="window.location.href='show.php'">OK</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Script untuk menampilkan modal secara otomatis -->
            <script>
                $('#successModal').modal('show');
            </script>
        <?php endif; ?>

        <!-- Form Edit -->
        <form method="post" action="">
            <input type="hidden" name="id" value="<?= $product['id']; ?>">
            <div class="form-group">
                <label for="name">Nama Produk:</label>
                <input type="text" id="name" name="name" value="<?= $product['name']; ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="price">Harga:</label>
                <input type="text" id="price" name="price" value="<?= $product['price']; ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- jQuery (required for Bootstrap JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>
