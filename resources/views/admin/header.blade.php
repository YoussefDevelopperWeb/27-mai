<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add Tailwind CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <!-- Add Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header class="header bg-gray-800 text-white py-4">
    <!-- Navbar -->
    <nav class="container mx-auto flex items-center justify-between">
        <!-- Navbar Header -->
        <div class="flex items-center">
            <!-- Navbar user avatar -->
            <div class="mr-4">
                <img src="{{ asset('admincss/img/avatar-6.jpg') }}" alt="..." class="img-fluid rounded-circle w-12 h-12">
            </div>
            <!-- Navbar user information -->
            <div>
                <h1 class="text-xl font-semibold">Admin</h1>
                <p class="text-sm">Web Developer</p>
            </div>
        </div>
        <!-- Navbar Navigation Menus -->
        <ul class="flex space-x-4">
            <!-- Navbar menu items with routes -->
            <li class="nav-item"><a href="index.html" class="nav-link text-white hover:text-gray-300"><i class="icon-home mr-1"></i> Home </a></li>
            <li class="nav-item"><a href="{{ route('categories.index') }}" class="nav-link text-white hover:text-gray-300"><i class="icon-grid mr-1"></i> Categories</a></li>
            <li class="nav-item"><a href="{{ route('produit.index') }}" class="nav-link text-white hover:text-gray-300"><i class="icon-grid mr-1"></i> Produits </a></li>
            <li class="nav-item"><a href="{{ route('commande.index') }}" class="nav-link text-white hover:text-gray-300"><i class="icon-grid mr-1"></i> Commandes </a></li>
            <li class="nav-item"><a href="{{ route('facture.index') }}" class="nav-link text-white hover:text-gray-300"><i class="icon-grid mr-1"></i> Factures </a></li>
            <li class="nav-item"><a href="{{ route('feedback.index') }}" class="nav-link text-white hover:text-gray-300"><i class="icon-grid mr-1"></i> Feedbacks </a></li>
            <!-- Logout button -->
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link text-white hover:text-gray-300" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="icon-logout mr-1"></i> Logout
                </a>
                <!-- Logout form -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
</header>
</body>
</html>
