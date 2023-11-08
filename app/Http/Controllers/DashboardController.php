<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Customer;
use App\Models\Data;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        // pashing data
        $customerRow = Customer::all();
        /* $data = Data::all()->count();
        $dataQty = Data::sum('qty');
        $dataPrice = Data::sum('price');
        $dataValue = $dataQty * $dataPrice; */

        // pashing user
        /*   $userRow = User::all();
        $user = User::all()->count();
        $userNew = User::latest()->count(); */

        // category
        /*  $categoryRow = Categories::all();
        $category = Categories::all()->count();
        $categoryNew = Categories::latest()->count(); */

        return view('index', compact(['customerRow']));
    }
}
