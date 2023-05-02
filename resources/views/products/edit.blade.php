@extends("layouts.app")
@section("title", "Editer un post")
@section("content")

    <h1>Editer un produit</h1>

    <!-- Si nous avons un Product $product -->
    @if (isset($product))

        <!-- Le formulaire est géré par la route "posts.update" -->
        <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data" >

            <!-- <input type="hidden" name="_method" value="PUT"> -->
            @method('PUT')

            @else

                <!-- Le formulaire est géré par la route "posts.store" -->
                <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" >

                    @endif

                    <!-- Le token CSRF -->
                    @csrf

                    <p>
                        <label for="name" >Nom</label><br/>

                        <!-- S'il y a un $product->name, on complète la valeur de l'input -->
                        <input type="text" name="name" value="{{ isset($product->name) ? $product->name : old('name') }}"  id="name" placeholder="Le nom du produit" >

                        <!-- Le message d'erreur pour "name" -->
                    @error("name")
                    <div>{{ $message }}</div>
                    @enderror
                    </p>

                    <!-- S'il y a une image $product->image, on l'affiche -->
                    @if(isset($product->image))
                        <p>
                            <span>Image actuelle</span><br/>
                            <img src="{{ asset('storage/'.$product->image) }}" alt="image du produit actuelle" style="max-height: 200px;" >
                        </p>
                    @endif

                    <p>
                        <label for="image" >Image</label><br/>
                        <input type="file" name="image" id="image" >

                        <!-- Le message d'erreur pour "image" -->
                    @error("image")
                    <div>{{ $message }}</div>
                    @enderror
                    </p>
                    <p>
                        <label for="description" >Contenu</label><br/>

                        <!-- S'il y a un $product->content, on complète la valeur du textarea -->
                        <textarea name="description" id="description" lang="fr" rows="10" cols="50" placeholder="La description du produit" >{{ isset($product->description) ? $product->description : old('description') }}</textarea>

                        <!-- Le message d'erreur pour "description" -->
                    @error("description")
                    <div>{{ $message }}</div>
                    @enderror
                    </p>

                    <p>

                        <label for="price" >Prix du produit</label>
                        <input type="number" name="price" id="price" >
                    </p>

                    <p>

                        <label for="quantity" >Quantité du produit</label>
                        <input type="number" name="quantity" id="quantity" >
                    </p>

                    <input type="submit" name="valider" value="Valider" >

                </form>

        @endsection
