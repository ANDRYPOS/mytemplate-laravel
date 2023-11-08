<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //
    public function item()
    {
        $item = Item::all();
        return view('item.item', compact(['item']));
    }

    public function insert()
    {
        return view('item.insert-item');
    }

    public function store(Request $request)
    {
        $message = [
            'required' => 'Cannot be empty!',
            'min' => 'Minimum 2 characters',
            'numeric' => 'Must contain numbers',
            'mimes' => 'File format not found : jpeg,png,jpg',
            'max' => 'Maximum 2 MB'
        ];

        $request->validate(
            [
                'id_item' => 'required|numeric|unique:item,id_item',
                'nama_item' => 'required',
                'uom' => 'required',
                'harga_beli' => 'required',
                'harga_jual' => 'required',
            ],
            $message
        );

        $iditem = $request->id_item;
        $nama_item = $request->nama_item;
        $uom = $request->uom;
        $harga_beli = $request->harga_beli;
        $harga_jual = $request->harga_jual;

        // cek ke database apakah data sudah ada
        $cekDB = Item::where('id_item', '=', $iditem)->count();

        // eksekusi kondisi
        if (!$cekDB) {
            // jika nama belum digunakan maka lanjutkan insert
            $customer = Item::create([
                'id_item' => $iditem,
                'nama_item' => $nama_item,
                'uom' => $uom,
                'harga_beli' => $harga_beli,
                'harga_jual' => $harga_jual,
            ]);
            return redirect('/item')->with('toast_success', 'Data Saved Successfully');
        }
        return redirect('/item')->with('toast_success', 'Data Not Saved');
    }

    public function edit($id)
    {
        $item = Item::where('id_item', $id)->get();

        return view('item.edit-item', compact(['item']));
    }

    public function update(Request $request)
    {

        // get user berdasarkan id
        $users = Item::where('id_item', $request->id_item)->first();
        // dd($users);

        // update data
        $users->update([
            'id_item' => $request->id_item,
            'nama_item' => $request->nama_item,
            'uom' => $request->uom,
            'harga_beli' =>  $request->harga_beli,
            'harga_jual' => $request->harga_jual,
        ],);

        return redirect('/item')->with('toast_success', 'Data Successfully Updated');
    }

    public function destroy($id_item)
    {
        $sales = Item::where('id_item', $id_item);

        // delete data pada databsae
        $sales->delete();
        return redirect('/item')->with('toast_success', 'Data Deleted Successfully');
    }
}
