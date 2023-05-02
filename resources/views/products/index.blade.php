@extends('layouts.app')
@section('title','Tous les produits')
@section("content")

    <h1>Tous les produits</h1>

    <p>
        <!-- Lien pour créer un nouveau produit : "products.create -->
        <a href="{{ route('products.create') }}" title="Créer un produit" >Créer un nouveau produit</a>
    </p>

    <!-- Le tableau pour lister les produits -->
    <table border="1" >
        <thead>
            <tr>
                    <th>Titre</th>
                    <th colspan="2" >Opérations</th>
            </tr>
        </thead>
    </table>
    <tbody>
        <!-- On parcourt la collection de Produit -->
    </tbody>
    @foreach ($products as $product)
			<tr>
				<td>
					<!-- Lien pour afficher un Product : "products.show" -->
					<a href="{{ route('products.show', $product) }}" title="Voir le produit" >{{ $product->title }}</a>
				</td>
				<td>
					<!-- Lien pour modifier un Post : "posts.edit" -->
					<a href="{{ route('products.edit', $product) }}" title="Modifier le produit" >Modifier</a>
				</td>
				<td>
					<!-- Formulaire pour supprimer un Product : "products.destroy" -->
					<form method="POST" action="{{ route('products.destroy', $product) }}" >
						<!-- CSRF token -->
						@csrf
						<!-- <input type="hidden" name="_method" value="DELETE"> -->
						@method("DELETE")
						<input type="submit" value="x Supprimer" >
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>


