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

if (!isset($_SESSION['payment_method'])) {
    header("Location: payment.php");
    exit;
}

$payment_method = $_SESSION['payment_method'];

$payment_instructions = [
    "Transfer Bank" => "Silakan transfer ke rekening bank berikut:<br>Bank: BCA<br>Nomor Rekening: 1234567890<br>Atas Nama: Merdeka Basketball",
    "Kartu Kredit" => "Silakan gunakan kartu kredit Anda untuk melakukan pembayaran melalui link berikut: <a href='https://paymentgateway.com/creditcard'>https://paymentgateway.com/creditcard</a>",
    "E-Wallet" => "Silakan gunakan aplikasi E-Wallet Anda untuk melakukan pembayaran ke nomor berikut:<br>Nomor E-Wallet: 081234567890<br>Nama Akun: Merdeka Basketball"
];

$instructions = $payment_instructions[$payment_method];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instruksi Pembayaran - Merdeka Basketball</title>
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

    <!-- Instruksi Pembayaran -->
    <section class="text-center py-12">
        <h2 class="text-2xl font-bold mb-6">Instruksi Pembayaran</h2>
        <p class="max-w-md mx-auto"><?= $instructions ?></p>
        <form action="checkout.php" method="POST" class="mt-6">
            <button type="submit" class="bg-blue-500 text-white p-3 rounded-lg font-bold">Lihat Struk</button>
        </form>
        <form action="merchandise.php" method="GET" class="mt-2">
            <button type="submit" class="bg-green-500 text-white p-3 rounded-lg font-bold">Selesai</button>
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