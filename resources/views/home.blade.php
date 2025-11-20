<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SumbawaArt - Portal Karya Seniman Budaya Sumbawa">
    <title>SumbawaArt - Portal Karya Seniman Budaya Sumbawa</title>
    
    <!-- Icon Library - Remixicon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" href="/asset/css/home.css">
    <link rel="stylesheet" href="/asset/css/section-seni.css">
    <link rel="stylesheet" href="/asset/css/about.css">
    <link rel="stylesheet" href="/asset/css/gallery.css">
    <link rel="stylesheet" href="/asset/css/footer.css">
</head>
<body>
    <header class="hero" style="background-image: url('{{ asset('bg_home.png') }}');">
        <!-- Navbar -->
        <nav id="navbar">
            <div class="navbar-container">
                <a href="{{ route('home') }}" class="logo">SumbawaArt</a>
                <ul class="nav-links">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#gallery">Gallery</a></li>
                    <li><a href="{{ route('login') }}" class="btn-login-nav">Login</a></li>
                </ul>
            </div>
        </nav>

        <!-- Hero Content -->
        <main class="hero-content">
            <h1>Portal Karya</h1>
            <p>Seniman Budaya Sumbawa</p>
            <a href="#gallery" class="btn-read-more">Read more</a>
        </main>
    </header>

    <!-- Section Seni -->
    @include('components.section-seni')

    <!-- Section About -->
    <section id="about">
        @include('components.about-section')
    </section>

    <!-- Section Gallery -->
    <section id="gallery">
        @include('components.gallery-section')
    </section>

    @include('components.footer')


    <script src="/asset/js/home.js"></script>
    <script src="/asset/js/about.js"></script>
</body>
</html>
