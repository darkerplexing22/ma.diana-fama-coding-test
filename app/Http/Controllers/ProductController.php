<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
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

    public function index(Request $request){

        $product = Product::all();

        return response()->json([
            'status' => true,
            'message' => 'Product retrieved.',
            'data' => $product,
        ]);

    }

    public function show(Request $request, $id){

        $product = Product::find($id);

        return response()->json([
            'status' => true,
            'message' => 'Product found.',
            'data' => $product,
        ]);
    }

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
