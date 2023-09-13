<?php

namespace App\Repositories;

use App\Models\Product;


class ProductRepository
{  

    public function create($data){
        return Product::create($data);
    }

    public function paginate($data){
        return Product::paginate($data);
    }

    public function find($id){
        return Product::find($id);
    }

    public function update($product, $data){
        $product->update($data);
        return $product;
    }

    public function delete($product){
        $product->delete();
        return $product;
    }

}



?>