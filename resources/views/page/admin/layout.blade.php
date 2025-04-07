<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body {
            overflow-x: hidden;
        }
        .sidebar {
            width: 230px;
            transition: width 0.3s ease-in-out;
        }
        .sidebar.collapsed {
            width: 55px;
        }

        .sidebar .nav-link {
            display: flex;
            align-items: center;
            padding: 10px 15px;
            font-size: 16px;
        }
        .sidebar .nav-link i {
            width: 20px;
        }
        .sidebar .nav-link .text {
            transition: opacity 0.3s ease-in-out, width 0.3s ease-in-out;
            white-space: nowrap;
        }
        .sidebar.collapsed .nav-link .text {
            opacity: 0;
            width: 0;
            overflow: hidden;
        }
        .logo-small {
            width: 30px;
            height: auto;
            display: inline;
        }
        .sidebar.collapsed + .container-fluid .logo-small {
            display: none;
        }
        .content {
            transition: margin-left 0.3s ease-in-out;
            margin-left: 230px;
        }
        .content.full {
            margin-left: 55px;
        }
        #toggleSidebar {
            margin-left: 130px;
            transition: margin-left 0.3s ease-in-out;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container-fluid">
            <img id="logoSmall" src="{{ asset('images/logo.png') }}" alt="Logo" class="logo-small me-2">
            <button id="toggleSidebar" class="btn btn-light me-3">
                ☰
            </button>
            <div class="d-flex align-items-center ms-auto">
                <i class="fa-solid fa-user fa-xl me-3" style="color: #000000;"></i>
                <div class="me-4">
                    <p class="mb-0 fw-semibold">Say_hi.Co</p>
                    <p class="mb-0 text-muted small">Admin</p>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item me-4">
                        <i class="fa-solid fa-sign-out-alt " style="color: #ff0000;"></i>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="d-flex mt-5">
        <div id="sidebar" class="sidebar bg-white vh-100 position-fixed shadow">
            <nav class="nav flex-column pt-3">
                <a href="{{ route('admin.dashboard') }}" class="nav-link text-dark">
                    <i class="fa-solid fa-house"></i>
                    <span class="text ms-2">Dashboard</span>
                </a>
                <a href="{{ route('admin.kategori') }}" class="nav-link text-dark">
                    <i class="fa-solid fa-box"></i>
                    <span class="text ms-2">Kategori Produk</span>
                </a>
                <a href="{{ route('admin.produk') }}" class="nav-link text-dark">
                    <i class="fa-solid fa-basket-shopping"></i>
                    <span class="text ms-2">Produk</span>
                </a>
                <a href="{{ route('admin.testimoni') }}" class="nav-link text-dark">
                    <i class="fa-solid fa-comments"></i>
                    <span class="text ms-2">Testimoni</span>
                </a>
                <a href="{{ route('admin.portfolio') }}" class="nav-link text-dark">
                    <i class="fa-solid fa-briefcase"></i>
                    <span class="text ms-2">Portfolio</span>
                </a>
                <a href="{{ route('admin.kategorifaqs') }}" class="nav-link text-dark">
                    <i class="fa-solid fa-window-restore"></i>
                    <span class="text ms-2">Kategori FAQs</span>
                </a>
                <a href="{{ route('admin.faqs') }}" class="nav-link text-dark">
                    <i class="fa-solid fa-question-circle"></i>
                    <span class="text ms-2">FAQs</span>
                </a>
            </nav>
        </div>
        <div id="content" class="content p-4 flex-grow-1">
            @yield('content')
        </div>
    </div>
    <script>
        const sidebar = document.getElementById("sidebar");
        const content = document.getElementById("content");
        const toggleButton = document.getElementById("toggleSidebar");
        const logoSmall = document.getElementById("logoSmall");

        toggleButton.addEventListener("click", () => {
            sidebar.classList.toggle("collapsed");
            content.classList.toggle("full");

            if (sidebar.classList.contains("collapsed")) {
                logoSmall.style.display = "none"; 
                toggleButton.style.marginLeft = "0";
            } else {
                logoSmall.style.display = "inline"; 
                toggleButton.style.marginLeft = "130px"; 
            }
        });

        window.addEventListener("DOMContentLoaded", () => {
            sidebar.classList.remove("collapsed"); 
            content.classList.remove("full"); 
            logoSmall.style.display = "inline"; 
            toggleButton.style.marginLeft = "130px"; 
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
