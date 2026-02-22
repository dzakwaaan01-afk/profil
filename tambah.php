<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $email = $_POST['email'];
    $bio = $_POST['bio'];
    
    // Proses upload foto
    $foto = '';
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $target_dir = "uploads/";
        
        // Validasi tipe file [citation:3]
        $file_type = $_FILES['foto']['type'];
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        
        if (!in_array($file_type, $allowed_types)) {
            die("Error: Hanya file JPG, PNG, atau GIF yang diperbolehkan!");
        }
        
        // Validasi ukuran file (max 2MB)
        if ($_FILES['foto']['size'] > 2 * 1024 * 1024) {
            die("Error: Ukuran file maksimal 2MB!");
        }
        
        // Buat nama file unik [citation:1][citation:3]
        $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        $foto = uniqid() . '.' . $ext;
        $target_file = $target_dir . $foto;
        
        // Pindahkan file
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
            // File berhasil diupload
        } else {
            die("Error: Gagal mengupload file!");
        }
    }
    
    // Simpan ke database [citation:3]
    $sql = "INSERT INTO anggota (nama, nim, email, bio, foto) 
            VALUES ('$nama', '$nim', '$email', '$bio', '$foto')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan!";
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Tambah Anggota Baru</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>NIM</label>
                <input type="text" name="nim" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Bio</label>
                <textarea name="bio" class="form-control" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label>Foto</label>
                <input type="file" name="foto" class="form-control" accept="image/*">
                <small class="text-muted">Format: JPG, PNG, GIF (Max 2MB)</small>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</body>
</html>