<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::all();

        return view('voucher.index', compact('vouchers'));
    }

    public function create()
    {
        return view('voucher.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'code' => 'required|unique:voucher',
            'discount' => 'required|numeric|min:0|max:100',
            'sl' => 'required|numeric|min:1|',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $voucher = new Voucher($data);
        $voucher->save();
        return redirect()->route('voucher.index')->with('success', 'Voucher created successfully');
    }
    public function destroy($id)
{
    $voucher = Voucher::findOrFail($id);
    $voucher->delete();

    return redirect()->route('voucher.index')->with('success', 'Voucher deleted successfully.');
}

// Update a voucher
public function update($id, Request $request)
{
    $voucher = Voucher::findOrFail($id);
    $voucher->update($request->all());

    return redirect()->route('voucher.index')->with('success', 'Voucher updated successfully.');
}
public function edit(Voucher $voucher)
{

    return view('voucher.edit', ['voucher' => $voucher]);
}

}
