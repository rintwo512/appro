<?php

namespace App\Http\Controllers;

use App\Models\Ac;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\User;
use App\Models\ChartAc;
use App\Exports\exportAc;
use App\Models\DatasheetAc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class AcController extends Controller
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
        // Mendapatkan data ac beserta datasheet_ac-nya
        // $ac = Ac::with('datasheetAc')->find(1);
        // $datasheet = $ac->datasheetAc;
        // dd($datasheet);
        $ac = Ac::with('datasheetAc')->get();
        $id = Auth::id(); // Mendapatkan ID pengguna yang sedang login
        $user = User::find($id);
        $btnCreateAc = $user->features1()->where('name', 'Tambah AC')->first();
        $btnEditAc = $user->features1()->where('name', 'Edit AC')->first();
        $btnDetailAc = $user->features1()->where('name', 'Detail AC')->first();
        $btnDeleteAc = $user->features1()->where('name', 'Delete AC')->first();
        return view('appro.modul_ac.index', [
            'title' => 'APPRO - Data AC',
            'datas' => $ac,
            'btnCreate' => $btnCreateAc,
            'btnEdit' => $btnEditAc,
            'btnDetail' =>  $btnDetailAc,
            'btnDelete' => $btnDeleteAc,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('appro.modul_ac.create', [
            'title' => 'APPRO - Create Data AC',
            'petugas' => User::pluck('name'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $errorForm =
            [
                'required' => 'Kolom ini tidak boleh kosong!'
            ];
        try {
            $validator = Validator::make($request->all(), [
                'wing' => 'required',
                'lantai' => 'required',
                'ruangan' => 'required|min:2',
                'merk' => 'required',
                'type' => 'required',
                'jenis' => 'required',
                'daya_pk' => 'required',
                'refrigerant' => 'required',
                'phase' => 'required',
                'status' => 'required'
            ], $errorForm);

            $validator->sometimes('seri_indoor', 'unique:datasheet_ac,NULL', function ($input) {
                return $input->seri_indoor !== null;
            });

            $validator->sometimes('seri_outdoor', 'unique:datasheet_ac,NULL', function ($input) {
                return $input->seri_outdoor !== null;
            });

            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput()
                    ->with('error', 'Gagal menambah data!');
            }

            $petugas_maint = '';

            if ($request->petugas_maint != null) {

                $petugas_maint = implode(',', $request->petugas_maint);
            }

            // Mulai transaksi
            DB::beginTransaction();

            try {
                // Simpan data ke tabel 'ac'
                $ac = Ac::create([
                    'user_id' => Auth::id(),
                    'id_ac' => $request->id_ac === null ? $request->id_ac : 'TR7' . $request->wing . $request->lantai . $request->id_ac,
                    'asset' => $request->asset,
                    'wing' => $request->wing,
                    'lantai' => $request->lantai,
                    'ruangan' => $request->ruangan,
                    'merk' => $request->merk,
                    'type' => $request->type,
                    'jenis' => $request->jenis,
                    'catatan' => $request->catatan,
                    'kerusakan' => $request->kerusakan,
                    'keterangan' => $request->keterangan,
                    'status' => $request->status,
                    'tgl_pemasangan' => $request->tgl_pemasangan,
                    'petugas_pemasangan' => $request->petugas_pemasangan,
                    'tgl_maintenance' => $request->tgl_maintenance,
                    'petugas_maint' => $petugas_maint,
                ]);

                // Simpan data ke tabel 'datasheet_ac' dengan menggunakan ID dari 'ac' yang baru saja dibuat
                $datasheetAc = new DatasheetAc([
                    'daya_pk' => $request->daya_pk,
                    'daya_listrik' => $request->daya_listrik !== null && $request->daya_listrik !== '0' ? $request->daya_listrik . $request->daya_listrik_satuan : '',
                    'refrigerant' => $request->refrigerant,
                    'product' => $request->product,
                    'current' => $request->current !== null ? $request->current . $request->current_satuan : '',
                    'phase' => $request->phase,
                    'daya_pendingin' => $request->daya_pendingin !== null && $request->daya_pendingin !== '0' ? $request->daya_pendingin . $request->daya_pendingin_satuan : '',
                    'pipa' => $request->pipa,
                    'seri_indoor' => $request->seri_indoor,
                    'seri_outdoor' => $request->seri_outdoor,
                    'berat_indoor' => $request->berat_indoor !== null && $request->berat_indoor !== '0' ? $request->berat_indoor : '',
                    'berat_outdoor' => $request->berat_outdoor !== null && $request->berat_outdoor !== '0' ? $request->berat_outdoor : '',
                    'dimensi_indoor' => $request->dimensi_indoor,
                    'dimensi_outdoor' => $request->dimensi_outdoor,
                    'kebisingan_indoor' => $request->kebisingan_indoor,
                    'kebisingan_outdoor' => $request->kebisingan_outdoor,
                ]);
                $ac->datasheetAc()->save($datasheetAc);

                // Commit transaksi
                DB::commit();

                return to_route('index.ac')->with('success', 'Data berhasil ditambahkan!');
            } catch (\Exception $e) {
                // Rollback transaksi jika terjadi kesalahan
                DB::rollBack();

                // Tangkap kesalahan
                return back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
            }
        } catch (QueryException $e) {
            // Tangkap kesalahan unik (duplicate entry)
            if ($e->getCode() === '23000') {
                return back()->withInput()->with('error', 'ID perangkat sudah digunakan.');
            }

            // Tangkap kesalahan lainnya
            return back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Ac $ac)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ac $ac)
    {
        $dayaPendingin = preg_replace("/[^0-9.]/", "", $ac->datasheetAc->daya_pendingin);
        $dayaListrik = preg_replace("/[^0-9.]/", "", $ac->datasheetAc->daya_listrik);
        $dayaAmper = preg_replace("/[^0-9.]/", "", $ac->datasheetAc->current);
        return view('appro.modul_ac.edit', [
            'title' => 'APPRO - Update Data AC',
            'data' => $ac,
            'petugas' => User::pluck('name'),
            'dayaPendingin' => $dayaPendingin,
            'dayaListrik' => $dayaListrik,
            'dayaAmper' => $dayaAmper,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, Ac $ac)
    {

        $errorForm = [
            'required' => 'Kolom ini tidak boleh kosong!'
        ];

        try {
            $validator = Validator::make($request->all(), [
                'wing' => 'required',
                'lantai' => 'required',
                'ruangan' => 'required|min:2',
                'merk' => 'required',
                'type' => 'required',
                'jenis' => 'required',
                'daya_pk' => 'required',
                'refrigerant' => 'required',
                'phase' => 'required',
                'status' => 'required'
            ], $errorForm);

            // Validasi kolom-kolom yang bersyarat menggunakan Validator::sometimes
            $validator->sometimes('seri_indoor', 'unique:datasheet_ac,NULL', function ($input) use ($ac) {
                return $ac->datasheetAc->seri_indoor != $input->seri_indoor && !empty($input->seri_indoor);
            });

            $validator->sometimes('seri_outdoor', 'unique:datasheet_ac,NULL', function ($input) use ($ac) {
                return $ac->datasheetAc->seri_outdoor != $input->seri_outdoor && !empty($input->seri_outdoor);
            });

            $validator->sometimes('id_ac', 'unique:ac,NULL', function ($input) use ($ac) {
                return $ac->id_ac != $input->id_ac && !empty($input->id_ac);
            });

            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput()
                    ->with('error', 'Gagal update data!');
            }

            // Mulai transaksi
            DB::beginTransaction();

            try {
                // Simpan data ke tabel 'ac'
                $ac->user_id = Auth::id();
                $ac->id_ac = $request->id_ac === null ? $request->id_ac : 'TR7' . $request->wing . $request->lantai . $request->id_ac;
                $ac->asset = $request->asset;
                $ac->wing = $request->wing;
                $ac->lantai = $request->lantai;
                $ac->ruangan = $request->ruangan;
                $ac->merk = $request->merk;
                $ac->type = $request->type;
                $ac->jenis = $request->jenis;
                $ac->catatan = $request->catatan;
                $ac->kerusakan = $request->kerusakan;
                $ac->keterangan = $request->keterangan;
                $ac->status = $request->status;
                $ac->tgl_pemasangan = $request->tgl_pemasangan;
                $ac->petugas_pemasangan = $request->petugas_pemasangan;
                $ac->tgl_maintenance = $request->tgl_maintenance;
                $ac->petugas_maint = $request->petugas_maint ? implode(',', $request->petugas_maint) : '';
                $ac->user_updated = auth()->user()->name;
                $ac->user_updated_time = date('Y-m-d H:i:s');

                $ac->save();

                // Simpan atau perbarui data ke tabel 'datasheet_ac'
                if ($ac->datasheetAc) {
                    $datasheetAc = $ac->datasheetAc;
                } else {
                    $datasheetAc = new DatasheetAc();
                }

                $datasheetAc->daya_pk = $request->daya_pk;
                $datasheetAc->daya_listrik = $request->daya_listrik !== null && $request->daya_listrik !== '0' ? $request->daya_listrik . $request->daya_listrik_satuan : '';
                $datasheetAc->refrigerant = $request->refrigerant;
                $datasheetAc->product = $request->product;
                $datasheetAc->current = $request->current !== null ? $request->current . $request->current_satuan : '';
                $datasheetAc->phase = $request->phase;
                $datasheetAc->daya_pendingin = $request->daya_pendingin !== null && $request->daya_pendingin !== '0' ? $request->daya_pendingin . $request->daya_pendingin_satuan : '';
                $datasheetAc->pipa = $request->pipa;
                $datasheetAc->seri_indoor = $request->seri_indoor;
                $datasheetAc->seri_outdoor = $request->seri_outdoor;
                $datasheetAc->berat_indoor = $request->berat_indoor !== null && $request->berat_indoor !== '0' ? $request->berat_indoor : '';
                $datasheetAc->berat_outdoor = $request->berat_outdoor !== null && $request->berat_outdoor !== '0' ? $request->berat_outdoor : '';
                $datasheetAc->dimensi_indoor = $request->dimensi_indoor;
                $datasheetAc->dimensi_outdoor = $request->dimensi_outdoor;
                $datasheetAc->kebisingan_indoor = $request->kebisingan_indoor;
                $datasheetAc->kebisingan_outdoor = $request->kebisingan_outdoor;

                $ac->datasheetAc()->save($datasheetAc);

                // Commit transaksi
                DB::commit();

                return redirect()->route('index.ac')->with('success', 'Data berhasil diperbarui!');
            } catch (\Exception $e) {
                // Rollback transaksi jika terjadi kesalahan
                DB::rollBack();

                // Tangkap kesalahan
                return back()->withInput()->with('error', 'Terjadi kesalahan saat memperbarui data Anda. Mohon cek kembali informasi yang Anda masukkan dan coba lagi.');
            }
        } catch (QueryException $e) {
            // Tangkap kesalahan unik (duplicate entry)
            if ($e->getCode() === '23000') {
                return back()->withInput()->with('error', 'ID perangkat sudah digunakan.');
            }

            // Tangkap kesalahan lainnya
            return back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            Ac::where('id', $id)->update(['is_delete' => auth()->user()->name]);
            Ac::destroy($id);
            return back()->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    public function exportDataAc()
    {
        try {
            return Excel::download(new ExportAc, 'data-ac.xlsx');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengekspor data.');
        }
    }
    public function recycelBin()
    {
        $id = Auth::id(); // Mendapatkan ID pengguna yang sedang login
        $user = User::find($id);
        $btnCreateAc = $user->features()->where('name', 'Tambah AC')->firstOrFail();
        $btnDetailAc = $user->features()->where('name', 'Detail AC')->firstOrFail();
        $btnDeleteAc = $user->features()->where('name', 'Delete AC')->firstOrFail();
        return view('appro.modul_ac.recycle_bin', [
            'title' => 'APPRO - Recycle Bin AC',
            'datas' => Ac::onlyTrashed()->get(),
            'btnCreate' => $btnCreateAc,
            'btnDetail' =>  $btnDetailAc,
            'btnDelete' => $btnDeleteAc,
        ]);
    }

    public function restore($id)
    {

        $restoreDataId = Ac::withTrashed()->find($id);

        if ($restoreDataId && $restoreDataId->trashed()) {
            $restoreDataId->restore();
        }

        return back()->with('success', 'Data berhasil di restore');
    }

    public function hapusPermanent()
    {
        $deletedCount = Ac::onlyTrashed()->count(); // Menghitung jumlah data yang dihapus

        if ($deletedCount > 0) {
            Ac::onlyTrashed()->forceDelete(); // Menghapus data secara permanen
            return back()->with('success', 'Recycle Bin berhasil dibersihkan!');
        } else {
            return back()->with('error', 'Tidak ada data yang dihapus!');
        }
    }

    public function exportDataAcPdf($id)
    {
        $data = Ac::find($id); // Ambil data dari model Anda
        // Instantiate Dompdf with options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);

        $html = view('appro.modul_ac.export_pdf', compact('data'))->render();

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (optional: save to file)
        $dompdf->render();

        // Output PDF to browser
        return $dompdf->stream($data->id_ac ? $data->id_ac : $data->ruangan . '.pdf');
    }

    public function queryDataAcBaru(Request $request)
    {
        $data = $request->input('val');

        $start = date('Y-m-d', strtotime(substr($data, 0, 10)));
        $end = date('Y-m-d', strtotime(substr($data, 13, 24)));

        $dataACBaru = Ac::with('datasheetAc')->whereBetween('tgl_pemasangan', [$start, $end])->get();
        $countDataACBaru = $dataACBaru->count();

        if ($countDataACBaru === 0) {
            return response()->json([
                'count' => 0,
                'message' => 'Data tidak ditemukan!'
            ], 404);
        }

        $result = [
            'count' => $countDataACBaru,
            'data' => $dataACBaru
        ];

        return response()->json($result);
    }

    public function getChart(Request $request)
    {
        $tahun = $request->tahun;
        // $data = ChartAc::where('tahun', $tahun)
        //     ->orderBy('tahun', 'ASC')
        //     ->get()->toArray();

        $data = ChartAc::where('tahun', $tahun)
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

        $result = [

            'data' => $data
        ];

        return response()->json($result);
    }

    public function filterData(Request $request)
    {
        $attribute = $request->attribute;
        $value = $request->value;
        $lantai = $request->lantai;

        $dataAc = Ac::with('datasheetAc')
            ->where(function ($query) use ($attribute, $value) {
                // Periksa apakah $attribute dan $value sudah terdefinisi
                if ($attribute && $value) {
                    $query->where($attribute, $value);
                }
            })
            ->orWhere(function ($query) use ($value, $lantai) {
                $query->where('wing', $value)
                    ->where('lantai', $lantai);
            })
            ->get();
        $count = $dataAc->count();
        if ($count === 0) {
            return response()->json([
                'count' => 0,
                'message' => 'Data tidak ditemukan!'
            ], 404);
        }
        $result = ['ac' => $dataAc, 'jumlah' => $count];
        return response()->json($result);
    }
}
