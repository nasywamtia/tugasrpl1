<?php
require_once "helper/terbilang.php";
$teks = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $angka = $_POST['angka'] ?? [];

    $clean = [];
    $total = 0;

    foreach ($angka as $val) {
        if ($val === '' || !is_numeric($val)) continue;

        $num = (float)$val;
        $clean[] = $num;
        $total += $num;
    }

    if (count($clean) > 0) {
        $teks = implode(" + ", $clean) . " = " . $total . " ( " . terbilang($total) . " )";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kalkulator Dinamis</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="card">
        <h1>Penjumlahan ( + )</h1>
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

    <script>
        function tambahInput() {
            const container = document.getElementById('container');
            const row = document.createElement('div');
            row.className = 'row';
            const input = document.createElement('input');
            input.type = 'number';
            input.step = 'any';
            input.name = 'angka[]';
            input.placeholder = 'Masukkan angka';
            input.required = true;
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'remove';
            btn.innerText = 'Hapus';
            btn.onclick = function() {
                if (!confirm("Yakin mau hapus input ini?")) return;
                container.removeChild(row);
            };
            row.appendChild(input);
            row.appendChild(btn);
            container.appendChild(row);
        }
    </script>

</body>

</html>
