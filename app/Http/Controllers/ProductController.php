<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\images;
use App\Models\Product;
use App\Models\products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $images = [];
        foreach ($products as $product) {
            $images[$product->id] = images::where('product_id', $product->id)->get();
        }
        return view('products.index', compact('products', 'images'));
    }
    
    public function ups(){
        return view('products.error');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        $users = User::all();
        $categories = Categories::all();
        $images = images::all();
        return view('products.create', compact('products','users','categories','images'));
    }

    /**
     * Store a newly created resource in storage.
     */

    
    public function store(Request $request)
    {
        $product = new Product();
        
        $request->validate([
            'user_id' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validación para cada imagen
        ]);
    
        $product->user_id = $request->user_id;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();
    
        $imageCount = 0; 
        foreach ($request->file('image') as $image) {
            if ($imageCount < 7) {
                $imageModel = new images(); 
                $imageName = time() . '_' . $image->getClientOriginalName(); 
                $image->storeAs('public/img', $imageName);
    
                
                if (!is_null($product->image)) {
                    $existingImagePath = public_path($product->image);
                    if (File::exists($existingImagePath)) {
                        File::delete($existingImagePath);
                    }
                }
    
                $imageModel->product_id = $product->id;
                $imageModel->image = 'http://localhost:8000/storage/img/' . $imageName;
                $imageModel->save();
                $imageCount++;
            } else {
                break; 
            }
        }
    
        return redirect()->route('inicio.products')->with('success', 'Producto creado correctamente');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product,$id)
    {
        $product = Product::findOrFail($id);
        $products = Product::all(); // Aquí deberías cargar todos los productos si los necesitas en la vista
        $categories = Categories::all();
        $users = User::all();
        $image = images::findOrFail($id);
        return view('products.edit', compact('product', 'products', 'categories','users','image'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $image = images::findOrFail($id);
    
        $request->validate([
            'user_id' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required',
            'product_id' => 'required',
        ]);
    
        $product->update([
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        $image->update([
            'image' => $request->user_id,
            'product_id' => $request->description,
        ]);
    
        // Una vez que se ha actualizado el producto, puedes redirigir a una vista que muestre el producto actualizado
         return redirect()->route('inicio.products')->with('success', 'Producto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product,$id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('inicio.products')->with('success', 'Producto actualizada correctamente');
    }
}
