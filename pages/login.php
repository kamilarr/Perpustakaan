<?php include __DIR__ . '/../includes/auth.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login | Perpustakaan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-stone-50 to-stone-200">

  <div class="bg-white shadow-2xl rounded-2xl w-full max-w-md p-8 border border-stone-200">
    <!-- Logo / Judul -->
    <div class="text-center mb-8">
      <h1 class="text-3xl font-serif font-bold text-stone-800">Perpustakaan</h1>
      <p class="text-stone-500 mt-1">Login untuk melanjutkan</p>
    </div>

    <!-- Error message -->
    <?php if (!empty($error)) : ?>
      <div class="bg-red-50 text-red-700 border border-red-200 p-3 rounded mb-6 text-sm">
        <?= htmlspecialchars($error) ?>
      </div>
    <?php endif; ?>

    <!-- Form -->
    <form method="POST" class="space-y-5">
      <div>
        <label class="block text-sm font-medium text-stone-700 mb-1">Username</label>
        <input type="text" name="username" required
          class="w-full border border-stone-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-stone-400 focus:outline-none placeholder-stone-400"
          placeholder="Masukkan username">
      </div>

      <div>
        <label class="block text-sm font-medium text-stone-700 mb-1">Password</label>
        <input type="password" name="password" required
          class="w-full border border-stone-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-stone-400 focus:outline-none placeholder-stone-400"
          placeholder="Masukkan password">
      </div>

      <button type="submit"
        class="w-full bg-stone-700 text-white py-2.5 rounded-lg hover:bg-stone-800 transition-colors font-semibold">
        Login
      </button>
    </form>

    <!-- Footer -->
    <p class="mt-8 text-xs text-center text-stone-400">
      © <?= date("Y") ?> Perpustakaan Digital. All rights reserved.
    </p>
  </div>

</body>
</html>
