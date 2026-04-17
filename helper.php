<?php
function terbilang($angka) {

    if ($angka == 0) return "Nol";

    if ($angka < 0) {
        return "Minus " . terbilang(abs($angka));
    }

    $angka = abs((int)$angka);

    $huruf = ["", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas"];

    if ($angka < 12)
        return $huruf[$angka];

    if ($angka < 20)
        return terbilang($angka - 10) . " Belas";

    if ($angka < 100)
        return terbilang(intdiv($angka, 10)) . " Puluh " . terbilang($angka % 10);

    if ($angka < 200)
        return "Seratus " . terbilang($angka - 100);

    if ($angka < 1000)
        return terbilang(intdiv($angka, 100)) . " Ratus " . terbilang($angka % 100);

    if ($angka < 2000)
        return "Seribu " . terbilang($angka - 1000);

    if ($angka < 1000000)
        return terbilang(intdiv($angka, 1000)) . " Ribu " . terbilang($angka % 1000);

    if ($angka < 1000000000)
        return terbilang(intdiv($angka, 1000000)) . " Juta " . terbilang($angka % 1000000);

    if ($angka < 1000000000000)
        return terbilang(intdiv($angka, 1000000000)) . " Miliar " . terbilang($angka % 1000000000);

    if ($angka < 1000000000000000)
        return terbilang(intdiv($angka, 1000000000000)) . " Triliun " . terbilang($angka % 1000000000000);

    return "Angka terlalu besar";
}