<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Barang;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Models\PesananDetail;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PesananController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $barang = Barang::where('id', $id)->first();
        return view('pesan.index', ['barang' => $barang]);
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
    public function store(Request $request, $id)
    {
        $validator = $this->validate($request, [
            'ukuran' => 'required'
        ]);

        $barang = Barang::where('id', $id)->first();
        
        // cek validasi: jika pesanan yang berstatus 0 di user itu sudah ada, maka tidak usah buat <INI> langsung ke <SINI>
        $cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        // simpan ke DB Pesanan <INI>   
        if(empty($cek_pesanan)) {
            $pesanan = new Pesanan;
            $pesanan->user_id = Auth::user()->id;
            $pesanan->tanggal = Carbon::now();
            $pesanan->status = 0;
            $pesanan->jumlah_harga = 0;
            $pesanan->save();
        }

        // simpan ke DB PesananDetail <SINI>
        // ambil id pesanan yang sudah tersimpan diatas 
        $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        // cek pesanan detail
        $cek_pesanan_detail = PesananDetail::where('barang_id', $barang->id)->where('pesanan_id',  $pesanan_baru->id)->first();
        if(empty($cek_pesanan_detail)) {
            $pesanan_detail = new PesananDetail;
            $pesanan_detail->barang_id = $barang->id;
            $pesanan_detail->pesanan_id = $pesanan_baru->id;
            $pesanan_detail->ukuran = $request->ukuran;
            $pesanan_detail->jumlah = $request->jumlah_pesan;
            $pesanan_detail->jumlah_harga = $barang->harga * $request->jumlah_pesan;
            $pesanan_detail->save();
        } else {
            $pesanan_detail = PesananDetail::where('barang_id', $barang->id)->where('pesanan_id',  $pesanan_baru->id)->first();
            $pesanan_detail->jumlah += $request->jumlah_pesan;

            // harga sekarang = harga yang sudah ada + dengan harga sekarang;
            // $harga_pesanan_detail_baru = $barang->harga * $request->jumlah_pesan;
            // $pesanan_detail->jumlah_harga =  $pesanan_detail->jumlah_harga + $harga_pesanan_detail_baru;
            $pesanan_detail->jumlah_harga += $barang->harga * $request->jumlah_pesan;
            $pesanan_detail->update();
        }

        // jumlah total
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan->jumlah_harga += $barang->harga * $request->jumlah_pesan;
        $pesanan->update();

        Alert::success('Success', 'Sukses memasukkan item ke keranjang');
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pesanan $pesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesanan $pesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pesanan $pesanan)
    {
        //
    }

    public function checkout() 
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan_details = null;
        if(!empty($pesanan)) {
            $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
        }

        return view('pesan.checkout', ['pesanan'=>$pesanan, 'pesanan_details'=>$pesanan_details]);
    }

    public function delete($id) 
    {
        $pesanan_detail = PesananDetail::where('id', $id)->first();

        $pesanan = Pesanan::where('id', $pesanan_detail->pesanan_id)->first();
        $pesanan->jumlah_harga -= $pesanan_detail->jumlah_harga;
        $pesanan->update();

        $pesanan_detail->delete();
        if(PesananDetail::where('id', $id)->count() == 0) {
            $pesanan->delete();
        }

        Alert::success('Pesanan sukses di hapus', 'Success');
        return redirect('/checkout');
    }

    public function confirm() 
    {
        $user = User::where('id', Auth::user()->id)->first();

        if(empty($user->alamat) || empty($user->noHp)) {
            Alert::error('Lengkapi Data Dirimu lebih dulu');
            return redirect('/profile');
        }

        $pesanan = Pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();
        $pesanan->status = 1;
        $pesanan->update();

        $pesanan_details = PesananDetail::where('pesanan_id',$pesanan->id)->get();
        foreach ($pesanan_details as $pesanan_detail) {
            $barang = Barang::where('id', $pesanan_detail->barang_id)->first();
            $barang->stok -= $pesanan_detail->jumlah;
            $barang->update();
        }

        Alert::success('Pesanan sukses di checkout', 'Success');
        return redirect('/checkout');
    }
}
