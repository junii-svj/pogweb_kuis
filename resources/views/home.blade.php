@include('components.header')

<section class="hero-section">
    <!-- Kolom Kiri: Teks Utama dari Variabel -->
    <div class="hero-left">
        <h1 class="hero-title">{{ $judulUtama }}<br><span class="text-muted">{{ $subJudul }}</span></h1>
        <p class="hero-desc">{{ $deskripsi }}</p>
        <div class="hero-buttons">
            <a href="{{ url('/profil') }}" class="btn-white">Profil Lengkap</a>
            <a href="{{ url('/galeri') }}" class="btn-dark">Galeri Foto</a>
        </div>
    </div>

    <!-- Kolom Tengah: Segitiga Interaktif (Hover Tengah, Hover Sisi, & Tap-Tap Ubah Warna) -->
    <div class="hero-center">
        <div class="triangle-wrapper">
            <div class="triangle-stage" id="triangleStage" title="Klik / Tap segitiga untuk mengganti warna cahaya">
                <!-- Cahaya Backlight Pusat (Menyala saat kursor di tengah) -->
                <div class="glow glow-center" id="glowCenter"></div>

                <!-- Cahaya Backlight Per Sisi -->
                <div class="glow glow-left" id="glowLeft"></div>
                <div class="glow glow-right" id="glowRight"></div>
                <div class="glow glow-bottom" id="glowBottom"></div>

                <!-- Bentuk Segitiga Hitam Utama -->
                <svg class="main-triangle" id="mainTriangle" viewBox="0 0 300 260" width="300" height="260">
                    <defs>
                        <linearGradient id="triGrad" x1="0%" y1="0%" x2="0%" y2="100%">
                            <stop offset="0%" stop-color="#141414" />
                            <stop offset="100%" stop-color="#050505" />
                        </linearGradient>
                    </defs>
                    <!-- Badan Segitiga -->
                    <polygon points="150,10 290,250 10,250" fill="url(#triGrad)" stroke="#262626" stroke-width="1.5" />
                    
                    <!-- Garis Tepi Interaktif -->
                    <line id="edgeLeft" x1="150" y1="10" x2="10" y2="250" stroke="#ffffff" stroke-width="2" opacity="0" />
                    <line id="edgeRight" x1="150" y1="10" x2="290" y2="250" stroke="#ffffff" stroke-width="2" opacity="0" />
                    <line id="edgeBottom" x1="10" y1="250" x2="290" y2="250" stroke="#ffffff" stroke-width="2" opacity="0" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Kolom Kanan: Poin Sorotan -->
    <div class="hero-right">
        <ul class="feature-list">
            @foreach($sorotan as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
</section>

<!-- Script Interaktif Deteksi Tengah, Sisi, & Tap-Tap Warna -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const stage = document.getElementById('triangleStage');
        const glowCenter = document.getElementById('glowCenter');
        const glowLeft = document.getElementById('glowLeft');
        const glowRight = document.getElementById('glowRight');
        const glowBottom = document.getElementById('glowBottom');
        
        const edgeLeft = document.getElementById('edgeLeft');
        const edgeRight = document.getElementById('edgeRight');
        const edgeBottom = document.getElementById('edgeBottom');

        // Daftar palet warna backlight saat di-tap-tap
        const colorPalette = [
            { name: 'Putih', hex: '#ffffff', glow: 'rgba(255, 255, 255, 0.85)' },
            { name: 'Cyan Elektrik', hex: '#38bdf8', glow: 'rgba(56, 189, 248, 0.85)' },
            { name: 'Ungu Neon', hex: '#a855f7', glow: 'rgba(168, 85, 247, 0.85)' },
            { name: 'Hijau Emerald', hex: '#10b981', glow: 'rgba(16, 185, 129, 0.85)' },
            { name: 'Oranye Hangat', hex: '#f97316', glow: 'rgba(249, 115, 22, 0.85)' },
            { name: 'Merah Muda', hex: '#f43f5e', glow: 'rgba(244, 63, 94, 0.85)' }
        ];

        let currentColorIndex = 0;

        // Fungsi menerapkan warna aktif ke seluruh elemen cahaya & garis
        function applyActiveColor() {
            const current = colorPalette[currentColorIndex];
            [glowCenter, glowLeft, glowRight, glowBottom].forEach(el => {
                el.style.background = current.glow;
            });
            [edgeLeft, edgeRight, edgeBottom].forEach(line => {
                line.setAttribute('stroke', current.hex);
            });
        }

        // Inisialisasi warna awal (Putih)
        applyActiveColor();

        function resetLights() {
            glowCenter.style.opacity = '0';
            glowLeft.style.opacity = '0';
            glowRight.style.opacity = '0';
            glowBottom.style.opacity = '0';
            edgeLeft.style.opacity = '0';
            edgeRight.style.opacity = '0';
            edgeBottom.style.opacity = '0';
        }

        // Menghitung jarak titik kursor ke segmen garis (sisi segitiga)
        function distToSegment(px, py, x1, y1, x2, y2) {
            const l2 = (x2 - x1) ** 2 + (y2 - y1) ** 2;
            if (l2 === 0) return Math.hypot(px - x1, py - y1);
            let t = ((px - x1) * (x2 - x1) + (py - y1) * (y2 - y1)) / l2;
            t = Math.max(0, Math.min(1, t));
            return Math.hypot(px - (x1 + t * (x2 - x1)), py - (y1 + t * (y2 - y1)));
        }

        // Cek apakah kursor berada di dalam area segitiga
        function isPointInTriangle(px, py, x1, y1, x2, y2, x3, y3) {
            const areaOrig = Math.abs((x2 - x1) * (y3 - y1) - (x3 - x1) * (y2 - y1));
            const area1 = Math.abs((x1 - px) * (y2 - py) - (x2 - px) * (y1 - py));
            const area2 = Math.abs((x2 - px) * (y3 - py) - (x3 - px) * (y2 - py));
            const area3 = Math.abs((x3 - px) * (y1 - py) - (x1 - px) * (y3 - py));
            return Math.abs(area1 + area2 + area3 - areaOrig) < 1;
        }

        // Fungsi untuk memperbarui nyala lampu sesuai posisi kursor
        function updateLighting(clientX, clientY) {
            const rect = stage.getBoundingClientRect();
            const x = ((clientX - rect.left) / rect.width) * 300;
            const y = ((clientY - rect.top) / rect.height) * 260;

            // Koordinat sudut segitiga: Atas(150,10), KiriBawah(10,250), KananBawah(290,250)
            const dLeft = distToSegment(x, y, 150, 10, 10, 250);
            const dRight = distToSegment(x, y, 150, 10, 290, 250);
            const dBottom = distToSegment(x, y, 10, 250, 290, 250);

            const inside = isPointInTriangle(x, y, 150, 10, 10, 250, 290, 250);
            const minDist = Math.min(dLeft, dRight, dBottom);

            resetLights();

            // 1. Jika kursor di bagian TENGAH dalam segitiga (jarak ke tepi > 35px)
            if (inside && minDist > 35) {
                glowCenter.style.opacity = '1';
                glowLeft.style.opacity = '0.85';
                glowRight.style.opacity = '0.85';
                glowBottom.style.opacity = '0.85';
                edgeLeft.style.opacity = '0.9';
                edgeRight.style.opacity = '0.9';
                edgeBottom.style.opacity = '0.9';
            } 
            // 2. Jika kursor menyentuh / mendekati salah satu SISI segitiga
            else if (minDist <= 45) {
                if (minDist === dLeft) {
                    glowLeft.style.opacity = '1';
                    edgeLeft.style.opacity = '0.95';
                } else if (minDist === dRight) {
                    glowRight.style.opacity = '1';
                    edgeRight.style.opacity = '0.95';
                } else if (minDist === dBottom) {
                    glowBottom.style.opacity = '1';
                    edgeBottom.style.opacity = '0.95';
                }
            }
        }

        stage.addEventListener('mousemove', (e) => {
            updateLighting(e.clientX, e.clientY);
        });

        stage.addEventListener('mouseleave', resetLights);

        // Event klik / tap-tap untuk mengubah & mengunci warna backlight seterusnya
        stage.addEventListener('click', (e) => {
            currentColorIndex = (currentColorIndex + 1) % colorPalette.length;
            applyActiveColor();
            
            // Efek denyut (pulse) singkat saat di-tap agar terasa responsif
            stage.style.transform = 'scale(0.96)';
            setTimeout(() => {
                stage.style.transform = 'scale(1)';
            }, 120);

            // Langsung perbarui tampilan cahaya dengan warna baru di posisi kursor saat ini
            updateLighting(e.clientX, e.clientY);
        });
    });
</script>

@include('components.footer')