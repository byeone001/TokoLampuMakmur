<?php

namespace App\Repositories;

use App\Interfaces\TransactionRepositoryInterface;
use App\Models\Transaction;
use App\Models\TransactionDetail;

class TransactionRepository implements TransactionRepositoryInterface
{
    public function createTransaction(array $data)
    {
        return Transaction::create($data);
    }

    public function createTransactionDetail(array $data)
    {
        return TransactionDetail::create($data);
    }
}
