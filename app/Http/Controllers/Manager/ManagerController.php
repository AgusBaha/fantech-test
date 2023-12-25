<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\Sales;
use Illuminate\Http\Request;
use PDF;

class ManagerController extends Controller
{
    public function indexSales()
    {
        $data = Sales::all();
        return view('manager.managerSales', compact('data'));
    }

    public function printSalesManager($id)
    {
        $sales = Sales::with('user', 'detailSales.inventory')->findOrFail($id);
        // dd($sales);
        $pdf = PDF::loadView('sales.print', compact('sales'));

        return $pdf->download('sales.pdf');
    }

    public function indexPurchase()
    {
        $data = Purchase::all();
        return view('manager.managerPurchase', compact('data'));
    }

    public function printPruchaseManager($id)
    {
        $purchase = Purchase::with('user', 'detailPurchase.inventory')->findOrFail($id);
        // dd($purchase);
        $pdf = PDF::loadView('purchase.print', compact('purchase'));

        return $pdf->download('purchase.pdf');
    }
}
