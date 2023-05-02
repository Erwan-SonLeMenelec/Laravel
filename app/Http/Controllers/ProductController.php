<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->get();

        return view("products.index", compact("products"));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //On retourne la vue "/resources/views/products/edit.blade.php"
        return view("products.edit");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. La validation
        $this->validate($request, [
            'name' => 'bail|required|string|max:255',
            "image" => 'bail|required|image|max:1024',
            "description" => 'bail|required',
            "price" => 'bail|required|numeric',
            "quantity" => 'bail|required|numeric',
        ]);

        // 2. On upload l'image dans "/storage/app/public/products"
        $chemin_image = $request->image->store("products");

        // 3. On enregistre les informations du Post
        Product::create([
            "name" => $request->name,
            "image" => $chemin_image,
            "description" => $request->description,
            "price" => $request->price,
            "quantity" => $request->quantity,
        ]);

        // 4. On retourne vers tous les posts : route("products.index")
        return redirect(route("products.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        return view("products.show", compact("product"));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        return view("products.edit", compact("product"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        // 1. La validation

        // Les règles de validation pour "title" et "content"
        $rules = [
            'name' => 'bail|required|string|max:255',
            "image" => 'bail|required|image|max:1024',
            "description" => 'bail|required',
            "price" => 'bail|required|numeric',
            "quantity" => 'bail|required|numeric',
        ];

        // Si une nouvelle image est envoyée
        if ($request->has("image")) {
            // On ajoute la règle de validation pour "image"
            $rules["image"] = 'bail|required|image|max:1024';
        }

        $this->validate($request, $rules);

        // 2. On upload l'image dans "/storage/app/public/posts"
        if ($request->has("image")) {

            //On supprime l'ancienne image
            Storage::delete($product->image);

            $chemin_image = $request->image->store("products");
        }

        // 3. On met à jour les informations du Post
        $product->update([
            "name" => $request->name,
            "description" => $request->description,
            "price" => $request->price,
            "quantity" => $request->quantity,
            "image" => isset($chemin_image) ? $chemin_image : $product->image,
        ]);

        // 4. On affiche le produit modifié : route("products.show")
        return redirect(route("products.show", $product));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        // On supprime l'image existant
        Storage::delete($product->picture);

        // On les informations du $post de la table "posts"
        $product->delete();

        // Redirection route "posts.index"
        return redirect(route('products.index'));
    }


}
