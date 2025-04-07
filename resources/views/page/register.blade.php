@extends('layouts.layout')

@section('landingpage')
<div class="pt-5 pb-5 d-flex justify-content-center align-items-center" style="min-height: 100vh; background: #f9f9fc;">
    <div class="card shadow p-4" style="width: 420px; border-radius: 20px; border: none;">
        <div class="text-center mb-4">
            <div class="mb-3">
                <img src="{{ asset('images/logo.png') }}" alt="icon" style="width: 50px;">
            </div>
            <h4 class="fw-bold">Daftar</h4>
            <p class="text-muted small">Selamat Datang di Say Hi Cookies</p>
        </div>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
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
            <button type="submit" class="btn btn-primary w-100" style="background: #EE9974; border: none;">Daftar</button>    </form>

        <div class="text-center mt-3">
            <span class="text-muted">Sudah mempunyai akun? </span>
            <a href="{{ route('register') }}" class="text-decoration-none">Masuk</a>
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
