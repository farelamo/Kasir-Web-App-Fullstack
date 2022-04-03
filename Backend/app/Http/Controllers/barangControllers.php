<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Validator;
use App\Http\Resources\barangResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class barangControllers extends Controller
{

    public function search($keyword){
        $data = Barang::where('nama', 'LIKE', '%'. $keyword .'%')->get();
        if($data){
            if(count($data) > 0){
                return response()->json([
                    'status' => 'SUCCESS',
                    'message' => 'Successfully get data ! !',
                    'data' => $data
                ]);
            }else {
                return response()->json([
                    'status' => 'FAILED',
                    'message' => 'invalid, No data with keyword ' . $keyword . ' ! !'
                ]);
            }
        }else {
            return response()->json([
                'status' => 'FAILED',
                'message' => 'Internal Service Error ! !'
            ]);
        } 
    }

    public function index()
    {
        $data = Barang::paginate(5);
        if($data){
            if(count($data) > 0){
                return response()->json([
                    'status' => 'SUCCESS',
                    'message' => 'Successfully get data ! !',
                    'data' => $data
                ]);
            }else {
                return response()->json([
                    'status' => 'FAILED',
                    'message' => 'invalid, data is empty ! !'
                ]);
            }
        }else {
            return response()->json([
                'status' => 'FAILED',
                'message' => 'Internal Service Error ! !'
            ]);
        } 
    }

    public function getAll()
    {
        $data = Barang::all();
        if($data){
            if(count($data) > 0){
                return response()->json([
                    'status' => 'SUCCESS',
                    'message' => 'Successfully get data ! !',
                    'data' => $data
                ]);
            }else {
                return response()->json([
                    'status' => 'FAILED',
                    'message' => 'invalid, data is empty ! !'
                ]);
            }
        }else {
            return response()->json([
                'status' => 'FAILED',
                'message' => 'Internal Service Error ! !'
            ]);
        } 
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama' => 'required|string|max:100',
            'harga' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 'FAILED',
                'message' => $validator->errors()
            ]);
        }
        $data = Barang::create($request->all());
        if($data){
            return response()->json([
                'status' => 'SUCCESS',
                'message' => 'Successfully insert data ! !',
                'data' => $data,
                'jumlah' => Barang::count()
            ]);
        }else {
            return response()->json([
                'status' => 'FAILED',
                'message' => 'Internal Service Error ! !'
            ]);
        } 
    }

    public function edit(Request $request, $id)
    {
        $data = Barang::findOrFail($id);
        if($data){
            return response()->json([
                'status' => 'SUCCESS',
                'message' => 'Successfully get data with id ' . $id .' ! !',
                'data' => $data
            ]);
        }else {
            return response()->json([
                'status' => 'FAILED',
                'message' => 'Internal Service Error ! !'
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $data = Barang::findOrFail($id);
        if($data){
           $data->update($request->all());
            return response()->json([
                'status' => 'SUCCESS',
                'message' => 'Successfully update data with id ' . $id .' ! !'
            ]);
        }else {
            return response()->json([
                'status' => 'FAILED',
                'message' => 'Internal Service Error ! !'
            ]);
        }
    }

    public function destroy(Request $request, $id)
    {
        $data = Barang::findOrFail($id);
        if($data){
            $data->delete();
            return response()->json([
                'status' => 'SUCCESS',
                'message' => 'Successfully delete data with ' . $id . ' ! !'
            ]);
        }else {
            return response()->json([
                'status' => 'FAILED',
                'message' => 'Internal Service Error ! !'
            ]);
        }
    }
}
