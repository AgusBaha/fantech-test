<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Models\Inventories;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use App\Models\User;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Purchase::all();
        return view('purchase.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data_user = User::all();
        return view('purchase.create', compact('data_user'));
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

        Purchase::create([
            'number' => $request->input('number'),
            'date' => $request->input('date'),
            'user_id' => $request->input('user_id'),
        ]);

        return redirect()->route('purchase.index')->with('success', 'Data Berhasil ditambahkan');
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
    public function edit(string $id)
    {
        $purchase = Purchase::findOrFail($id);
        $data_user = User::all();

        return view('purchase.edit', compact('purchase', 'data_user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data dari $request
        $request->validate([
            'number' => 'required|numeric',
            'date' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);

        $purchase = Purchase::findOrFail($id);

        $purchase->update([
            'number' => $request->input('number'),
            'date' => $request->input('date'),
            'user_id' => $request->input('user_id'),
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('purchase.index')->with('success', 'Penjualan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $purchase = Purchase::findOrFail($id);

        $purchase->delete();

        return redirect()->route('purchase.index')->with('success', 'Penjualan berhasil dihapus.');
    }

    public function detail($id)
    {
        $data = Inventories::all();
        $purchase = Purchase::find($id);

        if (!$purchase) {
            return abort(404);
        }

        $purchaseDetail = PurchaseDetail::where('purchase_id', $purchase->id)->first();

        if ($purchaseDetail) {
            return view('purchase.detailPurchase.update', compact('purchase', 'data', 'purchaseDetail'));
        }

        return view('purchase.detailPurchase.create', compact('purchase', 'data'));
    }

    public function storeDetail(Request $request)
    {
        // Validasi data dari $request
        $request->validate([
            'inventories_id' => 'required|exists:inventories,id',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        PurchaseDetail::create([
            'purchase_id' => $request->input('purchase_id'),
            'inventory_id' => $request->input('inventories_id'),
            'qty' => $request->input('qty'),
            'price' => $request->input('price'),
        ]);

        return redirect()->route('purchase.index')->with('success', 'Detail penjualan berhasil disimpan.');
    }

    public function detailUpdate(Request $request, $id)
    {
        // Validasi data dari $request
        $request->validate([
            'inventories_id' => 'required|exists:inventories,id',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        $purchase = PurchaseDetail::find($id);

        if (!$purchase) {
            return abort(404);
        }

        $purchase->update([
            'purchase_id' => $request->input('purchase_id'),
            'inventory_id' => $request->input('inventories_id'),
            'qty' => $request->input('qty'),
            'price' => $request->input('price'),
        ]);

        return redirect()->route('purchase.index')->with('success', 'Penjualan berhasil diupdate');
    }
}
