<?php
include "db.php"; // Pastikan file koneksi database Anda ada dan benar

// Cek apakah ID artikel ada di URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $article_id = mysqli_real_escape_string($conn, $_GET['id']); // Amankan ID dari SQL Injection

    // Query untuk mengambil detail artikel dari tabel 'artikel'
    $sql = "SELECT * FROM artikel WHERE id = $article_id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo htmlspecialchars($row['title']); ?> - Artikel</title>
            <link rel="stylesheet" href="STYLE.css"> </head>
        <body>
            <nav class="navbar">
                <div class="nav-links">
                    <a href="index.html">Home</a>
                    <a href="gallery.html">Gallery</a>
                    <a href="blog.php" class="active">Blog</a>
                   <a href="contact.html">Contact</a>
                </div>
            </nav>

            <div class="container">
                <h1 class="article-title"><?php echo htmlspecialchars($row['title']); ?></h1>
                <p class="article-date"><?php echo date("F j, Y", strtotime($row['date'])); ?></p>
                <div class="article-content">
                    <?php echo nl2br(htmlspecialchars($row['content'])); ?>
                </div>
                <a href="blog.php" class="back-to-blog">Kembali ke Blog</a>
            </div>

            <footer>
                <p>&copy; 2025 KEZIA NGAMA</p>
            </footer>
        </body>
        </html>
        <?php
    } else {
        // Jika artikel tidak ditemukan
        echo "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Artikel Tidak Ditemukan</title><link rel='stylesheet' href='STYLE.css'></head><body><nav class='navbar'><div class='nav-links'><a href='index.html'>Home</a><a href='gallery.html'>Gallery</a><a href='blog.php' class='active'>Blog</a><a href='contact.html'>Contact</a></div></nav><div class='container'><h1>Artikel Tidak Ditemukan</h1><p>Maaf, artikel yang Anda cari tidak ada.</p><a href='blog.php'>Kembali ke Blog</a></div><footer><p>&copy; 2025 KEZIA NGAMA</p></footer></body></html>";
    }
} else {
    // Jika ID artikel tidak diberikan di URL
    echo "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>ID Artikel Tidak Ditemukan</title><link rel='stylesheet' href='STYLE.css'></head><body><nav class='navbar'><div class='nav-links'><a href='index.html'>Home</a><a href='gallery.html'>Gallery</a><a href='blog.php' class='active'>Blog</a><a href='contact.html'>Contact</a></div></nav><div class='container'><h1>ID Artikel Tidak Diberikan</h1><p>Silakan pilih artikel dari halaman blog.</p><a href='blog.php'>Kembali ke Blog</a></div><footer><p>&copy; 2025 KEZIA NGAMA</p></footer></body></html>";
}

mysqli_close($conn); // Tutup koneksi database
?>