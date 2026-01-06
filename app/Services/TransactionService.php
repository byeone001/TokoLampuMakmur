<?php

namespace App\Services;

use App\Interfaces\ProductRepositoryInterface;
use App\Interfaces\TransactionRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use Exception;

class TransactionService
{
    protected $productRepository;
    protected $transactionRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        TransactionRepositoryInterface $transactionRepository
    ) {
        $this->productRepository = $productRepository;
        $this->transactionRepository = $transactionRepository;
    }

    public function createTransaction(array $tData, array $tDetails)
    {
        return DB::transaction(function () use ($tData, $tDetails) {
            // 1. Calculate Daily Sequence
            // Get today's date
            $today = now()->format('Y-m-d');
            
            // Find last transaction created today
            $lastTransaction = Transaction::whereDate('created_at', $today)
                                ->orderBy('daily_sequence', 'desc')
                                ->first();
            
            $nextSequence = $lastTransaction ? ($lastTransaction->daily_sequence + 1) : 1;
            
            $tData['daily_sequence'] = $nextSequence;
            $tData['user_id'] = auth()->id(); 
            
            $transaction = $this->transactionRepository->createTransaction($tData);

            foreach ($tDetails as $detail) {
                // 2. Validate Stock
                $product = $this->productRepository->findById($detail['product_id']);
                
                if (!$product || $product->stock < $detail['quantity']) {
                    throw new Exception("Stock insufficient for product: " . ($product->name ?? 'Unknown'));
                }

                // 3. Deduct Stock
                $this->productRepository->update($product->id, [
                    'stock' => $product->stock - $detail['quantity']
                ]);

                // 4. Create Transaction Detail
                $this->transactionRepository->createTransactionDetail([
                    'transaction_id' => $transaction->id,
                    'product_id' => $detail['product_id'],
                    'quantity' => $detail['quantity'],
                    'subtotal' => $detail['subtotal'],
                ]);
            }

            return $transaction;
        });
    }
}
