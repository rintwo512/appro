<?php

namespace App\Http\Controllers;

use App\Models\ChartAc;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ChartAcController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        // Jika user tidak ditemukan (null), redirect ke halaman login
        if (!$user) {
            return redirect()->route('login');
        }
        // $tahunIni = Carbon::now()->format('Y');
        // $data = ChartAc::where('tahun', $tahunIni)->get();

        $tahunIni = Carbon::now()->format('Y');
        $data = ChartAc::where('tahun', $tahunIni)
            ->orderByRaw("CASE
                                WHEN bulan = 'January' THEN 1
                                WHEN bulan = 'February' THEN 2
                                WHEN bulan = 'March' THEN 3
                                WHEN bulan = 'April' THEN 4
                                WHEN bulan = 'May' THEN 5
                                WHEN bulan = 'June' THEN 6
                                WHEN bulan = 'July' THEN 7
                                WHEN bulan = 'August' THEN 8
                                WHEN bulan = 'September' THEN 9
                                WHEN bulan = 'October' THEN 10
                                WHEN bulan = 'November' THEN 11
                                WHEN bulan = 'Desember' THEN 12
                                ELSE 99
                            END")
            ->get();


        $dataTotalUnit = ChartAc::where('tahun', $tahunIni)->sum('total');

        $month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];


        $listUpdateTahun = DB::table('chart_ac')
            ->select('tahun')
            ->groupBy('tahun')
            ->orderBy('tahun', 'DESC')
            ->get();
        return view('appro.modul_ac.chart_ac', [
            'title' => 'APPRO - Chart AC',
            'listUpdateTahun' => $listUpdateTahun,
            'data' => $data,
            'month' => $month,
            'tahunTerpilih' => '',
            'dataTotalUnit' => intval($dataTotalUnit)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $errorForm =
            [
                'required' => 'Kolom ini tidak boleh kosong!',
                'numeric' => 'Jumlah harus berupa angka!',
                'min' => 'Jumlah minimal 1!',
                'max' => 'Jumlah maximal 150!'
            ];
        $validator = Validator::make($request->all(), [
            'tahun' => 'required|numeric',
            'bulan' => 'required',
            'total' => 'required|numeric|max:250|min:1'
        ], $errorForm);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal menambahkan data!');
        }

        $existingData = ChartAc::where('tahun', $request->tahun)
            ->where('bulan', $request->bulan)
            ->first();

        if ($existingData) {
            return back()->with('error', 'Data already exists!');
        }

        $chart = new ChartAc;
        $chart->tahun = $request->tahun;
        $chart->bulan = $request->bulan;
        $chart->total = $request->total;
        $chart->save();

        return back()->with('success', 'Berhasil tambah data!');
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->idUpdateChart;

        $errorForm =
            [
                'required' => 'Kolom ini tidak boleh kosong!',
                'numeric' => 'Jumlah harus berupa angka!',
                'min' => 'Jumlah minimal 1!',
                'max' => 'Jumlah maximal 150!'
            ];

        $validator = Validator::make($request->all(), [
            'tahunUpdateChart' => 'required|numeric',
            'monthUpdateChart' => 'required',
            'totalUpdateChart' => 'required|numeric|max:250|min:1',
        ], $errorForm);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal update data!');
        }

        $tahun = $request->tahunUpdateChart;
        $bulan = $request->monthUpdateChart;
        $total = $request->totalUpdateChart;

        // Memeriksa apakah data dengan tahun dan bulan yang sama sudah ada
        $existingData = ChartAc::where('tahun', $tahun)
            ->where('bulan', $bulan)
            ->where('id', '!=', $id) // Memastikan data yang dicek bukan data yang sedang diupdate
            ->first();


        if ($existingData) {
            return back()->withInput()->with('error', 'Data dengan tahun dan bulan yang sama sudah ada!');
        }

        // Mendapatkan data lama
        $oldData = ChartAc::find($id);

        // Memeriksa apakah total baru sama dengan total lama
        if ($oldData->total == $total) {
            return back()->withInput()->with('error', 'Data baru tidak boleh sama dengan data lama!');
        }

        // Jika tidak ada data dengan tahun dan bulan yang sama, lakukan pembaruan data
        $validator = [
            'tahun' => $tahun,
            'bulan' => $bulan,
            'total' => $total
        ];

        ChartAc::where('id', $id)->update($validator);

        return back()->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, $tahun)
    {
        ChartAc::where('id', $id)->delete();
        $count = ChartAc::where('tahun', $tahun)->count();
        $total = ChartAc::where('tahun', $tahun)->sum('total');
        return back()->with('success', 'Data berhasil dihapus!');
    }

    public function deleteAllChart(Request $request)
    {
        $tahun = $request->deleteAllChart;

        if (!$tahun) {
            return back()->with('error', 'Anda harus memilih tahun terlebih dahulu!');
        }

        ChartAc::where('tahun', $tahun)->delete();
        return to_route('chart-ac.index')->with('success', 'Data tahun ' . $tahun . ' berhasil dihapus!');
    }


    public function cariTahunChart(Request $request)
    {
        // Ambil data dari request
        $tahunTerpilih = $request->input('updateTahun');

        // Lakukan query berdasarkan tahun terpilih
        $data = ChartAc::where('tahun', $tahunTerpilih)->get();

        // Kembalikan data dalam bentuk JSON
        return response()->json($data);
    }
}
