<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        .site-header {
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;
            padding: 18px 30px;
            font-family: Arial, sans-serif;
        }

        .header-container {
            max-width: 1200px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;
        }

        .logo {
            font-size: 22px;
            font-weight: 700;
            color: #4f46e5;
            text-decoration: none;
        }

        .nav-links,
        .auth-links {
            display: flex;
            align-items: center;
            gap: 22px;
        }

        .nav-links a,
        .login-btn {
            color: #374151;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
        }

        .nav-links a:hover,
        .login-btn:hover {
            color: #4f46e5;
        }

        .user-name {
            font-size: 14px;
            font-weight: 600;
            color: #374151;
        }

        .register-btn,
        .logout-btn {
            background: #4f46e5;
            color: white;
            padding: 10px 18px;
            border-radius: 7px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            border: none;
            cursor: pointer;
        }

        .register-btn:hover,
        .logout-btn:hover {
            background: #4338ca;
        }

        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
            }

            .nav-links,
            .auth-links {
                flex-wrap: wrap;
                justify-content: center;
            }
        }
    </style>
</head>

<body>

    <header class="site-header">
        <div class="header-container">
            <a href="{{ url('/') }}" class="logo">My Website</a>

            <nav class="nav-links">
                <a href="/blog">Blog</a>
                <!-- <a href="{{ url('/about') }}">About</a>
                <a href="{{ url('/contact') }}">Contact</a> -->
            </nav>

            <div class="auth-links">
                @auth
                    <span class="user-name">
                        Hello, {{ auth()->user()->name }}
                    </span>

                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="logout-btn">Logout</button>
                    </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="login-btn">Login</a>
                    <a href="{{ route('register') }}" class="register-btn">Register</a>
                @endguest
            </div>
        </div>
    </header>



    <main>
        <h1>Welcome to My Website</h1>
        <p>Explore our blog and discover our latest posts.</p>

        <a href="/blog">Explore Blog</a>
    </main>

</body>

</html>