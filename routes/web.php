<?php

use Illuminate\Support\Facades\Route;

// Page 1: Homepage (Menggunakan Variabel)
Route::get('/', function () {
    $data = [
        'judulHalaman' => 'Homepage - Portofolio',
        'judulUtama' => 'Portofolio Pribadi',
        'subJudul' => 'I Komang Juni Aristiyo',
        'deskripsi' => 'Mahasiswa Informatika & AI Enthusiast. Membangun solusi digital modern dengan arsitektur yang bersih dan presisi.',
        'sorotan' => [
            'Pengembangan Web sesuai kepercayaan dan keyakinan costomers',
            'menggunakan Kecerdasan Buatan & Algoritma',
            'Desain Antarmuka Minimalis'
        ]
    ];
    return view('home', $data);
});

// Page 2: Profil Diri (Menggunakan Looping @foreach)
Route::get('/profil', function () {
    $biodata = [
        "Nama Lengkap" => "I Komang Juni Aristiyo",
        "Asal Daerah" => "Bali, Indonesia",
        "Program Studi" => "Informatika - Artificial Intelligence",
        "Institusi" => "INSTIKI Denpasar",
        "Hobi" => "Coding, Sketching, Investasi"
    ];
    $keahlian = ["PHP & Laravel", "Python", "HTML & CSS", "MySQL", "JavaScript"];
    
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
            "deskripsi" => "My place to learn about IT more and more."
        ],
        [
            "file" => "img/gemini.webp",
            "judul" => "partner study",
            "deskripsi" => "he's like a god."
        ]
    ];
    
    return view('galeri', compact('galeriFoto'));
});