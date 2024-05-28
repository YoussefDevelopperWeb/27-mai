<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
            <!-- Sidebar user avatar -->
            <div class="avatar"><img src="{{ asset('admincss/img/avatar-6.jpg') }}" alt="..." class="img-fluid rounded-circle"></div>
            <!-- Sidebar user information -->
            <div class="title">
                <h1 class="h5">Achraf Bouhia</h1>
                <p>Web Developer</p>
            </div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <span class="heading">Main</span>
        <!-- Sidebar menu items -->
        <ul class="list-unstyled">
            <!-- Sidebar menu items with routes -->
            <li class="active"><a href="index.html"> <i class="icon-home"></i>Home </a></li>
            <li><a href="{{ route('categories.index') }}"> <i class="icon-grid"></i>Categories</a></li>
            <li><a href="{{ route('produit.index') }}"> <i class="icon-grid"></i>Produits </a></li>
            <li><a href="{{ route('commande.index') }}"> <i class="icon-grid"></i>Commandes </a></li>
            <li><a href="{{ route('facture.index') }}"> <i class="icon-grid"></i>Factures </a></li>
            <li><a href="{{ route('feedback.index') }}"> <i class="icon-grid"></i>Feedbacks </a></li>
            <!-- Logout button -->
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="icon-logout"></i>Logout
                </a>
                <!-- Logout form -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
  </div>
  