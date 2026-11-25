@props(['title' => 'UTS Pemrograman Web'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>

    <!-- Bootstrap 5 CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap Icons via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Custom inline adjustments strictly matching the UTS screenshot -->
    <style>
        body {
            background-color: #fcfcfc;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: #212529;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", "Noto Sans", "Liberation Sans", Arial, sans-serif;
        }

        .navbar {
            background-color: #ffffff !important;
        }

        .navbar-brand {
            font-size: 1.25rem;
            letter-spacing: -0.2px;
        }

        .card {
            border-color: #e9ecef;
            box-shadow: 0 1px 3px rgba(0,0,0,0.03);
            border-radius: 12px;
        }

        .btn-add-circle {
            width: 80px;
            height: 80px;
            background-color: #5cb85c;
            color: #ffffff;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 44px;
            font-weight: 300;
            line-height: 1;
            text-decoration: none;
            transition: transform 0.2s ease, background-color 0.2s ease;
            box-shadow: 0 2px 6px rgba(92, 184, 92, 0.3);
        }

        .btn-add-circle:hover {
            background-color: #4cae4c;
            color: #ffffff;
            transform: scale(1.05);
        }

        .card-profile-img {
            width: 100%;
            height: 310px;
            object-fit: cover;
            object-position: top;
            border-top-left-radius: 11px;
            border-top-right-radius: 11px;
        }

        .btn-action-edit {
            border-color: #9ec5fe;
            color: #0d6efd;
            font-size: 0.875rem;
            padding: 0.25rem 0.75rem;
            border-radius: 6px;
            text-decoration: none;
        }

        .btn-action-edit:hover {
            background-color: #0d6efd;
            border-color: #0d6efd;
            color: #ffffff;
        }

        .btn-action-delete {
            border-color: #f1aeb5;
            color: #dc3545;
            font-size: 0.875rem;
            padding: 0.25rem 0.75rem;
            border-radius: 6px;
            background: transparent;
        }

        .btn-action-delete:hover {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #ffffff;
        }

        .footer-nav .nav-link {
            color: #6c757d;
            font-size: 0.95rem;
            padding-left: 0.85rem;
            padding-right: 0.85rem;
        }

        .footer-nav .nav-link:hover {
            color: #212529;
        }
    </style>
</head>
<body>
    {{-- Navbar Component --}}
    <x-navbar />

    {{-- Main Content Area --}}
    <main class="flex-grow-1 py-4">
        <div class="container">
            {{-- Alert Notifikasi Sukses dari Session --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Alert Notifikasi Status dari Session --}}
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Alert Notifikasi Error dari Session --}}
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show rounded-3 mb-4" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Slot Konten Halaman --}}
            {{ $slot }}
        </div>
    </main>

    {{-- Footer --}}
    <footer class="py-4 mt-auto">
        <div class="container text-center">
            <ul class="nav justify-content-center footer-nav mb-3">
                <li class="nav-item">
                    <a href="{{ Route::has('home') ? route('home') : url('/') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ Route::has('features') ? route('features') : '#' }}" class="nav-link">Features</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Pricing</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">FAQs</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">About</a>
                </li>
            </ul>

            <hr class="my-4 text-secondary opacity-25">

            <p class="text-secondary small mb-0">
                &copy; 2025 Dibuat Sejujurnya Oleh Team Ahlul N.R.P dan khaisan amru r Tanpa Mencotek dari Tim Lain
            </p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
