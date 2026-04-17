<?php
require_once 'helper.php';

$hasil=null;$input=[];$teks="";$error=null;

if($_POST){
$input=$_POST['angka'];
$hasil=(float)$input[0];

for($i=1;$i<count($input);$i++){
    if($input[$i]==0){
        $error="Tidak bisa bagi 0";
        break;
    }
    $hasil/=$input[$i];
}

if(!$error){
$teks=$hasil<0?"Minus ".terbilang(abs($hasil)):terbilang($hasil);
}
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
body{font-family:Arial;background:#f3f4f6;display:flex;justify-content:center;align-items:center;height:100vh}
.card{background:#fff;padding:25px;border-radius:12px;width:380px;box-shadow:0 6px 15px rgba(0,0,0,.1)}
h2{text-align:center;color:#a855f7}
.input-group{display:flex;gap:5px;margin-bottom:8px}
input{flex:1;padding:8px;border-radius:6px;border:1px solid #ccc}
input[type=number]::-webkit-inner-spin-button{opacity:1}
button{border:none;padding:10px;border-radius:6px;color:#fff}
.tambah{background:#3b82f6;width:100%}
.hitung{background:#a855f7;width:100%;margin-top:8px}
.hapus{background:#ef4444}
.hasil{margin-top:10px;padding:10px;background:#f5f3ff;border-radius:6px}
.error{margin-top:10px;padding:10px;background:#fee2e2;border-radius:6px;color:red}
</style>
</head>
<body>

<div class="card">
<h2>Pembagian (/)</h2>

<form method="post">
<div id="inputs">
<div class="input-group"><input name="angka[]" type="number" step="any" required></div>
<div class="input-group"><input name="angka[]" type="number" step="any" required></div>
</div>

<button type="button" class="tambah" onclick="add()">+ Tambah</button>
<button class="hitung">Hitung</button>
</form>

<?php if($error): ?>
<div class="error"><?= $error ?></div>
<?php elseif($hasil!==null): ?>
<div class="hasil"><?= implode(" / ",$input) ?> = <b><?= number_format($hasil,0,',','.') ?></b> (<?= $teks ?>)</div>
<?php endif; ?>

<a href="index.php">← Kembali</a>
</div>

<script>
function add(){
let g=document.createElement("div");g.className="input-group";
let i=document.createElement("input");
i.name="angka[]";i.type="number";i.step="any";i.required=true;
let b=document.createElement("button");
b.innerText="X";b.type="button";b.className="hapus";b.onclick=()=>g.remove();
g.appendChild(i);g.appendChild(b);
document.getElementById("inputs").appendChild(g);
}
</script>

</body>
</html>