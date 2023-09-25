<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class Masuk extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['show', 'index']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = BarangMasuk::all();
        return response()->json($barang);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $barang = $request->input();
        foreach ($barang['masuk'] as $key => $value) {
            $masuk = new BarangMasuk;
            $masuk->namaBarang = $value['namaBarang'];
            $masuk->merekBarang = $value['merekBarang'];
            $masuk->save();
        }

        return response()->json([
            'message' => 'data has inputed'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $barang =BarangMasuk::find($id);
        return response()->json($barang);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $barang = BarangMasuk::find($id);
        $barang->namaBarang = $request->namaBarang;
        $barang->merekBarang = $request->merekBarang;
        $barang->save();

        return response()->json('data success');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $destroy = BarangMasuk::find($id);
        $destroy->delete();

        return response()->json('data has been deleted');
    }

}
