<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <!-- Add Tailwind CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body>
    @include('admin.header')

    <div class="page-content">
    <div class="page-header">
        <div class="container-fluid">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-semibold text-center text-gray-900 mb-8">Ajouter un Produit</h1>
        <form action="{{ route('produit.store') }}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="form-group">
                <label for="nom_produit">Nom du Produit</label>
                <input type="text" name="nom_produit" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="prix">Prix</label>
                <input type="number" name="prix_produit" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description_produit" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="stock_produit">Stock</label>
                <input type="number" name="stock_produit" class="form-control" required>
            </div>
           
            
            <div class="form-group">
                <label for="categorie_id">Catégorie</label>
                <select name="id_cat" class="form-control" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->nom_cat }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image_produit" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Ajouter</button>
        </form>
    </div>
</div>
    </div>
    </div>
    
</div>
</body>
</html>
