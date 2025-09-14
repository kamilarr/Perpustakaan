<?php
include __DIR__ . '/../includes/auth.php';

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, "db_peminjaman", 3307);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query histori peminjaman
if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    $sql = "SELECT peminjaman_id, user_id, buku_id, tanggal_pinjam, tanggal_kembali, status 
            FROM peminjaman ORDER BY tanggal_pinjam DESC";
} else {
    $userId = $_SESSION['user_id'] ?? 0;
    $sql = "SELECT peminjaman_id, user_id, buku_id, tanggal_pinjam, tanggal_kembali, status 
            FROM peminjaman 
            WHERE user_id = $userId 
            ORDER BY tanggal_pinjam DESC";
}

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>History Peminjaman</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-stone-100">

  <!-- Navbar -->
  <?php include 'navbar.php'; ?>

  <div class="max-w-6xl mx-auto px-6 py-10">
    <h1 class="text-3xl font-serif font-bold text-stone-700 mb-8 border-b-4 border-amber-700 inline-block pb-1">
      History Peminjaman
    </h1>

    <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-stone-200">
      <table class="min-w-full table-auto">
        <thead class="bg-stone-700 text-white">
          <tr>
            <th class="px-6 py-3 text-left font-semibold">ID</th>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
              <th class="px-6 py-3 text-left font-semibold">User ID</th>
            <?php endif; ?>
            <th class="px-6 py-3 text-left font-semibold">Buku ID</th>
            <th class="px-6 py-3 text-left font-semibold">Tanggal Pinjam</th>
            <th class="px-6 py-3 text-left font-semibold">Tanggal Kembali</th>
            <th class="px-6 py-3 text-left font-semibold">Status</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-stone-200">
          <?php if ($result && $result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
              <tr class="hover:bg-amber-50 transition">
                <td class="px-6 py-4"><?php echo $row['peminjaman_id']; ?></td>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                  <td class="px-6 py-4"><?php echo $row['user_id']; ?></td>
                <?php endif; ?>
                <td class="px-6 py-4"><?php echo $row['buku_id']; ?></td>
                <td class="px-6 py-4"><?php echo $row['tanggal_pinjam']; ?></td>
                <td class="px-6 py-4">
                  <?php echo $row['tanggal_kembali'] ? $row['tanggal_kembali'] : '<span class="text-stone-400 italic">-</span>'; ?>
                </td>
                <td class="px-6 py-4">
                  <?php if ($row['status'] === 'dipinjam'): ?>
                    <span class="px-3 py-1 rounded-full bg-amber-200 text-amber-900 font-medium">
                      Dipinjam
                    </span>
                  <?php else: ?>
                    <span class="px-3 py-1 rounded-full bg-emerald-200 text-emerald-900 font-medium">
                      Kembali
                    </span>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr>
              <td colspan="<?php echo (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') ? '6' : '5'; ?>" 
                  class="text-center py-6 text-stone-500 italic">
                Belum ada data peminjaman.
              </td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>
<?php $conn->close(); ?>
