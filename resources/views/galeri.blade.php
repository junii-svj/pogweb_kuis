@php $judulHalaman = "Galeri Foto - Portofolio"; @endphp
@include('components.header')

<section class="page-section">
    <div class="section-header">
        <h2>Galeri Dokumentasi</h2>
        <p>Kumpulan foto yang saya sendiri bingung mau isi foto apa.</p>
    </div>

    <div class="gallery-grid">
        @foreach ($galeriFoto as $foto)
            <div class="gallery-card">
                <div class="gallery-img-box">
                    <img src="{{ asset($foto['file']) }}" alt="{{ $foto['judul'] }}">
                </div>
                <div class="gallery-info">
                    <h3>{{ $foto['judul'] }}</h3>
                    <p>{{ $foto['deskripsi'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
</section>

@include('components.footer')