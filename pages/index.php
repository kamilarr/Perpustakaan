<?php
include __DIR__ . '/../includes/auth.php';

// Koneksi ke database db_buku
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, "db_buku");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil 5 buku
$sql = "SELECT * FROM books LIMIT 5";
$result = $conn->query($sql);

// Link gambar unsplash
$bookImage = "https://images.unsplash.com/photo-1512820790803-83ca734da794?q=80&w=600&auto=format&fit=crop";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard | Perpustakaan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-stone-50 to-stone-200 text-stone-800">

  <!-- Hero Header -->
  <header class="relative h-[300px] md:h-[400px] w-full">
    <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?q=80&w=1920&auto=format&fit=crop"
         alt="Perpustakaan"
         class="absolute inset-0 w-full h-full object-cover brightness-75">
    <div class="absolute inset-0 flex items-center justify-center">
      <h1 class="text-4xl md:text-5xl font-serif font-bold text-white drop-shadow-lg tracking-wide">
        PERPUSTAKAAN
      </h1>
    </div>
  </header>

  <!-- Konten -->
  <main class="max-w-7xl mx-auto p-6">
    <h2 class="text-xl font-semibold mb-6 text-stone-700">Katalog Buku</h2>

    <!-- Grid Card Buku -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php if ($result && $result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
          <div class="bg-white shadow-md rounded-xl border border-stone-200 overflow-hidden hover:shadow-xl transition">
            <img src="<?= $bookImage ?>" 
                 alt="<?= htmlspecialchars($row['judul']) ?>" 
                 class="h-40 w-full object-cover">
            <div class="p-4">
              <h3 class="font-semibold text-lg text-stone-800"><?= htmlspecialchars($row['judul']) ?></h3>
              <p class="text-sm text-stone-600">Penulis: <?= htmlspecialchars($row['penulis']) ?></p>
              <p class="text-sm text-stone-500 mt-1">Kategori: <?= htmlspecialchars($row['kategori']) ?></p>
              <p class="text-sm text-stone-500 mt-1">Stok: <?= htmlspecialchars($row['stok']) ?></p>
              <button class="mt-3 w-full bg-stone-700 text-white py-2 rounded-lg hover:bg-stone-800 transition">
                Pinjam
              </button>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p class="text-stone-500">Tidak ada buku tersedia.</p>
      <?php endif; ?>
    </div>
  </main>

</body>
</html>
<?php $conn->close(); ?>
