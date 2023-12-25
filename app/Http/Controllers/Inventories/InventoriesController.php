<?php

namespace App\Http\Controllers\Inventories;

use App\Http\Controllers\Controller;
use App\Models\Inventories;
use Illuminate\Http\Request;

class InventoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Inventories::all();
        return view('inventories.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        Inventories::create([
            'code' => $request->input('code'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
        ]);

        return redirect()->route('datainventories')->with('success', 'Inventory data added successfully.');
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
        $inventories = Inventories::find($id);

        if (!$inventories) {
            return redirect()->route('datainventories')->with('error', 'inventories not found.');
        }

        return view('inventories.edit', ['inventories' => $inventories]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        $inventory = Inventories::find($id);

        if (!$inventory) {
            return redirect()->route('datainventories')->with('error', 'Inventory not found.');
        }

        // Update the inventory data
        $inventory->update([
            'code' => $request->input('code'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
        ]);

        return redirect()->route('datainventories')->with('success', 'Inventory data updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $inventory = Inventories::find($id);

        if (!$inventory) {
            return redirect()->route('datainventories')->with('error', 'Inventory not found.');
        }

        $inventory->delete();

        return redirect()->route('datainventories')->with('success', 'Inventory data deleted successfully.');
    }
}
