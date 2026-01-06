<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Services\ProductService;

class AdminProduct extends Component
{
    use WithFileUploads;

    public $products, $product_id;
    public $product_code, $name, $price, $stock, $image;
    public $isEdit = false;
    public $image_path; // For showing existing image on edit

    protected $productService;

    public function boot(ProductService $service)
    {
        $this->productService = $service;
    }

    public function render()
    {
        $this->products = $this->productService->getAllProducts();
        return view('livewire.admin-product');
    }

    public function resetFields()
    {
        $this->product_code = '';
        $this->name = '';
        $this->price = '';
        $this->stock = '';
        $this->image = null;
        $this->image_path = null;
        $this->product_id = null;
        $this->isEdit = false;
    }

    public function store()
    {
        $this->validate([
            'product_code' => 'required|unique:products,product_code',
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|max:1024',
        ]);

        $data = [
            'product_code' => $this->product_code,
            'name' => $this->name,
            'price' => $this->price,
            'stock' => $this->stock,
        ];

        if ($this->image) {
            $path = $this->image->store('products', 'public');
            $data['image_path'] = $path;
        }

        $this->productService->createProduct($data);
        session()->flash('message', 'Product created successfully.');
        $this->resetFields();
    }

    public function edit($id)
    {
        $product = $this->productService->getProductById($id);
        $this->product_id = $id;
        $this->product_code = $product->product_code;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->stock = $product->stock;
        $this->image_path = $product->image_path;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate([
            'product_code' => 'required|unique:products,product_code,' . $this->product_id,
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|max:1024',
        ]);

        $data = [
            'product_code' => $this->product_code,
            'name' => $this->name,
            'price' => $this->price,
            'stock' => $this->stock,
        ];

        if ($this->image) {
            $path = $this->image->store('products', 'public');
            $data['image_path'] = $path;
        }

        $this->productService->updateProduct($this->product_id, $data);
        session()->flash('message', 'Product updated successfully.');
        $this->resetFields();
    }

    public function delete($id)
    {
        $this->productService->deleteProduct($id);
        session()->flash('message', 'Product deleted successfully.');
    }

    public function cancel()
    {
        $this->resetFields();
    }
}
