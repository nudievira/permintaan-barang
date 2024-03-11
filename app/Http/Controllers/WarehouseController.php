<?php

namespace App\Http\Controllers;

use App\Location;
use App\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class WarehouseController extends Controller
{
    public function listLocation()
    {
        return view('warehouse.indexLocation');
    }
    public function dataTableLocation(Request $request)
    {
        $location = Location::all();
        if ($request->ajax()) {
            $data_table = DataTables::of($location)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {

                    $btn = ' <a href="' . route('warehouse.listProduct', ['id' => $data->id]) . '" class="btn btn-sm btn-outline-primary" ><i class="fas fa-eye"></i> Detail</i></a>
                        ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
            return $data_table;
        }
    }

    public function listProduct($id)
    {
        return view('warehouse.indexProduct', compact('id'));
    }

    public function dataTableProduct(Request $request)
    {
        $location = Product::with(['categoryProduct'])->whereHas('location', function ($query) use ($request) {
            return $query->where('id', $request->id);
        })
        ->get();
        if ($request->ajax()) {
            $data_table = DataTables::of($location)
                ->addIndexColumn()
                ->make(true);
            return $data_table;
        }
    }

}
