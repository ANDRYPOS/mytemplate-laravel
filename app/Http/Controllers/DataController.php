<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Customer;
use App\Models\Data;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DataController extends Controller
{
    //view data
    public function customer()
    {
        $data = Customer::all();
        return view('data.data', compact(['data']));
    }

    //view page insert
    public function insert()
    {
        $customer = Customer::all();
        $user = User::all();
        return view('data.insert-data', compact(['customer', 'user']));
    }


    public function store(Request $request)
    {

        /* dd($request->all()); */
        // ambil request input
        $namaCustomer = $request->name;
        $alamat = $request->alamat;
        $tlp = $request->tlp;
        $fax = $request->fax;
        $email = $request->email;
        $id_customer = $request->id_customer;


        // cek ke database apakah data sudah ada
        $cekDB = Customer::where('id_customer', '=', $namaCustomer)->count();

        // eksekusi kondisi
        if (!$cekDB) {
            // jika nama belum digunakan maka lanjutkan insert
            $customer = Customer::create([
                'id_customer' => $id_customer,
                'nama_customer' => $namaCustomer,
                'alamat' => $alamat,
                'telp' => $tlp,
                'fax' => $fax,
                'email' => $email,
            ]);
            return redirect('/data-customer')->with('toast_success', 'Data Saved Successfully');
        }
        return redirect('/data-customer')->with('toast_success', 'Data Not Saved');
    }

    //edit data view form
    public function edit($id)
    {
        $customer = Customer::where('id_customer', $id)->get();
        // dd($data);

        return view('data.edit-data', compact(['customer']));
    }

    // update
    public function update(Request $request)
    {

        // get user berdasarkan id
        $users = Customer::where('id_customer', $request->id_customer)->first();
        // dd($users);

        // update data
        $users->update([
            'nama_customer' => $request->nama_customer,
            'alamat' => $request->alamat,
            'telp' => $request->tlp,
            'fax' => $request->fax,
            'email' => $request->email,
        ],);

        return redirect('/data-customer')->with('toast_success', 'Data Successfully Updated');
    }

    // delete
    public function destroy($id_customer)
    {
        $data = Customer::where('id_customer', $id_customer);

        // delete data pada databsae
        $data->delete();
        return redirect('/data-customer')->with('toast_success', 'Data Deleted Successfully');
    }
}
