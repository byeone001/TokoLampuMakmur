<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TransactionExport implements FromCollection, WithHeadings, WithMapping
{
    protected $userId;

    public function __construct($userId = null)
    {
        $this->userId = $userId;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $query = Transaction::with('user');
        
        if ($this->userId) {
            $query->where('user_id', $this->userId);
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Kasir',
            'Total Harga',
            'Bayar',
            'Kembalian',
            'Tanggal Transaksi',
        ];
    }

    public function map($transaction): array
    {
        return [
            $transaction->daily_sequence,
            $transaction->user->name ?? $transaction->user->username ?? 'Unknown',
            $transaction->total_price,
            $transaction->amount_paid,
            $transaction->change_amount,
            $transaction->created_at,
        ];
    }
}
