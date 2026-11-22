<?php

use Illuminate\Support\Facades\Route;

// Page 1: Homepage (Menggunakan Variabel)
Route::get('/', function () {
    $data = [
        'judulHalaman' => 'Homepage - Portofolio',
        'judulUtama' => 'Welcome to My Portofolio',
        'deskripsi' => 'Mahasiswa Informatika dengan konsentrasi AI yang ingin mengubah masa depan',
    ];

    return view('home', $data);
});

// Page 2: Profil Diri (Menggunakan Looping @foreach)
Route::get('/profil', function () {
    $biodata = [
        'Nama Lengkap' => 'I Komang Juni Aristiyo',
        'Tanggal Lahir' => '19 Juni 2007',
        'Asal Daerah' => 'Bali, Indonesia',
        'Program Studi' => 'Informatika - Artificial Intelligence',
        'Kampus' => 'Institut Bisnis dan teknologi Indonesia (INSTIKI)',
        'Hobi' => 'Gaming, Menggambar, dengerin musik, nonton film',
    ];
    $keahlian = ['vibe coding', 'beradaptasi dengan cepat', 'komunikasi yang baik', 'mampu bekerja dalam tim', 'mampu bekerja secara mandiri'];
    $profilSorotan = [
        [
            'kategori' => 'FOKUS AKADEMIK',
            'judul' => 'Informatika & AI',
            'deskripsi' => 'Mendalami informatika dan kecerdasan buatan melalui proses belajar yang berkelanjutan.',
        ],
        [
            'kategori' => 'EKSPLORASI',
            'judul' => 'Pengembangan Web',
            'deskripsi' => 'Mengembangkan ide menjadi pengalaman digital melalui eksplorasi web.',
        ],
        [
            'kategori' => 'KOLABORASI',
            'judul' => 'Komunikasi & Tim',
            'deskripsi' => 'Senang berdiskusi, berkomunikasi, dan berkembang bersama dalam tim.',
        ],
        [
            'kategori' => 'KARAKTER',
            'judul' => 'Adaptif & Mandiri',
            'deskripsi' => 'Terbuka pada hal baru, cepat beradaptasi, dan mampu belajar secara mandiri.',
        ],
    ];

    return view('profil', compact('biodata', 'keahlian', 'profilSorotan'));
});

// Page 3: Galeri Foto (Menggunakan Looping @foreach)
Route::get('/galeri', function () {
    $galeriFoto = [
        [
            'file' => 'img/ig2.png',
            'judul' => 'My Social Media',
            'deskripsi' => 'Dont forget to follow my account, adios.',
        ],
        [
            'file' => 'img/instiki.webp',
            'judul' => 'My Campus',
            'deskripsi' => 'learn about IT more and more to be a billionaire.',
        ],
        [
            'file' => 'img/gemini.webp',
            'judul' => 'partner study',
            'deskripsi' => "he's like a god.",
        ],
        [
            'file' => 'img/piagam.jpeg',
            'judul' => 'Piagam Lomba',
            'deskripsi' => 'Kenangan penutup masa SMK.',
        ],
        [
            'file' => 'img/sket.jpeg',
            'judul' => 'Hobby',
            'deskripsi' => 'gambar realistis pertama di UKM GRADASI.',
        ],
        [
            'file' => 'img/teman.jpeg',
            'judul' => 'Teman Anomali',
            'deskripsi' => 'Punya temen yang memiliki kekuatan untuk menghancurkan indonesia.',
        ],

    ];

    return view('galeri', compact('galeriFoto'));
});
