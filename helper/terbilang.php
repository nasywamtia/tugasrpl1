<?php
function terbilang($angka)
{

    if ($angka == 0) return "Nol";

    if ($angka < 0) {
        return "Minus " . terbilang(abs($angka));
    }

    $angka = abs((int)$angka);

    $huruf = [
        "",
        "Satu",
        "Dua",
        "Tiga",
        "Empat",
        "Lima",
        "Enam",
        "Tujuh",
        "Delapan",
        "Sembilan",
        "Sepuluh",
        "Sebelas"
    ];

    // helper biar gak nambah "Nol"


    if ($angka < 12)
        return $huruf[$angka];

    if ($angka < 20)
        return terbilang($angka - 10) . " Belas";

    if ($angka < 100) {
        $puluh = terbilang(intdiv($angka, 10)) . " Puluh";
        return gabung($puluh, $angka % 10);
    }

    if ($angka < 200)
        return gabung("Seratus", $angka - 100);

    if ($angka < 1000) {
        $ratus = terbilang(intdiv($angka, 100)) . " Ratus";
        return gabung($ratus, $angka % 100);
    }

    if ($angka < 2000)
        return gabung("Seribu", $angka - 1000);

    if ($angka < 1000000) {
        $ribu = terbilang(intdiv($angka, 1000)) . " Ribu";
        return gabung($ribu, $angka % 1000);
    }

    if ($angka < 1000000000) {
        $juta = terbilang(intdiv($angka, 1000000)) . " Juta";
        return gabung($juta, $angka % 1000000);
    }

    if ($angka < 1000000000000) {
        $miliar = terbilang(intdiv($angka, 1000000000)) . " Miliar";
        return gabung($miliar, $angka % 1000000000);
    }

    if ($angka < 1000000000000000) {
        $triliun = terbilang(intdiv($angka, 1000000000000)) . " Triliun";
        return gabung($triliun, $angka % 1000000000000);
    }

    return "Angka terlalu besar";
}
function gabung($depan, $belakang)
{
    return $belakang == 0 ? $depan : $depan . " " . terbilang($belakang);
}
