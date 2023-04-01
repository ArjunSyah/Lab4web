<?php
include("koneksi.php");

// query untuk menampilkan data
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Tugas Konsep Modularisasi</title>
  <link href="junub.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <div id="container">
    <header>
      <center>
        <h1 style="width: 200px;">TUGAS 4</h1>
      </center>
    </header>
    <nav>
      <a href="home.php">Rumah</a>
      <a href="about.php">Tentang</a>
      <a href="contact.php">Kontak</a>
    </nav>