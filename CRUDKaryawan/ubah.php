<?php
require 'function.php';

$nik = $_GET["nik"];
$karyawan = query("SELECT * FROM datakaryawan WHERE nik = '$nik'");
$ex = explode(',', $karyawan['keahlian']);

if (isset($_POST["submit"])) {
    if (ubah($_POST) > 0) {
        echo "<script>alert('Data berhasil diubah.');
        window.location='index.php';</script>";
    } else {
        die("Query gagal dijalankan: " . mysqli_errno($conn) .
            " - " . mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>UPDATE DATA MAHASISWA</title>
</head>

<body>
    <div class="container-lg">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">HOME</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" href="index.php">Data Mahasiswa <span class="sr-only"></span></a>
                    <a class="nav-link" href="tambah.php">Menambahkan Data</a>
                </div>
            </div>
        </nav>

        <h1 class="mt-4">UPDATE DATA MAHASISWA</h1>

        <form method="POST" enctype="multipart/form-data">
            <section class="base">
                <div class="form-group mt-5">
                    <input type="hidden" name="nik" value="<?= $karyawan["nik"]; ?>" />
                </div>
                <div class="form-group mt-5">
                    <label for="nama">Nama Mahasiswa</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="<?= $karyawan["nama"]; ?>" require />
                </div>
                <div class="form-group mt-2">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $karyawan["nik"]; ?>" require />
                </div>
                <div class="form-group mt-2">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" value="<?= $karyawan["email"]; ?>" require />
                </div>
                <div class="form-group mt-2">
                    <label for="tempatlahir">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempatlahir" id="tempatlahir" value="<?= $karyawan["tempatlahir"]; ?>" require />
                </div>
                <div class="form-group mt-2">
                    <label for="tgllahir">Tanggal Lahir</label>
                    <input type="text" class="form-control" name="tgllahir" id="tgllahir" value="<?= $karyawan["tgllahir"]; ?>" require />
                </div>
                <div class="form-group mt-3">
                    <label for="skill">Gender</label>
                    <select name="gender" id="gender" class="form-select mt-2 " aria-label="Default select example" value="<?php echo $karyawan['gender'] ?>">
                        <label for="gender">Gender</label>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="form-group mt-3">
                    <label for="keahlian">Keahlian</label>
                </div>
                <tr>
                    <td>
                        <input type="checkbox" name="keahlian[]" value="C+" <?= in_array('java', $ex) ? print 'checked' : '' ?>> C+<br />
                        <input type="checkbox" name="keahlian[]" value="CSS" <?= in_array('java', $ex) ? print 'checked' : '' ?>> CSS<br />
                        <input type="checkbox" name="keahlian[]" value="Python" <?= in_array('css', $ex) ? print 'checked' : '' ?>> Python<br />
                        <input type="checkbox" name="keahlian[]" value="Java" <?= in_array('kotlin', $ex) ? print 'checked' : '' ?>> Java<br />
                        <input type="checkbox" name="keahlian[]" value="Laravel" <?= in_array('java', $ex) ? print 'checked' : '' ?>> Laravel<br />
                    </td>
                </tr>
                <div class="text-center mt-4">
                    <button class="btn btn-dark" type="submit" name="submit">Simpan</button>
                </div>
            </section>
        </form>
    </div>
</body>

</html>