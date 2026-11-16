<?php

use Illuminate\Support\Facades\Route;

// Page 1: Homepage (Menggunakan Variabel)
Route::get('/', function () {
    $data = [
        'judulHalaman' => 'Homepage - Portofolio',
        'judulUtama' => 'Portofolio Pribadi',
        'subJudul' => 'I Komang Juni Aristiyo',
        'deskripsi' => 'Mahasiswa Informatika dengan konsentrasi AI yang ingin mengubah masa depan hidupnya.',
        'sorotan' => [
            'Pengembangan Web sesuai kepercayaan dan keyakinan costomers',
            'Kecerdasan Buatan & Algoritma',
            'Desain Antarmuka Minimalis'
        ]
    ];
    return view('home', $data);
});

// Page 2: Profil Diri (Menggunakan Looping @foreach)
Route::get('/profil', function () {
    $biodata = [
        "Nama Lengkap" => "I Komang Juni Aristiyo",
        "Tanggal Lahir" => "19 Juni 2007",
        "Email" => "arisj9137@gmail.com",
        "Asal Daerah" => "Bali, Indonesia",
        "Program Studi" => "Informatika - Artificial Intelligence",
        "Kampus" => "INSTIKI Denpasar",
        "Hobi" => "Gaming, Menggambar, Investasi (cacing-caing, naga-naga)"
    ];
    $keahlian = ["sabar", "baik", "tidak sombong", "ganteng (kata emak)"];
    
    return view('profil', compact('biodata', 'keahlian'));
});

// Page 3: Galeri Foto (Menggunakan Looping @foreach)
Route::get('/galeri', function () {
    $galeriFoto = [
        [
            "file" => "img/ig2.png",
            "judul" => "My Social Media",
            "deskripsi" => "Dont forget to follow my account, adios."
        ],
        [
            "file" => "img/instiki.webp",
            "judul" => "My Campus",
            "deskripsi" => "learn about IT more and more to be a billionaire."
        ],
        [
            "file" => "img/gemini.webp",
            "judul" => "partner study",
            "deskripsi" => "he's like a god."
        ]
    ];
    
    return view('galeri', compact('galeriFoto'));
});