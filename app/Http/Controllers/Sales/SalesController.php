<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\Inventories;
use App\Models\Sales;
use App\Models\SalesDetail;
use App\Models\User;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Sales::all();
        return view('sales.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data_user = User::all();
        return view('sales.create', compact('data_user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data dari $request
        $request->validate([
            'number' => 'required|numeric',
            'date' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);

        Sales::create([
            'number' => $request->input('number'),
            'date' => $request->input('date'),
            'user_id' => $request->input('user_id'),
        ]);

        return redirect()->route('sales.index')->with('success', 'Data Berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sale = Sales::findOrFail($id);
        $data_user = User::all();

        return view('sales.edit', compact('sale', 'data_user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data dari $request
        $request->validate([
            'number' => 'required|numeric',
            'date' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);

        $sales = Sales::findOrFail($id);

        $sales->update([
            'number' => $request->input('number'),
            'date' => $request->input('date'),
            'user_id' => $request->input('user_id'),
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('sales.index')->with('success', 'Penjualan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $sales = Sales::findOrFail($id);

        $sales->delete();

        return redirect()->route('sales.index')->with('success', 'Penjualan berhasil dihapus.');
    }

    public function detail($id)
    {
        $data = Inventories::all();
        $sales = Sales::find($id);

        if (!$sales) {
            return abort(404);
        }

        $saleDetail = SalesDetail::where('sales_id', $sales->id)->first();

        if ($saleDetail) {
            return view('sales.detailSales.update', compact('sales', 'data', 'saleDetail'));
        }

        return view('sales.detailSales.create', compact('sales', 'data'));
    }


    public function storeDetail(Request $request)
    {
        // Validasi data dari $request
        $request->validate([
            'inventories_id' => 'required|exists:inventories,id',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        SalesDetail::create([
            'sales_id' => $request->input('sales_id'),
            'inventory_id' => $request->input('inventories_id'),
            'qty' => $request->input('qty'),
            'price' => $request->input('price'),
        ]);

        return redirect()->route('sales.index')->with('success', 'Detail penjualan berhasil disimpan.');
    }

    public function detailUpdate(Request $request, $id)
    {
        // Validasi data dari $request
        $request->validate([
            'inventories_id' => 'required|exists:inventories,id',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        $sale = SalesDetail::find($id);

        if (!$sale) {
            return abort(404);
        }

        $sale->update([
            'sales_id' => $request->input('sales_id'),
            'inventory_id' => $request->input('inventories_id'),
            'qty' => $request->input('qty'),
            'price' => $request->input('price'),
        ]);

        return redirect()->route('sales.index')->with('success', 'Penjualan berhasil diupdate');
    }
}
