<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="container d-flex align-items-center justify-content-center login-wrapper">
        <div class="w-100" style="max-width: 430px;">
            <div class="text-center mb-4">
                <div class="brand-icon">📅</div>
                <h1 class="fw-bold mb-2">Community Events Board</h1>
                <p class="page-subtext mb-0">Sign in to manage and publish community events</p>
            </div>

            <div class="card login-card">
                <div class="card-body p-4 p-md-5">
                    <h2 class="fw-bold mb-2">Sign In</h2>
                    <p class="page-subtext mb-4">Enter your credentials to continue</p>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <form method="POST" action="{{ url('/login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email address</label>
                            <input
                                type="email"
                                class="form-control"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="you@community.org"
                                required
                            >
                        </div>

                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <label for="password" class="form-label fw-semibold mb-0">Password</label>
                                <a href="#" class="forgot-link small">Forgot password?</a>
                            </div>

                            <input
                                type="password"
                                class="form-control"
                                id="password"
                                name="password"
                                placeholder="Enter your password"
                                required
                            >
                        </div>

                        <button type="submit" class="btn btn-signin text-white w-100">
                            Sign In
                        </button>
                    </form>
                </div>
            </div>

            <p class="text-center page-subtext mt-4 mb-0">
                Don't have an account?
                <a href="#" class="contact-link fw-semibold">Contact your admin</a>
                <!-- There is no admin :) -->
            </p>
        </div>
    </div>
</body>
</html>