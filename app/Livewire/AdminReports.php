<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use App\Exports\TransactionExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminReports extends Component
{
    public $selectedTransaction;
    public $showModal = false;

    public function render()
    {
        $transactions = Transaction::with('user')->latest()->take(50)->get();
        return view('livewire.admin-reports', compact('transactions'));
    }

    public function showDetail($id)
    {
        $this->selectedTransaction = Transaction::with('details.product')->findOrFail($id);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedTransaction = null;
    }

    public function exportExcel()
    {
        return Excel::download(new TransactionExport, 'transactions.xlsx');
    }

    public function exportPdf()
    {
        $transactions = Transaction::with('user')->get();
        $pdf = Pdf::loadView('pdf.transactions', compact('transactions'));
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'transactions.pdf');
    }
}
