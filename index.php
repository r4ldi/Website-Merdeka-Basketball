<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: main.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang - Merdeka Basketball</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-rose-600 p-4">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <span class="text-white text-2xl font-bold font-serif">Merdeka Basketball</span>
            <ul class="flex space-x-6 text-white">
                <li><a href="login.php" class="hover:text-gray-300">Login</a></li>
                <li><a href="register.php" class="hover:text-gray-300">Register</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-cover bg-center h-96" style="background-image: url('images/hero-image.jpg');">
        <div class="flex items-center justify-center h-full bg-black bg-opacity-50">
            <h1 class="text-5xl text-white font-extrabold text-center">Selamat Datang di Merdeka Basketball</h1>
        </div>
    </section>

    <!-- Konten Utama -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-3xl font-semibold">Bergabunglah dengan Kami</h2>
            <p class="mt-4 text-gray-600">Merdeka Basketball adalah tempat terbaik untuk mengembangkan bakat basket Anda. Daftar sekarang dan jadilah bagian dari komunitas kami.</p>
            <div class="mt-8">
                <a href="register.php" class="bg-rose-600 text-white px-6 py-3 rounded-lg font-bold hover:bg-rose-500">Daftar Sekarang</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="max-w-7xl mx-auto text-center">
            <p>&copy; 2025 Merdeka Basketball - Semua Hak Dilindungi.</p>
        </div>
    </footer>

</body>
</html>