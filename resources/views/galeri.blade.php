@php $judulHalaman = "Galeri Foto - Portofolio"; @endphp
@include('components.header')

<section class="hero-section" aria-labelledby="hero-title">
    @include('components.hero-wallpaper')
    <div class="hero-shade"></div>
    <div class="hero-content">
        <section class="page-section">
            <div class="section-heading">
                <div>
                    <h1 id="hero-title">My Gallery.</h1>
                    <h2>A story told<br>in pictures.</h2>
                </div>
            </div>
        </section>
    </div>
</section>

<section class="page-section" aria-labelledby="gallery-section-title">
    <div class="section-heading gallery-intro">
        <div>
            <h2 id="gallery-section-title">Moments worth<br>keeping.</h2>
        </div>
        <p>Momen, inspirasi, dan bagian dari perjalanan yang ingin saya simpan.</p>
    </div>

    <div class="gallery-grid">
        @foreach ($galeriFoto as $index => $foto)
            <article class="gallery-card">
                <div class="gallery-img-box">
                    {{-- Ganti gambar kartu dengan foto lokal rasio 4:3 atau 16:10. --}}
                    <img src="{{ asset($foto['file']) }}" alt="{{ $foto['judul'] }}">
                    <span class="gallery-index">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                </div>
                <div class="gallery-info">
                    <div class="gallery-title-row">
                        <span class="section-eyebrow">Dokumentasi / {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <span class="gallery-arrow" aria-hidden="true">↗</span>
                    </div>
                    <h3>{{ $foto['judul'] }}</h3>
                    <p>{{ $foto['deskripsi'] }}</p>
                </div>
            </article>
        @endforeach
    </div>
</section>

@include('components.footer')