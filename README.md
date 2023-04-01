# Lab4web
# PROJECT PRAKTIKUM 4 (KONSEP MODULAR SRTA IMPLEMENTASI KE PRAKTIKUM SEBELUMNYA)

**Nama: Arjun Syah** <br/>
**Nim : 312110102** <br/>
**Kelas : TI.21.A3** <br/>

<br/>

## **Membuat file header.php

### Code :
```
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Contoh Modularisasi</title>
  <link href="junub.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <div class="container">
    <header>
      <h1>MODULARISASI MENGGUNAKAN REQUIRE</h1>
    </header>
    <nav>
      <a href="home.php">Home</a>
      <a href="about.php">About</a>
      <a href="contact.php">Contact</a>
    </nav>
```
## **Membuat file footer.php**

### Code :
```
<footer>
  <p>&copy; 2023, Teknik Informatika, <a href="https://wa.me/6285591529798" style="text-decoration: none ">Arjun Syah</a>, Universitas Pelita Bangsa</p>
  </div>
  </body>

  </html>
```
## **Membuat file home.php**


### Code :
```
<?php require('header.php'); ?>
<div class="content">
  <h2>Ini Halaman Home</h2>
  <p>Ini adalah bagian content dari halaman.</p>
</div>
<?php require('footer.php'); ?>

```
## **Membuat file about.php**


### Code :
```
<?php require('header.php'); ?>
<div class="content">
  <h2>Ini Halaman About</h2>
  <p>Ini adalah bagian content dari halaman.</p>
</div>
<?php require('footer.php'); ?>
```
## **Membuat file index.php**


### Code :
```
<?php
$mod = @$_REQUEST['mod'];
switch ($mod) {
  case "home":
    require("home.php");
    break;
  case "about":
    require("about.php");
    break;
  default;
    require("home.php");
}
```
## **Membuat file .htaccess**


### Code :
```
<IfModule mod_rewrite.c>
 RewriteEngine On
 RewriteBase /projek/lab4/lab4_php_modular/  
 RewriteCond %{REQUEST_FILENAME} !-f
 RewriteCond %{REQUEST_FILENAME} !-d
 RewriteRule ^(.*)$ index.php?mod=$1 [L]
</IfModule>
```
## **Membuat file junub.css**
### Code :

```
h1 {
  color: rgb(0, 0, 0);
  font-family: Arial, Helvetica, sans-serif;
  background:#1fb811;
  width: 45%;
  text-align: center ;
  padding-inline: 413px;
  padding-top: 20px;
  padding-bottom: 19px;
  margin-top: 0px;
  margin-bottom: 4px;

}

h2 {
  color: #224bc3;
  font-family: Arial, Helvetica, sans-serif;
  width: 20%;
  text-align: left;
}

nav {
  font-family: Arial, Helvetica, sans-serif;
  margin-bottom: 5px;
  display: block;
  background: rgb(8, 218, 78);;
}
nav a {
  padding: 15px 30px;
  display: inline-block;
  color: #ffffff;
  font-size: 14px;
  text-decoration: none;
  font-weight: bold;
}
nav a.active,
nav a:hover {
  background-color: #368b6f;
}

.content {
  background-color: #d4d4d4;
  padding: 50px 20px;
  padding-bottom: 253px;
 
  
}
.content h1 {
  margin-bottom: 20px;
  font-size: 35px;
}
.content p {
  margin-bottom: 20px;
  font-size: 20px;
  line-height: 25px;
}

footer {
  clear: both;
  text-align: center;
  background-color:#1fb811;
  padding: 20px;
  color: #eee;
  border-radius: 5px;
  font-family: "Raleway SemiBold", sans-serif;
  margin-top: 5px ;
}

```


### Tampilan Home :
<img src="home.JPG" style="border: 2px solid #333; border-radius: 5px; box-shadow: 2px 2px 4px #00000040">

<br><br>

### Tampilan About :
<img src="about.JPG" style="border: 2px solid #333; border-radius: 5px; box-shadow: 2px 2px 4px #00000040">

<br><br>

### Tampilan Contact :
<img src="contact.JPG" style="border: 2px solid #333; border-radius: 5px; box-shadow: 2px 2px 4px #00000040">

<br><br>

# Mengimplementasi Konsep Modularisasi Pada Kode Program Tugas Lab3Web

## **Membuat file header.php**


### Code :
```
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
```
## **Membuat file footer.php**


### Code :
```
<footer>
  <p>&copy; 2023, Teknik Informatika, <a href="https://wa.me/6285591529798" style="text-decoration: none;">ARJUN SYAH</a>, Universitas Pelita Bangsa</p>
</footer>
</div>
</body>

</html>
```
## ** Membuat file home.php**

### Code :
```
<?php require('header.php'); ?>

<div class="content">
  <h1>DATA BARANG</h1>
  <div class="main">
    <table>
      <tr>
        <th>Gambar</th>
        <th>Nama Barang</th>
        <th>Katagori</th>
        <th>Harga Jual</th>
        <th>Harga Beli</th>
        <th>Stok</th>
        <th>Aksi</th>
      </tr>
      <?php if ($result) : ?>
        <?php while ($row = mysqli_fetch_array($result)) : ?>
          <tr>
            <td><img src="<?= $row['gambar']; ?>" alt="<?= $row['nama']; ?>"></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['kategori']; ?></td>
            <td><?= $row['harga_jual']; ?></td>
            <td><?= $row['harga_beli']; ?></td>
            <td><?= $row['stok']; ?></td>
            <td>
              <a href="ubah.php?id=<?= $row['id_barang']; ?>"><input type='button' class='btn-ubah'></a>
              <a href="hapus.php?id=<?= $row['id_barang']; ?>"><input type='button' class='btn-delete'></a>
            </td>
          </tr>
        <?php endwhile;
      else : ?>
        <tr>
          <td colspan="7">Belum ada data</td>
        </tr>
      <?php endif; ?>
    </table>
    <button class="btn-tmbh"><a href="tambah.php?id">Tambah Barang</a></button>
  </div>
</div>

<?php require('footer.php'); ?>
```
## **Membuat file about.php**
### Code
```
<?php require('header.php'); ?>
<div class="content">
  <h2>Ini Halaman Tentang Saya</h2>
  <p>Ini adalah bagian content dari halaman. Implementasi konsep modularisasi pada kode program praktikum 3 tentang database, sehingga setiap halamannya memiliki template tampilan yang sama.</p>
</div>
<?php require('footer.php'); ?>
```
## **Membuat file contact.php**
### Code :
```
<?php require('header.php'); ?>
<div class="content">
  <h2>Ini Halaman Kontak Saya</h2>
  <p>Ini adalah bagian content dari halaman. Implementasi konsep modularisasi pada kode program praktikum 3 tentang database, sehingga setiap halamannya memiliki template tampilan yang sama.</p>
</div>
<?php require('footer.php'); ?>
```
## **Membuat file main.php**
### Code
```
<?php
$mod = $_REQUEST['mod'];
switch ($mod) {
  case "home":
    require("home.php");
    break;
  case "tambah":
    require("tambah.php");
    break;
  default;
    require("home.php");
}
```
## **Membuat file tambah.php**
### Code :
```
<?php
error_reporting(E_ALL);
include_once 'koneksi.php';

if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $kategori = $_POST['kategori'];
  $harga_jual = $_POST['harga_jual'];
  $harga_beli = $_POST['harga_beli'];
  $stok = $_POST['stok'];
  $file_gambar = $_FILES['file_gambar'];
  $gambar = null;

  if ($file_gambar['error'] == 0) {
    $filename = str_replace(' ', '_', $file_gambar['name']);
    $destination = dirname(__FILE__) . '/gambar/' . $filename;
    if (move_uploaded_file($file_gambar['tmp_name'], $destination)) {
      $gambar = 'gambar/' . $filename;;
    }
  }

  $sql = 'INSERT INTO data_barang (nama, kategori, harga_jual, harga_beli, stok, gambar) ';
  $sql .= "VALUE ('{$nama}', '{$kategori}','{$harga_jual}','{$harga_beli}', '{$stok}', '{$gambar}')";
  $result = mysqli_query($conn, $sql);
  header('location: home.php');
}
?>

<?php require('header.php'); ?>

<div class="tentang">

  <center>
    <h1>Tambah Barang</h1>
  </center>
  <div class="main">
    <form method="post" action="tambah.php" enctype="multipart/form-data">
      <div class="input">
        <label>Nama Barang</label>
        <input type="text" name="nama" style="width: 100%; padding: 5px;" />
      </div>
      <div class="input">
        <label>Kategori</label>
        <select name="kategori" style="width: 102.5%; padding: 5px;">
          <option value="Komputer">Komputer</option>
          <option value="Elektronik">Elektronik</option>
          <option value="Hand Phone">Hand Phone</option>
        </select>
      </div>
      <div class="input">
        <label>Harga Jual</label>
        <input type="text" name="harga_jual" style="width: 100%; padding: 5px;" />
      </div>
      <div class="input">
        <label>Harga Beli</label>
        <input type="text" name="harga_beli" style="width: 100%; padding: 5px;" />
      </div>
      <div class="input">
        <label>Stok</label>
        <input type="text" name="stok" style="width: 100%; padding: 5px;" />
      </div>
      <div class="input">
        <label>File Gambar</label>
        <input type="file" name="file_gambar" style="width: 100%; padding: 5px;" />
      </div>
      <div class="submit">
        <center><input type="submit" name="submit" value="Simpan" /></center>
      </div>
    </form>
  </div>
</div>

<?php require('footer.php'); ?>
```
## **Membuat file ubah.php**
### Code :
```
<?php
error_reporting(E_ALL);
include_once 'koneksi.php';

if (isset($_POST['submit'])) {
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $kategori = $_POST['kategori'];
  $harga_jual = $_POST['harga_jual'];
  $harga_beli = $_POST['harga_beli'];
  $stok = $_POST['stok'];
  $file_gambar = $_FILES['file_gambar'];
  $gambar = null;

  if ($file_gambar['error'] == 0) {
    $filename = str_replace(' ', '_', $file_gambar['name']);
    $destination = dirname(__FILE__) . '/gambar/' . $filename;
    if (move_uploaded_file($file_gambar['tmp_name'], $destination)) {
      $gambar = 'gambar/' . $filename;;
    }
  }

  $sql = 'UPDATE data_barang SET ';
  $sql .= "nama = '{$nama}', kategori = '{$kategori}', ";
  $sql .= "harga_jual = '{$harga_jual}', harga_beli = '{$harga_beli}', stok = '{$stok}' ";
  if (!empty($gambar))
    $sql .= ", gambar = '{$gambar}' ";
  $sql .= "WHERE id_barang = '{$id}'";
  $result = mysqli_query($conn, $sql);

  header('location: home.php');
}

$id = $_GET['id'];
$sql = "SELECT * FROM data_barang WHERE id_barang = '{$id}'";
$result = mysqli_query($conn, $sql);
if (!$result) die('Error: Data tidak tersedia');
$data = mysqli_fetch_array($result);

function is_select($var, $val)
{
  if ($var == $val) return 'selected="selected"';
  return false;
}
?>

<?php require('header.php'); ?>

<div class="tentang">
  <center>
    <h1>Ubah Barang</h1>
  </center>
  <div class="main">
    <form method="post" action="ubah.php" enctype="multipart/form-data">
      <div class="input">
        <label>Nama Barang</label>
        <input type="text" name="nama" value="<?php echo $data['nama']; ?>" style="width: 100%; padding: 5px;" />
      </div>
      <div class="input">
        <label>Kategori</label>
        <select name="kategori" style="width: 102.5%; padding: 5px;">
          <option <?php echo is_select('Komputer', $data['kategori']); ?> value="Komputer">Komputer</option>
          <option <?php echo is_select('Komputer', $data['kategori']); ?> value="Elektronik">Elektronik</option>
          <option <?php echo is_select('Komputer', $data['kategori']); ?> value="Hand Phone">Hand Phone</option>
        </select>
      </div>
      <div class="input">
        <label>Harga Jual</label>
        <input type="text" name="harga_jual" value="<?php echo $data['harga_jual']; ?>" style="width: 100%; padding: 5px;" />
      </div>
      <div class="input">
        <label>Harga Beli</label>
        <input type="text" name="harga_beli" value="<?php echo $data['harga_beli']; ?>" style="width: 100%; padding: 5px;" />
      </div>
      <div class="input">
        <label>Stok</label>
        <input type="text" name="stok" value="<?php echo $data['stok']; ?>" style="width: 100%; padding: 5px;" />
      </div>
      <div class=" input">
        <label>File Gambar</label>
        <input type="file" name="file_gambar" style="width: 100%; padding: 5px;" />
      </div>
      <div class="submit">
        <input type="hidden" name="id" value="<?php echo $data['id_barang']; ?>" />
        <center><input type="submit" name="submit" value="Simpan" /></center>
      </div>
    </form>
  </div>
</div>

<?php require('footer.php'); ?>
```
## **Membuat file koneksi.php(agar terkoneksi ke database)**
### Code :
```
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "latihan1";
$conn = mysqli_connect($host, $user, $pass, $db);
if ($conn == false) {
    echo "Koneksi ke server gagal.";
    die();
} #else echo "Koneksi berhasil";
?>
```
### Tampilan data barang :
<img src="databarang.JPG" style="border: 2px solid #333; border-radius: 5px; box-shadow: 2px 2px 4px #00000040">

<br><br>

### Tampilan tambah :
<img src="tambah.JPG" style="border: 2px solid #333; border-radius: 5px; box-shadow: 2px 2px 4px #00000040">

<br><br>

### Tampilan ubah :
<img src="ubah.JPG" style="border: 2px solid #333; border-radius: 5px; box-shadow: 2px 2px 4px #00000040">

<br><br>

# Sekian dan Terima Kasih
