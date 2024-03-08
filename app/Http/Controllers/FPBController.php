<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;

class FPBController extends Controller
{
    public function index()
    {
        return view ('fpb.index');
    }
    public function dataTable(Request $request)
    {
        dd('asd');
    }

    public function create()
    {
        $user = User::where('status', 10)->where('role', 1)->get();
        $product = Product::with(['location','categoryProduct'])->get();
        return view('fpb.create', compact('user','product'));
        
    }

    public function getUser(Request $request)
    {
        $user = User::where('id', $request->id)->with(['departement'])->first();
        return $user;

    }
}
