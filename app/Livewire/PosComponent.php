<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\ProductService;
use App\Services\TransactionService;
use Exception;

class PosComponent extends Component
{
    public $product_code;
    public $cart = [];
    public $total = 0;
    public $amount_paid;
    public $change = 0;

    protected $productService;
    protected $transactionService;

    public function boot(ProductService $ps, TransactionService $ts)
    {
        $this->productService = $ps;
        $this->transactionService = $ts;
    }

    public function updatedProductCode()
    {
        $product = $this->productService->getProductByCode($this->product_code);
        if ($product) {
            $this->addToCart($product);
            $this->product_code = '';
        }
    }

    public function addToCart($product)
    {
        // Simple stock check (pre-addition)
        if ($product->stock <= 0) {
            session()->flash('error', 'Stok habis!');
            return;
        }

        $found = false;
        foreach ($this->cart as &$item) {
            if ($item['product_id'] == $product->id) {
                 // Check stock for increment
                if ($item['quantity'] + 1 > $product->stock) {
                    session()->flash('error', 'Stok tidak cukup!');
                    return;
                }
                $item['quantity']++;
                $item['subtotal'] = $item['quantity'] * $item['price'];
                $found = true;
                break;
            }
        }
        unset($item);

        if (!$found) {
            $this->cart[] = [
                'product_id' => $product->id,
                'code' => $product->product_code,
                'name' => $product->name,
                'price' => $product->price,
                'image_path' => $product->image_path,
                'quantity' => 1,
                'subtotal' => $product->price
            ];
        }
        $this->calculateTotal();
    }

    public function removeItem($index)
    {
        array_splice($this->cart, $index, 1);
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        $this->total = array_sum(array_column($this->cart, 'subtotal'));
        $this->updatedAmountPaid();
    }

    public function updatedAmountPaid()
    {
        if (is_numeric($this->amount_paid)) {
            $this->change = $this->amount_paid - $this->total;
        } else {
            $this->change = 0;
        }
    }

    public function checkout()
    {
        if (empty($this->cart)) return;
        
        if ($this->amount_paid < $this->total) {
             session()->flash('error', 'Pembayaran kurang!');
             return;
        }

        try {
            $tData = [
                // 'user_id' handled in service or here. Service update ensures it matches auth.
                // But for clarity let's just pass necessary payment info.
                'total_price' => $this->total,
                'amount_paid' => $this->amount_paid,
                'change_amount' => $this->change
            ];
            
            $this->transactionService->createTransaction($tData, $this->cart);
            
            $this->cart = [];
            $this->total = 0;
            $this->amount_paid = '';
            $this->change = 0;
            session()->flash('success', 'Transaksi Berhasil!');
        } catch (Exception $e) {
             session()->flash('error', 'Transaksi Gagal: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.pos-component');
    }
}
