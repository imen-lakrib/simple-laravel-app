<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{  isset($title) ? $title .' - chirper' : 'chirper' }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=space-mono:400,700|syne:700,800" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>

<body>
    <nav>
        <a href="/" class="nav-logo">🐦 Chirp<span>er</span></a>
        <div class="nav-actions">
            <a href="/login" class="btn-ghost-raw">Sign In</a>
            <a href="/register" class="btn-primary-raw">Sign Up</a>
        </div>
    </nav>

    <main>
       {{ $slot }}
    </main>

   

    <footer>
        <p>© 2025 Chirper — Built with Laravel and ❤️ {{ $imen ?? '' }}</p>
    </footer>
</body>

</html>