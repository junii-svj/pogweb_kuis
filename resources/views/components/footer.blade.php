</main>
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-main">
                <a href="{{ url('/') }}" class="footer-brand">I KOMANG JUNI ARISTIYO</a>
                <p>Mahasiswa Informatika<br>Artificial Intelligence · INSTIKI Denpasar</p>
            </div>
            <div class="footer-column">
                <h2>Navigasi</h2>
                <a href="{{ url('/') }}">Homepage</a>
                <a href="{{ url('/profil') }}">Profil Diri</a>
                <a href="{{ url('/galeri') }}">Galeri Foto</a>
            </div>
            <div class="footer-column">
                <h2>Hubungi</h2>
                <a href="mailto:arisj9137@gmail.com">Email</a>
                <a href="https://github.com/junii-svj" target="_blank" rel="noopener noreferrer">GitHub</a>
                <a href="https://www.instagram.com/aristyyyo_/" target="_blank" rel="noopener noreferrer">Instagram</a>
            </div>
            <div class="footer-bottom">
                <span>&copy; {{ date('Y') }} I Komang Juni Aristiyo.</span>
                <span>Dibuat dengan Laravel.</span>
            </div>
        </div>
    </footer>
    <script src="{{ asset('js/hero-wallpaper.js') }}"></script>
</body>
</html>