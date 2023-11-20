<?php
// ./backend/create.php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    require '../config/db.php'; // Sesuaikan path dengan struktur direktori Anda

    $name = $_POST['name'];
    $price = $_POST['price'];
    // Jika menggunakan file gambar, Anda bisa menggunakan $_FILES['image'] untuk proses upload gambar ke server

    // Lakukan proses penyimpanan data ke database (contoh menggunakan prepared statement)
    $query = "INSERT INTO products (name, price) VALUES (?, ?)";
    $stmt = mysqli_prepare($db_connect, $query);

    mysqli_stmt_bind_param($stmt, "si", $name, $price);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // Redirect kembali ke halaman show.php jika data berhasil disimpan
        header("Location: ../show.php");
        exit();
    } else {
        echo "Gagal menyimpan data ke database.";
        // Handle kesalahan jika terjadi saat penyimpanan data ke database
    }
} else {
    echo "Aksi tidak valid.";
    // Handle aksi lainnya yang tidak valid
}
?>
