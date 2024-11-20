<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return ('Selamat Datang Di Home');
});
Route::get('/about', function () {
    return ('Selamat Datang Di about');
});
Route::get('/contact', function () {
    return ('Selamat Datang Di contact');
});

//route parameter
Route::get('/tes/{nama}/{tempatlahir}/{jeniskelamin}/{agama}/{alamat}', function ($nama,$tl,$jk,$agama,$alamat) {
    return "Nama :".$nama."<br>".
            "Tempat Lahir :".$tl."<br>".
            "Jenis Kelamin:".$jk."<br>".
            "agama :".$agama."<br>".
            "alamat :".$alamat;
});


Route::get('hitung/{bilangan1}/{bilangan2}', function($bilangan1,$bilangan2){
       return "Bilangan 1 :".$bilangan1."<br>".
               "Bilangan 2 :".$bilangan2."<br>".
               "Hasil :".$Hasil=$bilangan1 + $bilangan2;
});

Route::get('latihan/{nama}/{telepon}/{jenisbarang}/{namabarang}/{pembayaran}/{jumlah}', function($nama, $telepon, $jenis, $barang, $pembayaran, $jumlah) {

    // Menentukan harga berdasarkan jenis dan nama barang
    if ($jenis == "handphone") {
        if ($barang == "poco") {
            $harga = 3000000;
        } elseif ($barang == "samsung") {
            $harga = 5000000;
        } elseif ($barang == "iphone") {
            $harga = 15000000;
        } else {
            $harga = 0;
        }
    } elseif ($jenis == "laptop") {
        if ($barang == "lenovo") {
            $harga = 4000000;
        } elseif ($barang == "acer") {
            $harga = 8000000;
        } elseif ($barang == "macbook") {
            $harga = 20000000;
        } else {
            return "Laptop tidak tersedia.";
        }
    } elseif ($jenis == "tv") {
        if ($barang == "toshiba") {
            $harga = 5000000;
        } elseif ($barang == "samsung") {
            $harga = 8000000;
        } elseif ($barang == "LG") {
            $harga = 10000000;
        } else {
            return "TV tidak tersedia.";
        }
    } else {
        return "Jenis barang tidak valid.";
    }

    // Menghitung total harga
    $total = $harga * $jumlah;

    // Menentukan cashback
    if ($total > 10000000) {
        $cashback = 50000;
    } else {
        $cashback = 0;
    }

    // Menentukan potongan berdasarkan metode pembayaran
    if ($pembayaran == "transfer") {
        $potongan = 50000;
    } else {
        $potongan = 0;
    }

    // Total pembayaran akhir
    $total_bayar = $total - $cashback - $potongan;

    // Output hasil
    return "Nama: " . $nama . "<br>" .
           "Telepon: " . $telepon . "<br>" .
           "============================= <br>" .
           "Jenis Barang: " . $jenis . "<br>" .
           "Nama Barang: " . $barang . "<br>" .
           "Harga: " . $harga . "<br>" .
           "Jumlah: " . $jumlah . "<br>" .
           "============================= <br>" .
           "Total: " . $total . "<br>" .
           "Cashback: " . $cashback . "<br>" .
           "Pembayaran: " . $pembayaran . "<br>" .
           "Potongan: " . $potongan . "<br>" .
           "============================= <br>" .
           "Total Pembayaran: " . $total_bayar;
});
