<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $password = $_POST['password'];
    $foto_lama = $_POST['foto_lama'];
    $foto_baru = $_FILES['foto']['name'];

    if (!empty($password)) {
        $password_hashed = md5($password);
        $sql_password = "UPDATE user SET password='$password_hashed' WHERE id='$id'";
        $conn->query($sql_password);
    }

    if (!empty($foto_baru)) {
        $target_dir = "img/";
        $target_file = $target_dir . basename($foto_baru);

        // Upload file baru
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {

            if (file_exists($target_dir . $foto_lama)) {
                unlink($target_dir . $foto_lama);
            }
            $sql_foto = "UPDATE user SET foto='$foto_baru' WHERE id='$id'";
            $conn->query($sql_foto);
        }
    }
}

// Menampilkan data user
$sql = "SELECT * FROM user WHERE id=3"; 
$hasil = $conn->query($sql);
$row = $hasil->fetch_assoc();
?>
<div class="container mt-5">
        <form method="post" action="" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">

            <div class="mb-3">
                <label for="password" class="form-label">Password Baru</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Tuliskan Password Baru" required>
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Ganti Foto Profil</label>
                <input type="file" class="form-control" id="foto" name="foto">
                <input type="hidden" name="foto_lama" value="<?= $row['foto'] ?>">
                <br>
                <img src="img/<?= $row['foto'] ?>" width="100" alt="Foto Profil">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>