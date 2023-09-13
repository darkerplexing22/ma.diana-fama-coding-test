<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{

    // Create Product
    public function store(Request $request){

        $data = $request->validate([
            'product_name' => 'required|string|max:255',
            'product_description' => 'required|string',
            'product_price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
 
        ]);

        $product = Product::create($data);

        return response()->json([
            'status' => true,
            'message' => 'Product created',
            'data' => $product,
        ]);
    }

    // Product List
    public function index(Request $request){

        $perPage = $request->query('per_page', 10);
        $product = Product::paginate($perPage);

        return response()->json([
            'status' => true,
            'message' => 'Product retrieved.',
            'data' => $product,
        ]);

    }

    // Product Detail
    public function show(Request $request, $id)
    {
        $cacheKey = 'product_' . $id;

        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        $product = Product::find($id);


        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'Product not found.',
            ], 404);
        }

        $response = [
            'status' => true,
            'message' => 'Product found.',
            'data' => $product,
        ];

        Cache::put($cacheKey, $response, now()->addMinutes(60));

        return response()->json($response);
    }
    
    // Update Product 
    public function update(Request $request, $id){

        $data = $request->validate([
            'product_name' => 'nullable|string|max:255',
            'product_description' => 'nullable|string',
            'product_price' => 'nullable|numeric|regex:/^\d+(\.\d{1,2})?$/',
 
        ]);

        $product = Product::find($id);
        
        if($product){

            $product->update($data);
            return response()->json([
                'status' => true,
                'message' => 'Product found.',
                'data' => $product,
            ]);
    
        }
        else{
            return response()->json([
                'status' => false,
                'message' => 'Product not found.',
                'data' => null,
            ], 404);
    
        }
    }

    // Delete Product
    public function destroy(Request $request, $id){

        $product = Product::find($id);
        
        if($product){
            $product->delete();

            return response()->json([
                'status' => true,
                'message' => 'Product deleted.',
                'data' => $product,
            ]);
    
        }
        else{
            return response()->json([
                'status' => false,
                'message' => 'Product not found.',
                'data' => null,
            ], 404);
    
        }
    }
}
