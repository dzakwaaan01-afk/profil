<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Selamat Datang -  TelluCappa Crew</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 120px 0;
            text-align: center;
            margin-bottom: 50px;
        }
        
        .hero-title {
            font-size: 3.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }
        
        .hero-subtitle {
            font-size: 1.5rem;
            margin-bottom: 40px;
            opacity: 0.95;
        }
        
        .btn-anggota {
            padding: 15px 40px;
            font-size: 1.3rem;
            border-radius: 50px;
            background: white;
            color: #764ba2;
            font-weight: bold;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .btn-anggota:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
            color: #667eea;
        }
        
        /* Info Cards */
        .info-card {
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            height: 100%;
            background: white;
        }
        
        .info-card:hover {
            transform: translateY(-10px);
        }
        
        .info-icon {
            font-size: 3rem;
            color: #667eea;
            margin-bottom: 20px;
        }
        
        /* Statistik */
        .statistik {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 60px 0;
            margin: 50px 0;
        }
        
        .stat-item {
            text-align: center;
        }
        
        .stat-number {
            font-size: 3rem;
            font-weight: bold;
        }
        
        .stat-label {
            font-size: 1.2rem;
            opacity: 0.9;
        }
        
        /* Profil singkat */
        .profil-card {
            text-align: center;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        
        .profil-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
            border: 3px solid #667eea;
        }
        
        /* Footer */
        footer {
            background: #333;
            color: white;
            padding: 30px 0;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="landing.php">
                <i class="bi bi-people-fill"></i> TelluCappa Crew
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="landing.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Daftar Anggota</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang">Tentang</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" style="margin-top: 56px;">
        <div class="container">
            <h1 class="hero-title animate__animated animate__fadeInDown">
                Selamat Datang di TelluCappa Crew
            </h1>
            <p class="hero-subtitle animate__animated animate__fadeInUp">
                Yukk kenali lebih dekat anggota kelompok kami!!
            </p>
            
            <!-- TOMBOL UTAMA KE DAFTAR ANGGOTA -->
            <a href="index.php" class="btn btn-anggota animate__animated animate__fadeInUp animate__delay-1s">
                <i class="bi bi-people"></i> Lihat Anggota Kelompok
            </a>
        </div>
    </section>

    <!-- Info Cards -->
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="info-card text-center">
                    <div class="info-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <h3>8 Anggota</h3>
                    <p class="text-muted">Terdiri dari mahasiswa/i yang aktif dan berprestasi</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-card text-center">
                    <div class="info-icon">
                        <i class="bi bi-laptop"></i>
                    </div>
                    <h3>Beragam Pengalaman</h3>
                    <p class="text-muted">Akademik, Nonakademik, dan Organisasi</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-card text-center">
                    <div class="info-icon">
                        <i class="bi bi-star"></i>
                    </div>
                    <h3>Berkolaborasi</h3>
                    <p class="text-muted">Bekerja sama dalam berbagai proyek dan tugas</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistik (Ambil dari Database) -->
    <?php
    $sql_total = "SELECT COUNT(*) as total FROM anggota";
    $result_total = $conn->query($sql_total);
    $total_anggota = $result_total->fetch_assoc()['total'];
    ?>
    
    <section class="statistik">
        <div class="container">
            <div class="row">
                <div class="col-md-4 stat-item">
                    <div class="stat-number"><?php echo $total_anggota; ?></div>
                    <div class="stat-label">Total Anggota</div>
                </div>
                <div class="col-md-4 stat-item">
                    <div class="stat-number">7</div>
                    <div class="stat-label">Perempuan</div>
                </div>
                <div class="col-md-4 stat-item">
                    <div class="stat-number">1</div>
                    <div class="stat-label">Laki-laki</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Preview Anggota (3 Anggota Terbaru) -->
    <div class="container" id="tentang">
        <h2 class="text-center mb-5">Sekilas Tentang Anggota</h2>
        <div class="row">
            <?php
            $sql = "SELECT * FROM anggota ORDER BY id DESC LIMIT 3";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-md-4">
                        <div class="profil-card">
                            <?php if (!empty($row['foto']) && file_exists('uploads/' . $row['foto'])): ?>
                                <img src="uploads/<?php echo $row['foto']; ?>" class="profil-img" alt="<?php echo htmlspecialchars($row['nama']); ?>">
                            <?php else: ?>
                                <img src="https://via.placeholder.com/120" class="profil-img" alt="No Photo">
                            <?php endif; ?>
                            <h4><?php echo htmlspecialchars($row['nama']); ?></h4>
                            <p class="text-muted"><?php echo htmlspecialchars($row['nim']); ?></p>
                            <a href="detail.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-primary btn-sm">
                                Lihat Profil
                            </a>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo '<p class="text-center">Belum ada anggota. <a href="tambah.php">Tambah sekarang</a></p>';
            }
            ?>
        </div>
        
        <!-- Tombol Lihat Semua -->
        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-primary btn-lg">
                <i class="bi bi-people"></i> Lihat Semua Anggota (<?php echo $total_anggota; ?>)
            </a>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p class="mb-0">© 2026 TelluCappa Crew. All Rights Reserved.</p>
            <p class="mb-0">Biodata TelluCappa Crew</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>