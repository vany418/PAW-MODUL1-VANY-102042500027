<?php
// ============================================
// DATA PRODUK ELEKTRONIK - CIA STORE
// ============================================

$produk = [
    // ---------- LAPTOP ----------
    [
        "nama"     => "MacBook Pro 14 M3",
        "kategori" => "Laptop",
        "harga"    => 27999000,
        "stok"     => 4,
        "gambar"   => "images/laptop-macbook.jpg"
    ],
    [
        "nama"     => "ASUS ROG Zephyrus G14",
        "kategori" => "Laptop Gaming",
        "harga"    => 21500000,
        "stok"     => 6,
        "gambar"   => "images/laptop-asus.jpg"
    ],

    // ---------- KOMPUTER ----------
    [
        "nama"     => "PC Gaming RTX 4070",
        "kategori" => "Komputer",
        "harga"    => 18500000,
        "stok"     => 3,
        "gambar"   => "images/pc-gaming.jpg"
    ],

    // ---------- MONITOR ----------
    [
        "nama"     => "Monitor LG UltraWide 34\"",
        "kategori" => "Monitor",
        "harga"    => 6500000,
        "stok"     => 7,
        "gambar"   => "images/monitor-lg.jpg"
    ],

    // ---------- SMARTPHONE ----------
    [
        "nama"     => "iPhone 15 Pro Max",
        "kategori" => "Smartphone",
        "harga"    => 21999000,
        "stok"     => 5,
        "gambar"   => "images/iphone15.jpg"
    ],
    [
        "nama"     => "Samsung Galaxy S24 Ultra",
        "kategori" => "Smartphone",
        "harga"    => 19999000,
        "stok"     => 0,
        "gambar"   => "images/samsung-s24.jpg"
    ],

    // ---------- TABLET ----------
    [
        "nama"     => "iPad Air 5th Gen",
        "kategori" => "Tablet",
        "harga"    => 9499000,
        "stok"     => 9,
        "gambar"   => "images/tablet-ipad.jpg"
    ],

    // ---------- AUDIO ----------
    [
        "nama"     => "Sony WH-1000XM5",
        "kategori" => "Headphone",
        "harga"    => 4999000,
        "stok"     => 0,
        "gambar"   => "images/headphone-sony.jpg"
    ],

    // ---------- WEARABLE ----------
    [
        "nama"     => "Apple Watch Series 9",
        "kategori" => "Smartwatch",
        "harga"    => 6499000,
        "stok"     => 8,
        "gambar"   => "images/smartwatch.jpg"
    ],

    // ---------- AKSESORIS (Harga di atas 1 juta -> dapat diskon) ----------
    [
        "nama"     => "Logitech MX Master 3S",
        "kategori" => "Aksesoris",
        "harga"    => 1499000,
        "stok"     => 15,
        "gambar"   => "images/mouse-logitech.jpg"
    ],

    // ---------- PENYIMPANAN (Harga di bawah 1 juta -> TIDAK dapat diskon) ----------
    [
        "nama"     => "SanDisk Flashdrive 128GB",
        "kategori" => "Penyimpanan",
        "harga"    => 250000,
        "stok"     => 20,
        "gambar"   => "images/flashdisk.jpg"
    ],
];

// ============================================
// FUNGSI BANTUAN
// ============================================

// Format Rupiah
function formatRupiah($angka) {
    return "Rp" . number_format($angka, 0, ',', '.');
}

// Hitung nominal diskon (10% jika harga >= Rp1.000.000)
function hitungDiskon($harga) {
    if ($harga >= 1000000) {
        return $harga * 0.10;
    }
    return 0;
}

// Ambil persentase diskon (0 atau 10)
function persenDiskon($harga) {
    return $harga >= 1000000 ? 10 : 0;
}

// Total seluruh produk
$totalProduk = count($produk);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store - Katalog Elektronik</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- ============ NAVBAR ============ -->
    <header class="navbar">
        <div class="navbar-container">
            <a href="#" class="logo">Cia<span>Store</span></a>
            <nav class="nav-links">
                <a href="#hero">Home</a>
                <a href="#katalog">Produk</a>
                <a href="#footer">About</a>
            </nav>
        </div>
    </header>

    <!-- ============ HERO ============ -->
    <section class="hero" id="hero">
        <div class="hero-content">
            <span class="hero-tag">CIA STORE</span>
            <h1>Simple Tech Store.</h1>
            <p>Temukan berbagai perangkat dan aksesoris teknologi untuk kebutuhanmu.</p>
            <a href="#katalog" class="btn-primary">Lihat Produk</a>
        </div>
    </section>

    <!-- ============ KATALOG ============ -->
    <main class="container" id="katalog">

        <div class="katalog-header">
            <div>
                <span class="section-tag">OUR PRODUCTS</span>
                <h2>Katalog Produk</h2>
            </div>
            <div class="total-produk">
                Total Produk: <strong><?= $totalProduk ?></strong>
            </div>
        </div>

        <div class="product-grid">
            <?php foreach ($produk as $index => $item) : ?>
                <?php
                    $hargaNormal  = $item["harga"];
                    $diskon       = hitungDiskon($hargaNormal);
                    $hargaSetelah = $hargaNormal - $diskon;
                    $persen       = persenDiskon($hargaNormal);
                    $adaDiskon    = $diskon > 0;
                    $tersedia     = $item["stok"] > 0;
                ?>
                <article class="product-card" id="produk-<?= $index + 1 ?>">

                    <!-- GAMBAR PRODUK -->
                    <div class="product-image">
                        <img src="<?= $item['gambar'] ?>" alt="<?= $item['nama'] ?>">
                        <?php if ($adaDiskon) : ?>
                            <span class="badge-diskon">DISKON <?= $persen ?>%</span>
                        <?php endif; ?>
                    </div>

                    <!-- INFO PRODUK -->
                    <div class="product-body">
                        <span class="product-kategori">
                            <?= strtoupper($item['kategori']) ?>
                            <?php if ($adaDiskon) : ?>
                                <span class="tag-diskon-inline">DISKON <?= $persen ?>%</span>
                            <?php endif; ?>
                        </span>
                        <h3 class="product-nama"><?= $item['nama'] ?></h3>

                        <!-- HARGA -->
                        <div class="product-harga">
                            <?php if ($adaDiskon) : ?>
                                <span class="harga-normal"><?= formatRupiah($hargaNormal) ?></span>
                                <span class="harga-diskon">
                                    <?= formatRupiah($hargaSetelah) ?>
                                    <span class="label-hemat">Hemat <?= formatRupiah($diskon) ?></span>
                                </span>
                            <?php else : ?>
                                <span class="harga-diskon"><?= formatRupiah($hargaNormal) ?></span>
                            <?php endif; ?>
                        </div>

                        <!-- STOK & STATUS -->
                        <div class="product-footer">
                            <span class="stok">Stok: <?= $item['stok'] ?></span>
                            <?php if ($tersedia) : ?>
                                <span class="status tersedia">Tersedia</span>
                            <?php else : ?>
                                <span class="status habis">Stok Habis</span>
                            <?php endif; ?>
                        </div>

                        <!-- TOMBOL BELI -->
                        <?php if ($tersedia) : ?>
                            <button class="btn-beli">Beli Sekarang</button>
                        <?php else : ?>
                            <button class="btn-beli disabled" disabled>Stok Habis</button>
                        <?php endif; ?>
                    </div>

                </article>
            <?php endforeach; ?>
        </div>

    </main>

    <!-- ============ FOOTER ============ -->
    <footer class="footer" id="footer">
        <div class="footer-container">
            <p>&copy; <?= date('Y') ?> Cia Store. All rights reserved.</p>
            <p>Dibuat dengan HTML, CSS & PHP Native</p>
        </div>
    </footer>

</body>
</html>
