<?php include "db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog - KEZIA</title>
    <link rel="stylesheet" href="STYLE.css">
</head>
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
        <h1></h1>
        <div class="blog-grid">
            <?php
            $sql = "SELECT * FROM artikel ORDER BY date DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0):
                while ($row = $result->fetch_assoc()):
            ?>
                    <div class="blog-card">
                        <div class="blog-image">
                            <img src="img/<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['title']) ?>">
                        </div>
                       <div class="blog-content">
                     <h3><?= htmlspecialchars($row['title']) ?></h3>
                            <p class="blog-date"><?= date('F j, Y', strtotime($row['date'])) ?></p>
                          <p class="blog-excerpt"><?= nl2br(htmlspecialchars($row['excerpt'])) ?></p>
                        <a href="artikel.php?id=<?php echo htmlspecialchars($row['id']); ?>">Baca selengkapnya</a>
                    </div>

                    </div>
            <?php
                endwhile;
            else:
                echo "<p>Tidak ada artikel yang tersedia.</p>";
            endif;
            ?>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2025 KEZIA NGAMA</p>
    </footer>
</body>
</html>
