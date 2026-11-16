@php $judulHalaman = "Profil Diri - Portofolio"; @endphp
@include('components.header')

<section class="page-section">
    <div class="section-header">
        <h2>Profil Diri</h2>
        <p>Informasi identitas, latar belakang akademik, dan personality.</p>
    </div>

    <div class="dark-card">
        <table class="minimal-table">
            @foreach ($biodata as $label => $nilai)
                <tr>
                    <th>{{ $label }}</th>
                    <td>{{ $nilai }}</td>
                </tr>
            @endforeach
        </table>

        <div class="skills-wrapper">
            <h3>personality</h3>
            <div class="skill-tags">
                @foreach ($keahlian as $skill)
                    <span class="tag">{{ $skill }}</span>
                @endforeach
            </div>
        </div>
    </div>
</section>

@include('components.footer')