<?php
include 'config.php';

$id = $_GET['id'] ?? 0;

$sql = "SELECT * FROM anggota WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo "<script>alert('Data tidak ditemukan!'); window.location.href='index.php';</script>";
    exit;
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail <?php echo htmlspecialchars($row['nama']); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body>
    <!-- Navbar sederhana -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="bi bi-people-fill"></i> Biodata Kelompok
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="index.php">Beranda</a>
                <a class="nav-link" href="tambah.php">Tambah Anggota</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <!-- Breadcrumb navigasi -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                <li class="breadcrumb-item active">Detail Anggota</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Detail Anggota</h3>
                    </div>
                    <div class="card-body">
                        <!-- Tombol Kembali -->
                        <div class="mb-3">
                            <a href="index.php" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali ke Daftar
                            </a>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <?php if (!empty($row['foto']) && file_exists('uploads/' . $row['foto'])): ?>
                                    <img src="uploads/<?php echo $row['foto']; ?>" 
                                         class="img-fluid rounded-circle mb-3" 
                                         style="width: 200px; height: 200px; object-fit: cover; border: 3px solid #007bff;" 
                                         alt="<?php echo htmlspecialchars($row['nama']); ?>">
                                <?php else: ?>
                                    <img src="https://via.placeholder.com/200?text=No+Photo" 
                                         class="img-fluid rounded-circle mb-3" alt="No Photo">
                                <?php endif; ?>
                            </div>
                            <div class="col-md-8">
                                <table class="table table-borderless">
                                    <tr>
                                        <th width="30%">Nama Lengkap</th>
                                        <td>: <strong><?php echo htmlspecialchars($row['nama']); ?></strong></td>
                                    </tr>
                                    <tr>
                                        <th>NIM</th>
                                        <td>: <?php echo htmlspecialchars($row['nim']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>: <?php echo htmlspecialchars($row['email']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Bio / Deskripsi</th>
                                        <td>: <?php echo nl2br(htmlspecialchars($row['bio'] ?? '-')); ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <!-- HANYA TOMBOL KEMBALI, TANPA EDIT & HAPUS -->
                        <div class="d-flex justify-content-center">
                            <a href="index.php" class="btn btn-primary">
                                <i class="bi bi-house"></i> Kembali ke Beranda
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php $conn->close(); ?>