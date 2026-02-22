<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Anggota Kelompok</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        .anggota-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .card {
            transition: transform 0.3s;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }
        .card-body {
            flex: 1 1 auto;
        }
        .card-footer {
            background-color: transparent;
            border-top: 1px solid rgba(0,0,0,0.125);
            padding: 1rem;
        }
        .btn-detail {
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="landing.php">
                <i class="bi bi-people-fill"></i> Kelompok Kami
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="landing.php">Beranda</a>
                <a class="nav-link active" href="index.php">Daftar Anggota</a>
                <a class="nav-link" href="tambah.php">Tambah</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1>📋 Daftar Anggota TelluCappa</h1>
                <?php
                $sql_count = "SELECT COUNT(*) as total FROM anggota";
                $result_count = $conn->query($sql_count);
                $row_count = $result_count->fetch_assoc();
                echo "<p class='text-muted'>Total: <strong>" . $row_count['total'] . "</strong> anggota</p>";
                ?>
            </div>
            <a href="tambah.php" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Tambah Anggota
            </a>
        </div>

        <!-- Daftar Anggota -->
        <div class="row">
            <?php
            $sql = "SELECT * FROM anggota ORDER BY id DESC";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card h-100">
                            <!-- Foto Anggota -->
                            <?php if (!empty($row['foto']) && file_exists('uploads/' . $row['foto'])): ?>
                                <img src="uploads/<?php echo $row['foto']; ?>" 
                                     class="card-img-top anggota-img" 
                                     alt="<?php echo htmlspecialchars($row['nama']); ?>">
                            <?php else: ?>
                                <img src="https://via.placeholder.com/300x200?text=No+Photo" 
                                     class="card-img-top anggota-img" 
                                     alt="No Photo">
                            <?php endif; ?>
                            
                            <!-- Body Card - TANPA TANGGAL DAFTAR -->
                            <div class="card-body">
                                <h5 class="card-title text-center mb-3">
                                    <?php echo htmlspecialchars($row['nama']); ?>
                                </h5>
                                
                                <table class="table table-sm table-borderless">
                                    <tr>
                                        <td width="30"><i class="bi bi-card-text"></i></td>
                                        <td><strong>NIM:</strong></td>
                                        <td><?php echo htmlspecialchars($row['nim']); ?></td>
                                    </tr>
                                    <tr>
                                        <td><i class="bi bi-envelope"></i></td>
                                        <td><strong>Email:</strong></td>
                                        <td><small><?php echo htmlspecialchars($row['email']); ?></small></td>
                                    </tr>
                                </table>
                                
                                <!-- Bio singkat (opsional) -->
                                <?php if (!empty($row['bio'])): ?>
                                    <p class="card-text mt-2">
                                        <small class="text-muted">
                                            <i class="bi bi-chat-quote"></i> 
                                            <?php echo substr(htmlspecialchars($row['bio']), 0, 50); ?>...
                                        </small>
                                    </p>
                                <?php endif; ?>
                                
                                <!-- TANGGAL DAFTAR TELAH DIHAPUS DARI SINI -->
                                
                            </div>
                            
                            <!-- Footer dengan tombol detail -->
                            <div class="card-footer bg-transparent">
                                <a href="detail.php?id=<?php echo $row['id']; ?>" 
                                   class="btn btn-primary w-100">
                                    <i class="bi bi-eye"></i> Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                ?>
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        <i class="bi bi-info-circle"></i> 
                        Belum ada data anggota. 
                        <a href="tambah.php" class="alert-link">Tambah sekarang</a>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center text-muted py-3 mt-4">
        <small>© 2026 - TelluCappa Crew</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php $conn->close(); ?>