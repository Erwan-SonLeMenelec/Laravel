@extends("layouts.app")
@section("title", $product->title)
@section("content")

    <h1>{{ $post->title }}</h1>

    <img src="{{ asset('storage/'.$product->picture) }}" alt="Image de couverture" style="max-width: 300px;">

    <div>{{ $product->content }}</div>

    <p><a href="{{ route('products.index') }}" title="Retourner aux produits" >Retourner aux produits</a></p>

@endsection
