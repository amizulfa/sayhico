@extends('layouts.layout')

@section('landingpage')
<div class="pt-5 pb-5 d-flex justify-content-center align-items-center" style="min-height: 150vh; background: #f9f9fc; margin-top:100px;">
    <div class="card shadow p-4" style="width: 420px; border-radius: 20px; border: none;">
        <div class="text-center mb-4">
            <div class="mb-3">
                <img src="{{ asset('images/logo.png') }}" alt="icon" style="width: 50px;">
            </div>
            <h4 class="fw-bold">Masuk</h4>
            <p class="text-muted small">Selamat Datang di Say Hi Cookies</p>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Alamat Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" name="password" class="form-control" id="passwordInput" required>
                    <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                        <i class="fas fa-eye-slash" id="toggleIcon"></i>
                    </span>
                </div>
            </div>
            

            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember">
                    <label class="form-check-label" for="remember">Remember for 30 days</label>
                </div>
                <a href="#" class="text-decoration-none">Forgot password?</a>
            </div>

            <button type="submit" class="btn btn-primary w-100" style="background: #EE9974; border: none;">Masuk</button>
        </form>

        <div class="text-center mt-3">
            <span class="text-muted">Belum mempunyai akun? </span>
            <a href="{{ route('register') }}" class="text-decoration-none">Buat Akun</a>
        </div>
    </div>
</div>

<script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('passwordInput');
    const toggleIcon = document.getElementById('toggleIcon');

    togglePassword.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        // Ganti icon
        toggleIcon.classList.toggle('fa-eye');
        toggleIcon.classList.toggle('fa-eye-slash');
    });
</script>

@endsection
