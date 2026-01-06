<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use App\Exports\TransactionExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class CashierReports extends Component
{
    public $selectedTransaction;
    public $showModal = false;

    public function render()
    {
        $transactions = Transaction::where('user_id', Auth::id())
            ->with('user')
            ->latest()
            ->take(50)
            ->get();

        return view('livewire.cashier-reports', compact('transactions'));
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
        return Excel::download(new TransactionExport(Auth::id()), 'laporan-saya.xlsx');
    }

    public function exportPdf()
    {
        $transactions = Transaction::where('user_id', Auth::id())->with('user')->get();
        // Reusing the same PDF view but with filtered data
        $pdf = Pdf::loadView('pdf.transactions', compact('transactions'));
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'laporan-saya.pdf');
    }
}
