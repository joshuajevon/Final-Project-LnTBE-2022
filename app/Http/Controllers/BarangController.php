<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Faktur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    public function insert(){
        $barangs = Barang::all();
        return view('insert', ['barangs' => $barangs]);
    }

    public function viewuser(){
        $barangs = Barang::get();
        return view('viewuser', ['barangs' => $barangs]);
    }

    public function view(){
        $barangs = Barang::get();
        return view('view', ['barangs' => $barangs]);
    }

    public function insertBarang(Request $request){
        $request->validate([
            'kategoriBarang' => 'required|string',
            'namaBarang' => 'required|string|min:5|max:80',
            'hargaBarang' => 'required|numeric',
            'jumlahBarang' => 'required|numeric',
            'fotoBarang' => 'required',
        ]);

        $extension = $request->file('fotoBarang')->getClientOriginalExtension();
        $fileName = $request->namaBarang.'_'.$request->kategoriBarang.'.'.$extension;
        $request->file('fotoBarang')->storeAs('public/image/',$fileName);

        Barang::create([
            'kategoriBarang' => $request->kategoriBarang,
            'namaBarang' => $request->namaBarang,
            'hargaBarang' => $request->hargaBarang,
            'jumlahBarang' => $request->jumlahBarang,
            'fotoBarang' => $fileName,
        ]);
        return redirect(route('view'));
    }

    public function updateBarang($id){
        $barang = Barang::find($id);
        return view('update', ['barang' => $barang]);
    }

    public function update(Request $request, $id){
        $barang = Barang::find($id);
        $request->validate([
            'kategoriBarang' => 'required|string',
            'namaBarang' => 'required|string|min:5|max:80',
            'hargaBarang' => 'required|numeric',
            'jumlahBarang' => 'required|numeric',
            'fotoBarang' => 'required',
        ]);

        $extension = $request->file('fotoBarang')->getClientOriginalExtension();
        $fileName = $request->namaBarang.'_'.$request->kategoriBarang.'.'.$extension;
        $request->file('fotoBarang')->storeAs('public/image/',$fileName);


        $barang->update([
            'kategoriBarang' => $request->kategoriBarang,
            'namaBarang' => $request->namaBarang,
            'hargaBarang' => $request->hargaBarang,
            'jumlahBarang' => $request->jumlahBarang,
            'fotoBarang' => $fileName,
        ]);
        return redirect(route('view'));
    }

    public function delete($id){
        if(Auth::user()->iniAdmin == 'user') return back();
        Barang::destroy($id);
        return redirect(route('view'));
    }

    public function cetakfaktur(Request $request, $id){

        $request->validate([
            'alamat' => 'required|string|min:10|max:100',
            'kodePos' => 'required|integer|min:5',
        ]);

        a:
        $projectCount = rand(1000, 9999);
        $rand_word_invoice = 'INV-'. str_pad($projectCount, 5, '0', STR_PAD_LEFT) .'-'."user";
        $check_same_invoice = Faktur::where('noInvoice', $rand_word_invoice)->first();

        if($check_same_invoice == null){
            $invoice = $rand_word_invoice;
        }else{
            goto a;
        }
        $barang = Barang::find($id);
        $user = Auth::user()->id;
        $total_harga = $request->jumlahBarang * $barang->hargaBarang;

        Faktur::create([
            'noInvoice' => $invoice,
            'idUser' => $user,
            'idBarang' => $id,
            'kategoriBarang' => $request->kategoriBarang,
            'namaBarang' => $request->namaBarang,
            'totalHarga' => $total_harga,
            'jumlahBarang' => $request->jumlahBarang,
            'alamat' => $request->alamat,
            'kodePos' => $request->kodePos,
        ]);
        return redirect(route('view'));
    }

    public function faktur($id){
        $barang = Barang::find($id);
        return view('cetak', ['barang'=>$barang]);
    }
}
