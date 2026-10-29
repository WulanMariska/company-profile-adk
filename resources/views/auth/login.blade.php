<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - PT. Ari Dharma Kanti</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            font-family: Arial, Helvetica, sans-serif;
            color: #202020;
            background: #f5f5f5;
        }

        .login-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            width: 100%;
            max-width: 920px;
            min-height: 540px;
            overflow: hidden;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.10);
        }

        .login-brand {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 48px 40px;
            color: #fff;
            background: #b91c1c;
        }

        .brand-mark {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 54px;
            height: 54px;
            margin-bottom: 28px;
            border: 2px solid rgba(255, 255, 255, 0.8);
            border-radius: 12px;
            font-size: 20px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .login-brand h1 {
            margin-bottom: 18px;
            font-size: 32px;
            line-height: 1.25;
        }

        .login-brand p {
            color: rgba(255, 255, 255, 0.88);
            font-size: 15px;
            line-height: 1.8;
        }

        .brand-footer {
            margin-top: 40px;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.75);
        }

        .login-form-section {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 48px 42px;
        }

        .login-form-section h2 {
            margin-bottom: 10px;
            font-size: 28px;
            color: #171717;
        }

        .login-subtitle {
            margin-bottom: 32px;
            color: #737373;
            font-size: 14px;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 9px;
            font-size: 13px;
            font-weight: 700;
        }

        .form-group input {
            width: 100%;
            min-height: 46px;
            padding: 12px 14px;
            border: 1px solid #d6d6d6;
            border-radius: 8px;
            outline: none;
            font-size: 14px;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-group input:focus {
            border-color: #b91c1c;
            box-shadow: 0 0 0 3px rgba(185, 28, 28, 0.10);
        }

        .error-message {
            margin-bottom: 20px;
            padding: 12px 14px;
            border: 1px solid #fecaca;
            border-radius: 8px;
            color: #991b1b;
            background: #fef2f2;
            font-size: 13px;
            line-height: 1.5;
        }

        .login-button {
            width: 100%;
            min-height: 48px;
            margin-top: 6px;
            border: none;
            border-radius: 8px;
            color: #fff;
            background: #b91c1c;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.2s;
        }

        .login-button:hover {
            background: #991b1b;
        }

        .back-link {
            display: inline-block;
            margin-top: 24px;
            color: #666;
            text-align: center;
            text-decoration: none;
            font-size: 13px;
        }

        .back-link:hover {
            color: #b91c1c;
        }

        @media (max-width: 700px) {
            body {
                padding: 16px;
                align-items: flex-start;
            }

            .login-container {
                grid-template-columns: 1fr;
                max-width: 440px;
                margin: auto;
            }

            .login-brand {
                padding: 28px;
            }

            .brand-mark {
                margin-bottom: 18px;
            }

            .login-brand h1 {
                font-size: 25px;
            }

            .brand-footer {
                margin-top: 24px;
            }

            .login-form-section {
                padding: 32px 26px;
            }

            .login-form-section h2 {
                font-size: 25px;
            }
        }
    </style>
</head>

<body>

    <main class="login-container">

        <section class="login-brand">
            <div>
                <div class="brand-mark">ADK</div>

                <h1>
                    PT. Ari Dharma Kanti
                </h1>

                <p>
                    Sistem pengelolaan konten website perusahaan.
                    Silakan masuk untuk mengelola informasi,
                    produk, layanan, dan konten website.
                </p>
            </div>

            <div class="brand-footer">
                &copy; {{ date('Y') }} PT. Ari Dharma Kanti
            </div>
        </section>

        <section class="login-form-section">
            <h2>Selamat Datang</h2>

            <p class="login-subtitle">
                Masuk ke panel administrator untuk melanjutkan.
            </p>

            @if ($errors->any())
                <div class="error-message" role="alert">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login.submit') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Alamat Email</label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="admin@perusahaan.com"
                        autocomplete="username"
                        required
                        autofocus
                    >
                </div>

                <div class="form-group">
                    <label for="password">Password</label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan password"
                        autocomplete="current-password"
                        required
                    >
                </div>

                <button type="submit" class="login-button">
                    Masuk ke Dashboard
                </button>
            </form>

            <a href="{{ url('/') }}" class="back-link">
                &larr; Kembali ke website
            </a>
        </section>

    </main>

</body>
</html>
