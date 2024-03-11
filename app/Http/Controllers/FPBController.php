<?php

namespace App\Http\Controllers;

use App\FPB;
use App\FpbItem;
use App\Helpers\CurrentTimestamp;
use App\Product;
use App\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Yajra\DataTables\Facades\DataTables;

class FPBController extends Controller
{
    public function index()
    {
        return view('fpb.index');
    }
    public function dataTable(Request $request)
    {
        $fpb_data = FPB::with([
            'user.departement'
        ])
            ->get();
        if ($request->ajax()) {
            $data_table = DataTables::of($fpb_data)
                ->addIndexColumn()
                ->addColumn('date_formater', function($data) {
                    $date_formater = CurrentTimestamp::convertDate($data->date_request);
                    return $date_formater;
                })
                ->addColumn('status', function ($data) {
                    if ($data->status == 10) {
                        $status = '<span class="badge bg-success">Diterima</span>';
                    } else {
                        $status = '<span class="badge bg-info">Prosses</span>';
                    }
                    return $status;
                })

                ->addColumn('action', function ($data) {

                    $btn = ' <a href="' . route('fpb.show', ['id' => $data->id]) . '" class="btn btn-sm btn-outline-primary" ><i class="fas fa-eye"></i> Detail</i></a>
                    <a href="' . route('fpb.print', ['id' => $data->id]) . '" class="btn btn-sm btn-outline-danger" ><i class="fas fa-print"></i> Print</i></a>
                        ';
                    return $btn;
                })
                ->rawColumns(['action', 'status', 'date_formater'])
                ->make(true);
            return $data_table;
        }
    }

    public function create()
    {
        $user = User::where('status', 10)->where('role', 1)->get();
        $product = Product::all();
        return view('fpb.create', compact('user', 'product'));
    }

    public function getUser(Request $request)
    {
        $user = User::where('id', $request->id)->with(['departement'])->first();
        return $user;
    }

    public function getProduct(Request $request)
    {
        $product = Product::where('id', $request->id)->with(['location', 'categoryProduct'])->first();
        return $product;
    }

    public function store(Request $request)
    {

        $request->validate(
            [
                'idUser' => 'required',
                'dateRequest' => 'required',
            ],

            [
                'idUser.required' => 'Mohon pilih salah satu NIK Karyawan',
                'dateRequest.required' => 'Tanggal tidak boleh kosong',
            ]
        );

        try {
            DB::beginTransaction();
            $find_id = FPB::latest('id')->first();

            if (is_null($find_id)) {
                $find_id = 0;
            } else {
                $find_id = $find_id->id;
            }

            $id_plus_one = $find_id + 1;

            // Format ID dengan padding nol sebanyak empat digit
            $formatted_id = sprintf('%04d', $id_plus_one);

            // Format tanggal dengan format YYMMDD
            $formatted_date = date('ymd');

            // Gabungkan ID dan tanggal
            $increment = $formatted_id . '.' . $formatted_date;

            $product = $request->idProduct;
            $qty_delivery = $request->qtyDelivery;
            $note = $request->note;
            $date_request = $request->dateRequest;
            $date_request = \DateTime::createFromFormat('d/m/Y', $date_request)->format('Y-m-d H:i:s');
            $fpb_create = FPB::lockforUpdate()->create([
                'no_fpb' => $increment,
                'date_request' => $date_request,
                'status' => 10,
                'user_id' => $request->idUser,
                'created_by' => auth()->user()->id,
                'created_at' => Carbon::now(),
            ]);

            $data_product = [];

            for ($i = 0; $i < count($product); $i++) {
                $data_product[] = [
                    'qty' => $qty_delivery[$i],
                    'note' => $note[$i],
                    'fpb_id' => $fpb_create->id,
                    'product_id' => $product[$i],
                ];
            }
            if ($fpb_create) {
                $item_fpb = FpbItem::lockforUpdate()->insert($data_product);
            }

            foreach ($product as $key => $id) {
                $qty = $qty_delivery[$key];

                // Ambil produk dari database berdasarkan ID
                $product = Product::find($id);

                // Periksa apakah produk ditemukan
                if ($product) {
                    // Kurangi stok produk
                    $product->qty -= $qty;

                    // Simpan perubahan
                    $product->save();
                }
            }
            DB::commit();
            return redirect()->back()->with('success_access', 'FPB berhasil dibuat.');
        } catch (Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function show($id)
    {
        $fpb = FPB::where('id', $id)->with([
            'fpbItem.product.location',
            'user.departement'
        ])->first();
        return view('fpb.detail', compact('fpb'));
    }

    public function print($id)
    {
        $fpb = FPB::where('id', $id)->with([
            'fpbItem.product.location',
            'user.departement'
        ])->first();
        $pdf = Pdf::loadView('fpb.print', compact('fpb'));
        $pdf->setPaper('A4', 'potrait'); // Atur ukuran kertas dan orientasi
        $name_pdf = $fpb->no_fpb;
        $extenison = '.pdf';
        $combined = $name_pdf . $extenison;
        return $pdf->stream($combined);

    }
}
