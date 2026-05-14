<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        .sidebar {
            background: linear-gradient(180deg, #1a1a2e, #16213e);
            box-shadow: 4px 0 10px rgba(0, 0, 0, 0.3);
        }
        .nav-link {
            transition: all 0.3s;
        }
        .nav-link:hover {
            background: rgba(255,255,255,0.1);
            border-radius: 8px;
            transform: translateX(5px);
        }
        .active {
            background: rgba(147, 51, 234, 0.3);
            color: #c084fc !important;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar text-white min-vh-100 p-3">
                <h4 class="mb-4 text-center">
                    <i class="fas fa-user-shield"></i> Admin Panel
                </h4>
                
                <!-- Tombol Ke Home -->
                <a href="{{ route('home') }}" class="btn btn-outline-light mb-4 w-100">
                    <i class="fas fa-home"></i> Ke Halaman Home
                </a>

                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link text-white">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('admin.categories.index') }}" class="nav-link text-white">
                            <i class="fas fa-tags"></i> Kategori
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('admin.costumes.index') }}" class="nav-link text-white">
                            <i class="fas fa-tshirt"></i> Costume
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('admin.users.index') }}" class="nav-link text-white">
                            <i class="fas fa-users"></i> Daftar User
                        </a>
                    </li>
                </ul>

                <hr class="border-secondary">
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 p-4">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>