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
                        <label for="title" >Titre</label><br/>

                        <!-- S'il y a un $product->title, on complète la valeur de l'input -->
                        <input type="text" name="title" value="{{ isset($product->title) ? $product->title : old('title') }}"  id="title" placeholder="Le titre du produit" >

                        <!-- Le message d'erreur pour "title" -->
                    @error("title")
                    <div>{{ $message }}</div>
                    @enderror
                    </p>

                    <!-- S'il y a une image $product->picture, on l'affiche -->
                    @if(isset($product->picture))
                        <p>
                            <span>Couverture actuelle</span><br/>
                            <img src="{{ asset('storage/'.$product->picture) }}" alt="image de couverture actuelle" style="max-height: 200px;" >
                        </p>
                    @endif

                    <p>
                        <label for="picture" >Couverture</label><br/>
                        <input type="file" name="picture" id="picture" >

                        <!-- Le message d'erreur pour "picture" -->
                    @error("picture")
                    <div>{{ $message }}</div>
                    @enderror
                    </p>
                    <p>
                        <label for="content" >Contenu</label><br/>

                        <!-- S'il y a un $product->content, on complète la valeur du textarea -->
                        <textarea name="content" id="content" lang="fr" rows="10" cols="50" placeholder="Le contenu du post" >{{ isset($post->content) ? $post->content : old('content') }}</textarea>

                        <!-- Le message d'erreur pour "content" -->
                    @error("content")
                    <div>{{ $message }}</div>
                    @enderror
                    </p>

                    <input type="submit" name="valider" value="Valider" >

                </form>

        @endsection
