<?php
require_once "helper/terbilang.php";
$teks = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $angka = $_POST['angka'] ?? [];

    $clean = [];
    $total = null;

    foreach ($angka as $val) {
        if ($val === '' || !is_numeric($val)) continue;

        $num = (float)$val;
        $clean[] = $num;

        if ($total === null) {
            $total = $num; // angka pertama jadi awal
        } else {
            $total %= $num; // baru dihitung modulus berikutnya
        }
    }

    if (count($clean) > 0) {
        $teks = implode(" % ", $clean) . " = " . $total . " ( " . terbilang($total) . " )";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kalkulator Dinamis</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <div class="card">
        <h1>Modulus ( % )</h1>
        <form method="post">
            <div id="container">
                <div class="row">
                    <input type="number" step="any" name="angka[]" required placeholder="Masukkan angka">
                </div>
                <div class="row">
                    <input type="number" step="any" name="angka[]" required placeholder="Masukkan angka">
                </div>
            </div>
            <button type="button" class="add" onclick="tambahInput()">+ Tambah Input</button>
            <button type="submit" class="submit">Hitung</button>
        </form>
        <?php if ($teks !== null): ?>
            <div class="result">
                <?= htmlspecialchars($teks) ?>
            </div>
        <?php endif; ?>
        <br>
        <a href="index.php">← Kembali</a>
    </div>
    <script src="assets/script.js"></script>
</body>

</html>
