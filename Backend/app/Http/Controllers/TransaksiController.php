<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Transaksi;
use App\Models\Penjualan;

class TransaksiController extends Controller
{
    public function saveTotal(Request $request){
        $validator = Validator::make($request->all(),[
            'total' => 'required|integer'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 'FAILED',
                'message' => $validator->errors()
            ]);
        }

        $penjualan = Penjualan::create([
            'total' => $request->total
        ]);
        
        if($penjualan){
            return response()->json([
                'status' => 'SUCCESS',
                'message' => 'Successfully input data ! !',
                'data' => $penjualan->id
            ]);
        }else {
            return response()->json([
                'status' => 'FAILED',
                'message' => 'Internal Service Error ! !'
            ]);
        } 
    }

    public function saveTrx(Request $request){
        $validator = Validator::make($request->all(),[
            'id_barang' => 'required|integer',
            'id_penjualan' => 'required|integer',
            'jumlah' => 'required|integer',
            'sub_total' => 'required|integer'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 'FAILED',
                'message' => $validator->errors()
            ]);
        }

        $transaksi = Transaksi::create([
            'id_barang' => $request->id_barang,
            'id_penjualan' => $request->id_penjualan,
            'jumlah' => $request->jumlah,
            'sub_total' => $request->sub_total
        ]);

        if($transaksi){
            return response()->json([
                'status' => 'SUCCESS',
                'message' => 'Successfully input data ! !',
            ]);
        }else {
            return response()->json([
                'status' => 'FAILED',
                'message' => 'Internal Service Error ! !'
            ]);
        } 
    }
}
