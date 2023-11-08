<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    //
    public function sales()
    {
        $sales = Sales::all();
        return view('sales.sales', compact(['sales']));
    }
    public function insert()
    {
        $customer = Customer::all();
        return view('sales.insert-sales', compact(['customer']));
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
                'id_sales' => 'required',
                'id_customer' => 'required',
                'do_number' => 'required|numeric',
                'status' => 'required',
            ],
            $message
        );

        $idsales = $request->id_sales;
        $customer = $request->id_customer;
        $do = $request->do_number;
        $status = $request->status;

        // cek ke database apakah data sudah ada
        $cekDB = Sales::where('id_sales', '=', $idsales)->count();

        // eksekusi kondisi
        if (!$cekDB) {
            // jika nama belum digunakan maka lanjutkan insert
            $customer = Sales::create([
                'id_sales' => $idsales,
                'id_customer' => $customer,
                'do_number' => $do,
                'tgl_sales' => now(),
                'status' => $status,
            ]);
            return redirect('/sales')->with('toast_success', 'Data Saved Successfully');
        }
        return redirect('/sales')->with('toast_success', 'Data Not Saved');
    }

    public function edit($id)
    {
        $sales = Sales::where('id_sales', $id)->get();
        $customer = Customer::all();
        return view('sales.edit-sales', compact(['sales', 'customer']));
    }
    public function update(Request $request)
    {

        // get user berdasarkan id
        $users = Sales::where('id_sales', $request->id_sales)->first();
        // dd($users);

        // update data
        $users->update([
            'id_sales' => $request->id_sales,
            'id_customer' => $request->id_customer,
            'do_number' => $request->do_number,
            'tgl_sales' =>  $request->tgl_sales,
            'status' => $request->status,
        ],);

        return redirect('/sales')->with('toast_success', 'Data Successfully Updated');
    }

    public function destroy($id_sales)
    {
        $sales = Sales::where('id_sales', $id_sales);

        // delete data pada databsae
        $sales->delete();
        return redirect('/sales')->with('toast_success', 'Data Deleted Successfully');
    }
}
