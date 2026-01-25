<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Email Verification</title>
  <!-- Bootstrap CDN for quick styling -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #74ebd5 0%, #9face6 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .card {
      max-width: 500px;
      width: 100%;
      box-shadow: 0 8px 20px rgba(0,0,0,0.15);
      border-radius: 12px;
    }
    .btn-custom {
      background-color: #4a90e2;
      border: none;
      transition: 0.3s;
    }
    .btn-custom:hover {
      background-color: #357ab8;
    }
  </style>
</head>
<body>
  <div class="card p-4">
    <h3 class="text-center mb-3">Verify Your Email</h3>
    <div class="alert alert-info text-center">
      Please verify your email address. We’ve sent you a verification link.
    </div>

    <form method="POST" action="{{ route('verification.resend') }}" class="text-center">
        @csrf
        <button type="submit" class="btn btn-custom btn-lg text-white">
          Resend Verification Email
        </button>
    </form>
  </div>
</body>
</html>
