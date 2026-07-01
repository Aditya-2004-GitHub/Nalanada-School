<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login - Nalanda Higher Secondary School</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --dark-green: #2E7D32;
            --light-green: #8BC34A;
            --red: #E53935;
            --golden-yellow: #FFC107;
            --white: #ffffff;
        }

        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--dark-green) 0%, #1B5E20 50%, #2E7D32 100%);
            padding: 40px 15px;
        }

        .form-signin {
            width: 100%;
            max-width: 400px;
            padding: 30px 25px;
            margin: auto;
            color: #212121;
            background: var(--white);
            border: 4px solid var(--dark-green);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
            position: relative;
            overflow: hidden;
        }

        .form-signin::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--dark-green), var(--light-green), var(--golden-yellow), var(--red));
        }

        .form-signin h1 {
            color: var(--dark-green);
            font-weight: 700;
            margin-bottom: 5px;
        }

        .form-signin .subtitle {
            color: #666;
            font-size: 0.85rem;
            margin-bottom: 20px;
        }

        .form-floating label {
            color: #888;
        }

        .form-control:focus {
            border-color: var(--light-green);
            box-shadow: 0 0 0 0.2rem rgba(139, 195, 74, 0.25);
        }

        .btn-login {
            background: linear-gradient(135deg, var(--red), #C62828);
            border: none;
            color: var(--white);
            font-weight: 600;
            letter-spacing: 0.5px;
            padding: 12px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #C62828, #B71C1C);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(229, 57, 53, 0.4);
            color: var(--white);
        }

        .footer-text {
            color: #999;
            font-size: 0.75rem;
        }

        .register-link {
            color: var(--dark-green);
            font-weight: 600;
            text-decoration: none;
        }

        .register-link:hover {
            color: var(--red);
            text-decoration: underline;
        }

        .school-badge {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--golden-yellow), #FFB300);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            box-shadow: 0 4px 15px rgba(255, 193, 7, 0.4);
        }

        .school-badge i {
            font-size: 30px;
            color: var(--dark-green);
        }
    </style>
</head>
<body>
    <div class="form-signin">
        <form action="{{ route('logincheck') }}" method="POST">
            @csrf

            <div class="school-badge">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#2E7D32" viewBox="0 0 16 16">
                    <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5ZM8 8.46 1.758 5.965 8 3.052l6.242 2.913L8 8.46Z"/>
                    <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
                </svg>
            </div>

            <h1 class="h3 fw-bold text-center">Welcome Back</h1>
            <p class="subtitle text-center">Nalanda Higher Secondary School</p>

            {{-- Display success message --}}
            @if (session('success'))
                <div class="alert alert-success" style="font-size: 0.85rem; border-left: 4px solid var(--dark-green);">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Display validation errors --}}
            @if ($errors->any())
                <div class="alert alert-danger text-start" style="font-size: 0.85rem; border-left: 4px solid var(--red);">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="floatingEmail" placeholder="name@example.com" value="{{ old('email') }}">
                <label for="floatingEmail">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <button class="w-100 btn btn-lg btn-login" type="submit">Sign In</button>

            <p class="text-center mt-3 mb-1" style="font-size: 0.9rem;">
                Don't have an account? <a href="{{ route('register') }}" class="register-link">Sign Up</a>
            </p>
            <p class="mt-2 mb-0 footer-text text-center">&copy; {{ date('Y') }} Nalanda Higher Secondary School</p>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous">
    </script>
</body>
</html>
