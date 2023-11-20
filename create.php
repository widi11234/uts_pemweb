<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* CSS Anda di sini */
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center mb-4">Tambah Produk</h1>
        <a href="show.php" class="d-block mb-3">Lihat data produk</a>
        <form action="./backend/create.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Input nama produk" required>
            </div>
            <div class="form-group">
                <input type="number" name="price" class="form-control" placeholder="Input harga produk" required>
            </div>
            <div class="form-group">
                <input type="file" name="image" class="form-control-file" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Simpan" class="btn btn-primary btn-block">
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
