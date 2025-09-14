<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<nav class="bg-white shadow-md border-b border-stone-200">
  <div class="max-w-6xl mx-auto px-6">
    <div class="flex justify-between items-center h-16">

      <!-- Logo -->
      <div class="flex items-center">
        <span class="text-xl font-serif font-bold text-stone-800">Perpustakaan</span>
      </div>

      <!-- Menu -->
      <div class="flex items-center space-x-6">
        <a href="/index.php" class="text-stone-700 hover:text-stone-900">Home</a>

        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'user'): ?>
          <a href="history.php" class="text-stone-700 hover:text-stone-900">History</a>
        <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
          <a href="history.php" class="text-stone-700 hover:text-stone-900">History</a>
          <a href="managemen.php" class="text-stone-700 hover:text-stone-900">Manajemen</a>
        <?php endif; ?>

        <?php if (isset($_SESSION['username'])): ?>
        <a href="/pages/logout.php" class="bg-stone-700 text-white px-4 py-2 rounded hover:bg-stone-800 transition">
            Logout
        </a>
        <?php else: ?>
        <a href="/pages/login.php" class="bg-stone-700 text-white px-4 py-2 rounded hover:bg-stone-800 transition">
            Login
        </a>
        <?php endif; ?>

      </div>
    </div>
  </div>
</nav>
