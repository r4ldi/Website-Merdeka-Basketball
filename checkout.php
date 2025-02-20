<?php
session_start();
require_once 'tcpdf/tcpdf.php';

date_default_timezone_set('Asia/Jakarta');
$tanggal = date('d.m.y - H:i');

if (!isset($_SESSION['username'])) {
    die("Anda harus login terlebih dahulu.");
}

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    die("Keranjang belanja kosong.");
}

if (!isset($_SESSION['payment_method'])) {
    die("Metode pembayaran tidak dipilih.");
}

$nama_pembeli = $_SESSION['fullname']; 
$alamat_toko = "Jl. Merdeka No. 17, Jakarta";
$no_telp_toko = "0812-3456-7890";
$total_harga = 0;
foreach ($_SESSION['cart'] as $item) {
    $total_harga += $item['quantity'] * $item['price'];
}
$ppn = round($total_harga * 0.1);
$total_bayar = $total_harga + $ppn;
$tunai = 300000; // Simulasi pembayaran tunai
$kembalian = $tunai - $total_bayar;

$pdf = new TCPDF('P', 'mm', array(58, 200), true, 'UTF-8', false);
$pdf->SetMargins(5, 5, 5);
$pdf->SetAutoPageBreak(TRUE, 10);
$pdf->AddPage('P', 'A6');
$pdf->SetFont('courier', '', 10);

$html = "<pre>
----------------------------------
        MERDEKA BASKETBALL
Alamat: $alamat_toko
Telp: $no_telp_toko
----------------------------------
Tanggal: $tanggal
Pembeli: $nama_pembeli
Metode: {$_SESSION['payment_method']}
----------------------------------
Produk      Jml   Harga
----------------------------------";

foreach ($_SESSION['cart'] as $item) {
    $nama_produk = str_pad(substr($item['name'], 0, 10), 10);
    $jumlah = str_pad($item['quantity'], 3, ' ', STR_PAD_BOTH);
    $harga = "Rp " . number_format($item['price'] * $item['quantity'], 0, ',', '.');
    $html .= "\n$nama_produk  $jumlah  $harga";
}

$html .= "
----------------------------------
Subtotal: Rp " . number_format($total_harga, 0, ',', '.') . "
PPN (10%): Rp " . number_format($ppn, 0, ',', '.') . "
Total Bayar: Rp " . number_format($total_bayar, 0, ',', '.') . "
Tunai: Rp " . number_format($tunai, 0, ',', '.') . "
Kembali: Rp " . number_format($kembalian, 0, ',', '.') . "
----------------------------------
TERIMA KASIH ATAS KUNJUNGAN ANDA
</pre>";

unset($_SESSION['cart']);
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('struk_pembelian.pdf', 'I');
?>
