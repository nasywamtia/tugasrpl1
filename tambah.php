<?php
require_once __DIR__ . '/helper.php';

$hasil = null; 
$teks = ""; 
$input = [];

if ($_POST) {
    $input = $_POST['angka'];
    $hasil = 0;

    foreach ($input as $a) {
        if (is_numeric($a)) {
            $hasil += $a;
        }
    }

    $teks = $hasil < 0 
        ? "Minus " . terbilang(abs($hasil)) 
        : terbilang($hasil);
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
body{
    font-family:Arial;
    background:#f3f4f6;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh
}
.card{
    background:#fff;
    padding:25px;
    border-radius:12px;
    width:380px;
    box-shadow:0 6px 15px rgba(0,0,0,.1)
}
h2{text-align:center;color:#22c55e}

.input-group{
    display:flex;
    gap:5px;
    margin-bottom:8px
}

input{
    flex:1;
    padding:8px;
    border-radius:6px;
    border:1px solid #ccc
}

/* BIAR SPINNER KELIATAN */
input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    opacity: 1;
}

button{
    border:none;
    padding:10px;
    border-radius:6px;
    color:#fff;
    cursor:pointer
}

.tambah{background:#3b82f6;width:100%}
.hitung{background:#22c55e;width:100%;margin-top:8px}
.hapus{background:#ef4444}

.hasil{
    margin-top:10px;
    padding:10px;
    background:#ecfdf5;
    border-radius:6px
}
</style>
</head>
<body>

<div class="card">
<h2>Penjumlahan (+)</h2>

<form method="post">
<div id="inputs">

<div class="input-group">
<input name="angka[]" type="number" step="any" required>
</div>

<div class="input-group">
<input name="angka[]" type="number" step="any" required>
</div>

</div>

<button type="button" class="tambah" onclick="add()">+ Tambah</button>
<button class="hitung">Hitung</button>
</form>

<?php if($hasil!==null): ?>
<div class="hasil">
<?= implode(" + ", $input) ?> = 
<b><?= number_format($hasil,0,',','.') ?></b> 
(<?= $teks ?>)
</div>
<?php endif; ?>

<a href="index.php">← Kembali</a>
</div>

<script>
function add(){
    let g=document.createElement("div");
    g.className="input-group";

    let i=document.createElement("input");
    i.name="angka[]";
    i.type="number";   // ⬅️ INI YANG BUAT ADA TOMBOL ⬆️⬇️
    i.step="any";
    i.required=true;

    let b=document.createElement("button");
    b.innerText="X";
    b.type="button";
    b.className="hapus";
    b.onclick=()=>g.remove();

    g.appendChild(i);
    g.appendChild(b);

    document.getElementById("inputs").appendChild(g);
}
</script>

</body>
</html>