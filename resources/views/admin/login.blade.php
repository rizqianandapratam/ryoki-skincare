<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Ryoki Skincare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            max-width: 400px;
            width: 100%;
            border-radius: 1rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .brand-text {
            color: #644339;
            font-weight: bold;
        }
        .btn-ryoki {
            background-color: #D0D9CD;
            color: #2c3e50;
            font-weight: 600;
        }
        .btn-ryoki:hover {
            background-color: #b8c4b4;
            color: #2c3e50;
        }
    </style>
</head>
<body>
    <div class="card login-card border-0 p-4">
        <div class="card-body">
            <div class="text-center mb-4">
                <h3 class="brand-text">Ryoki Skincare</h3>
                <p class="text-muted">Admin Panel Login</p>
            </div>
            
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul class="mb-0 list-unstyled text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
                </div>
                
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                
                <div class="d-grid">
                    <button type="submit" class="btn btn-ryoki btn-lg">Masuk Dashboard</button>
                </div>
            </form>
            
            <div class="text-center mt-4">
                <a href="{{ url('/') }}" class="text-decoration-none text-muted small">&larr; Kembali ke Website</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
