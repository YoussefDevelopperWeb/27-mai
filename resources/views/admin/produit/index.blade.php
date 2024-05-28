<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <!-- Add Tailwind CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <!-- Add Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
   
</head>
<body>
    @include('admin.header')
    
    <div class="container mx-auto px-4">
        <h1>Liste des Produits</h1>
        
        <div class="flex justify-end mb-4">
            <a href="{{ route('produit.create') }}" class="btn btn-primary">Ajouter un Produit</a>
        </div>
        
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Catégorie</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produits as $produit)
                <tr>
                    <td>{{ $produit->id }}</td>
                    <td>{{ $produit->nom_produit }}</td>
                    <td>{{ $produit->prix_produit }}</td>
                    <td>{{ $produit->description_produit }}</td>
                    <td><img src="{{ Storage::url($produit->image_produit) }}" alt="{{ $produit->nom_produit }}" width="50"></td>
                    <td>{{ $produit->categorie->nom_cat }}</td>
                    <td>{{ $produit->stock_produit }}</td>
                    <td>
                        <a href="{{ route('produit.edit', $produit->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('produit.destroy', $produit->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Include admin JS files -->
    <script src="{{ asset('/admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('/admincss/js/front.js') }}"></script>
</body>
</html>
