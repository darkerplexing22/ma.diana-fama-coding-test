<?php


namespace App\Services;

use App\Repositories\ProductRepository;


class ProductService
{  
    protected $productRepository;

    public function __construct(ProductRepository $productRepository){
        $this->productRepository  = $productRepository;
    }

    public function createProduct($data){
        return $this->productRepository->create($data);
    }

    public function getPaginatedProducts($perPage)
    {
        return $this->productRepository->paginate($perPage);
    }

    public function getProductById($id){
        return $this->productRepository->find($id);
    }

    public function updateProduct($product, $data){
        return $this->productRepository->update($product, $data);
    }

    public function deleteProduct($product){
        return $this->productRepository->delete($product);
    }

}



?>