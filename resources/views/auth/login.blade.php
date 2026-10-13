<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: Arial, sans-serif;
      background: #f4f6f9;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .form-container {
      background: white;
      padding: 35px;
      border-radius: 12px;
      width: 100%;
      max-width: 420px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    }

    h1 {
      text-align: center;
      margin-bottom: 10px;
      color: #222;
    }

    .subtitle {
      text-align: center;
      color: #777;
      margin-bottom: 30px;
      font-size: 14px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: 600;
      font-size: 14px;
    }

    input {
      width: 100%;
      padding: 12px;
      border: 1px solid #ddd;
      border-radius: 7px;
      font-size: 14px;
      outline: none;
    }

    input:focus {
      border-color: #4f46e5;
    }

    .error {
      color: #dc2626;
      font-size: 12px;
      margin-top: 6px;
    }

    .remember-me {
      display: flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 20px;
    }

    .remember-me input {
      width: auto;
    }

    .remember-me label {
      margin: 0;
      font-weight: 400;
    }

    button {
      width: 100%;
      padding: 13px;
      background: #4f46e5;
      color: white;
      border: none;
      border-radius: 7px;
      font-size: 15px;
      font-weight: 600;
      cursor: pointer;
    }

    button:hover {
      background: #4338ca;
    }

    .register-link {
      text-align: center;
      margin-top: 20px;
      font-size: 14px;
    }

    .register-link a {
      color: #4f46e5;
      text-decoration: none;
    }
  </style>
</head>

<body>

  <div class="form-container">
    <h1>Welcome Back</h1>
    <p class="subtitle">Login to your account</p>

    @if (session('success'))
      <p style="color: green; margin-bottom: 15px;">
        {{ session('success') }}
      </p>
    @endif

    <form action="/login" method="POST">
      @csrf

      <!-- Email -->
      <div class="form-group">
        <label for="email">Email Address</label>

        <input type="email" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>

        @error('email')
          <p class="error">{{ $message }}</p>
        @enderror
      </div>

      <!-- Password -->
      <div class="form-group">
        <label for="password">Password</label>

        <input type="password" id="password" name="password" placeholder="Enter your password" required>

        @error('password')
          <p class="error">{{ $message }}</p>
        @enderror
      </div>

      <!-- Remember Me -->
      <div class="remember-me">
        <input type="checkbox" id="remember" name="remember" value="1">
        <label for="remember">Remember me</label>
      </div>

      <button type="submit">Login</button>
    </form>

    <div class="register-link">
      Don't have an account?
      <a href="/signup">Create Account</a>
    </div>
  </div>

</body>

</html>