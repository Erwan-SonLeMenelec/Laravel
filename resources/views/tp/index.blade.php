@extends('base')

@section('title','Accueil du site')


@section('content')
    <h1>Mon TP</h1>
    @dump (['cool'])

    {{"test"}}
    @foreach($products as $product)
        <article>
            <h2>{{$product ->title}}</h2>
            <p>
                {{$product->content}}
            </p>
            <img {{$product->image}}>
        </article>
    @endofreach

    {{$products->links()}}
@endsection

