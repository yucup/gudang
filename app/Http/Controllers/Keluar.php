<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class Keluar extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['show','index']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keluar = BarangKeluar::orderBy('namaBarang','asc')->get();
        return response()->json([
            'message' => $keluar
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $barang = $request->input();
        foreach ($barang['masuk'] as $key => $value) {

            $masuk = new BarangKeluar;
            $masuk->namaBarang = $value['namaBarang'];
            $masuk->merekBarang = $value['merekBarang'];
            $masuk->save();
        }
        return response()->json(['data' => 'data masuk']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = BarangKeluar::find($id);
        return response()->json([
            'message' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $keluar = BarangKeluar::find($id);
            $keluar->namaBarang = $request->namaBarang;
            $keluar->merekBarang = $request->merekBarang;
            $keluar->save();
            
        return response()->json([
            'message' => 'data has updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = BarangKeluar::find($id);
        $barang->delete();

        return response()->json([
            'message' => 'data has deleted'
        ]);
    }
}
