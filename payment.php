<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: merchandise.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $payment_method = $_POST['payment_method'];
    $_SESSION['payment_method'] = $payment_method;
    header("Location: payment_info.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Metode Pembayaran - Merdeka Basketball</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-rose-600 p-4">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <a href="main.php" class="flex items-center space-x-2">
                <span class="text-white text-2xl font-bold font-serif">Merdeka Basketball</span>
            </a>
            <ul class="flex space-x-6 text-white">
                <li><a href="main.php" class="hover:text-gray-300">Home</a></li>
                <li><a href="coach.php" class="hover:text-gray-300">Coach</a></li>
                <li><a href="anggota.php" class="hover:text-gray-300">Anggota</a></li>
                <li><a href="event.php" class="hover:text-gray-300">Event</a></li>
                <li><a href="pendaftaran.php" class="hover:text-gray-300">Pendaftaran</a></li>
                <li><a href="dokumentasi.php" class="hover:text-gray-300">Dokumentasi</a></li>
                <li><a href="merchandise.php" class="hover:text-gray-300">Merchandise</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <!-- Pilih Metode Pembayaran -->
    <section class="text-center py-12">
        <h2 class="text-2xl font-bold mb-6">Pilih Metode Pembayaran</h2>
        <form action="payment.php" method="POST" class="max-w-md mx-auto">
            <div class="mb-4">
                <input type="radio" id="bank_transfer" name="payment_method" value="Transfer Bank" required>
                <label for="bank_transfer">Transfer Bank</label>
            </div>
            <div class="mb-4">
                <input type="radio" id="credit_card" name="payment_method" value="Kartu Kredit" required>
                <label for="credit_card">Kartu Kredit</label>
            </div>
            <div class="mb-4">
                <input type="radio" id="ewallet" name="payment_method" value="E-Wallet" required>
                <label for="ewallet">E-Wallet</label>
            </div>
            <button type="submit" class="bg-blue-500 text-white p-3 rounded-lg font-bold">Lanjutkan</button>
        </form>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="max-w-7xl mx-auto text-center">
            <p>&copy; 2025 Merdeka Basketball - Semua Hak Dilindungi.</p>
        </div>
    </footer>
</body>
</html>