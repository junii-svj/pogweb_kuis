@php $judulHalaman = "Profil Diri - Portofolio"; @endphp
@include('components.header')
<script src="{{ asset('js/profile-spiderman-overlay.js') }}" defer></script>

<section class="hero-section" aria-labelledby="hero-title">
    @include('components.hero-wallpaper')
    <div class="hero-shade"></div>
    <div class="hero-content">
        <section class="page-section">
            <div class="section-heading">
                <div>
                    <h1>About Me.</h1>
                    <h2>Hi, I'm <br> I Komang Juni Aristiyo</h2>
                </div>
                <a class="text-link" href="{{ url('/galeri') }}">Lihat dokumentasi <span aria-hidden="true">↗</span></a>
            </div>

            <section class="profile-layout" aria-label="Informasi profil">
                <div class="profile-intro" data-profile-photo>
                    {{-- Potret profil: gunakan foto vertikal 4:5 atau 3:4 di public/img/. --}}
                    <img src="{{ asset('img/profil.png') }}" alt="Potret I Komang Juni Aristiyo">
                    <img class="profile-spiderman-overlay" src="{{ asset('img/spiderman-overlay.png') }}" alt="" aria-hidden="true" draggable="false" data-spiderman-overlay>
                </div>

                <div class="profile-details">
                    <p class="section-eyebrow">Identitas & latar belakang</p>
                    <table class="minimal-table">
                        <tbody>
                            @foreach ($biodata as $label => $nilai)
                                <tr>
                                    <th scope="row">{{ $label }}</th>
                                    <td>
                                        @if ($label === 'Email')
                                            <a href="mailto:{{ $nilai }}">{{ $nilai }}</a>
                                        @else
                                            {{ $nilai }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="skills-wrapper">
                        <h3>Keahlian & karakter</h3>
                        <div class="skill-tags">
                            @foreach ($keahlian as $skill)
                                <span class="tag">{{ $skill }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>

            <section class="profile-highlights" aria-labelledby="profile-highlights-title">
                <div>
                    <p class="section-eyebrow">Fokus saat ini</p>
                    <h3 id="profile-highlights-title">learning new things.</h3>
                </div>
                <a href="{{ url('/galeri') }}" class="text-link">Lihat dokumentasi <span aria-hidden="true">↗</span></a>
            </section>
        </section>

        @include('components.footer')