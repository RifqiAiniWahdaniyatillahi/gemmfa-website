<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Login Admin - GEMMFA</title>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Marcellus&family=Manrope:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="admin-body">
        <div class="admin-auth">
            <div class="admin-card admin-auth__card">
                <div class="admin-auth__header">
                    <h1>Login Admin</h1>
                    <p>Masuk untuk mengelola konten GEMMFA.</p>
                </div>
                @if ($errors->any())
                    <div class="admin-alert error">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{ route('login.store') }}" class="admin-form">
                    @csrf
                    <label>
                        Email
                        <input type="email" name="email" value="{{ old('email') }}" required />
                    </label>
                    <label>
                        Password
                        <div class="admin-input-group">
                            <input type="password" name="password" required data-password-input />
                            <button type="button" class="admin-input-toggle" data-password-toggle aria-label="Tampilkan password">Tampilkan</button>
                        </div>
                    </label>
                    <label class="admin-check">
                        <input type="checkbox" name="remember" />
                        Ingat saya
                    </label>
                    <button type="submit" class="button">Masuk</button>
                </form>
                <div class="admin-auth__footer">
                    <a class="link" href="{{ route('home') }}">Kembali ke website</a>
                </div>
            </div>
        </div>
    </body>
</html>
