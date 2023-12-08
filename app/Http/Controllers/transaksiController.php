<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaksi;
use Illuminate\Support\Facades\Validator;

class transaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $transaksi = Transaksi::orderBy('id', 'desc')->get();
        return view('transaksi')->with(compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nama_customer'=> 'required',
            'id_kendaraan'=> 'required',
            'tgl_mulai'=> 'required',
            'tgl_selesai'=> 'required',
            'harga'=> 'required',
            'status'=> 'required'

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $transaksi= Transaksi::create([
            'nama_customer'=> $request->nama_customer,
            'id_kendaraan'=> $request->id_kendaraan,
            'tgl_mulai'=>$request->tgl_mulai,
            'tgl_selesai'=> $request->tgl_selesai,
            'harga'=> $request->harga,
            'status'=> $request->status,

        ]);

        return response()->json([
            'success' => true,
            'message' => 'Transaksi berhasil disimpan!',
            'data' => $transaksi
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'data'    => $transaksi 
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {

        $validator = Validator::make($request->all(), [
            'title'     => 'required',
            'content'   => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $transaksi->update([
            'title'     => $request->title, 
            'content'   => $request->content
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diudapte!',
            'data'    => $transaksi
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        Transaksi::where('id', $id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data Transaksi Berhasil Dihapus!.',
        ]); 
    }
}
