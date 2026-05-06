<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Rental Cosplay Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 bg-dark text-white min-vh-100 p-3">
                <h4 class="mb-4">Admin Panel</h4>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="{{ route('admin.categories.index') }}" class="nav-link text-white"> Kategori</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('admin.costumes.index') }}" class="nav-link text-white"> Costume</a>
                    </li>
                </ul>
            </div>

            <!-- Content -->
            <div class="col-md-9 col-lg-10 p-4">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>