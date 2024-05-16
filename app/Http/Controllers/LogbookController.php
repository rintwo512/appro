<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Logbook;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use App\Exports\exportLogbook;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class LogbookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logbooks = Logbook::with('users')->get();

        return view('appro.modul_logbook.index', [
            'title' => 'APPRO - Data Logbook',
            'logbooks' => $logbooks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('appro.modul_logbook.create', [
            'title' => 'APPRO - Create Data Logbook',
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
                'required' => 'Tidak boleh kosong!',
                'image' => 'Harus berupa file gambar!',
                'max' => 'Ukuran gambar maksimal 5MB',
                'mimes' => 'Extensi gambar harus jpeg,png,jpg atau svg',
            ];
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama_tugas' => 'required',
            'wing' => 'required',
            'lantai' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required',
            'status' => 'required',
            'prioritas' => 'required',
            'kategori' => 'required',
            'jenis_pekerjaan' => 'required',
            'evidens' => 'max:5128',
        ], $errorForm);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal menambahkan logbook!');
        }

        // Simpan data logbook baru
        $logbook = new Logbook();
        $logbook->nama_tugas = $request->nama_tugas;
        $logbook->wing = $request->wing;
        $logbook->lantai = $request->lantai;
        $logbook->lokasi = $request->lokasi;
        $logbook->tanggal = Carbon::parse($request->tanggal)->format('Y-m-d');
        $logbook->status = $request->status;
        $logbook->prioritas = $request->prioritas;
        $logbook->kategori = $request->kategori;
        $logbook->jenis_pekerjaan = $request->jenis_pekerjaan;
        $logbook->type = $request->type;
        $logbook->keterangan = $request->keterangan;
        $logbook->save();

        // Attach petugas yang terkait
        if ($request->has('petugas')) {
            foreach ($request->petugas as $petugasName) {
                $user = User::where('name', $petugasName)->first();
                if ($user) {
                    DB::table('user_logbook')->insert([
                        'user_id' => $user->id,
                        'logbook_id' => $logbook->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }

        // Proses upload dan menyimpan eviden
        if ($request->hasFile('evidens')) {
            foreach ($request->file('evidens') as $file) {
                $extension = 'webp';

                // Buat nama unik untuk file
                // $name_gen = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
                $name_gen = hexdec(uniqid()) . '.' . $extension;

                // Simpan file ke dalam direktori public/uploads/logbook-evidens
                $file->move(public_path('uploads/logbook-evidens'), $name_gen);

                // Simpan informasi eviden ke dalam tabel logbook_evidens
                $logbook->evidens()->create([
                    'filename' => $name_gen, // Gunakan nama yang telah dibuat
                    'path' => 'uploads/logbook-evidens/' . $name_gen, // Simpan path lengkap
                ]);
            }
        }




        return redirect()->route('data-logbook.index')->with('success', 'Logbook berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Logbook $logbook)
    {
        return 'show';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Logbook $logbook, $id)
    {
        $data = Logbook::find($id);
        $existingUsers = $data->users->pluck('id')->toArray(); // Ambil ID pengguna yang sudah terkait dengan logbook
        $petugas = User::whereNotIn('id', $existingUsers)->pluck('name', 'id'); // Ambil pengguna yang belum terkait dengan logbook
        return view('appro.modul_logbook.edit', [
            'title' => 'APPRO - Edit Data Logbook',
            'petugas' => $petugas,
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Logbook $logbook)
    // {

    //     // Validasi input
    //     $validator = Validator::make($request->all(), [
    //         'nama_tugas' => 'required',
    //         'wing' => 'required',
    //         'lantai' => 'required',
    //         'lokasi' => 'required',
    //         'tanggal' => 'required',
    //         'status' => 'required',
    //         'prioritas' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         return back()
    //             ->withErrors($validator)
    //             ->withInput()
    //             ->with('error', 'Gagal memperbarui logbook!');
    //     }

    //     // Mulai transaksi database
    //     DB::beginTransaction();

    //     try {

    //         $logbook->nama_tugas = $request->nama_tugas;
    //         $logbook->wing = $request->wing;
    //         $logbook->lantai = $request->lantai;
    //         $logbook->lokasi = $request->lokasi;
    //         $logbook->tanggal = Carbon::parse($request->tanggal);
    //         $logbook->status = $request->status;
    //         $logbook->prioritas = $request->prioritas;
    //         $logbook->type = $request->type;
    //         $logbook->keterangan = $request->keterangan;

    //         $logbook->update();



    //         // Commit transaksi
    //         DB::commit();

    //         // Redirect dengan pesan sukses
    //         return redirect()->route('data-logbook.index')->with('success', 'Logbook berhasil diperbarui');
    //     } catch (\Exception $e) {
    //         // Rollback transaksi jika terjadi kesalahan
    //         DB::rollback();

    //         // Redirect dengan pesan error
    //         return redirect()->back()->withInput()->with('error', 'Gagal memperbarui logbook: ' . $e->getMessage());
    //     }
    // }

    // public function ubahs(Request $request, $id)
    // {
    //     // Validasi input
    //     $validator = Validator::make($request->all(), [
    //         'nama_tugas' => 'required',
    //         'wing' => 'required',
    //         'lantai' => 'required',
    //         'lokasi' => 'required',
    //         'tanggal' => 'required',
    //         'status' => 'required',
    //         'prioritas' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         return back()
    //             ->withErrors($validator)
    //             ->withInput()
    //             ->with('error', 'Gagal memperbarui logbook!');
    //     }

    //     $logbook = Logbook::find($id);

    //     $logbook->fill([
    //         "nama_tugas" => $request->nama_tugas,
    //         "wing" => $request->wing,
    //         "lantai" => $request->lantai,
    //         "lokasi" => $request->lokasi,
    //         "tanggal" => Carbon::parse($request->tanggal),
    //         "status" => $request->status,
    //         "prioritas" => $request->prioritas,
    //         "type" => $request->type,
    //         "keterangan" => $request->keterangan,
    //         "user_updated" => auth()->user()->name,
    //     ])->save();

    //     // Sync relasi users dengan data yang baru
    //     if ($request->has('petugas')) {
    //         $petugasIds = $request->petugas; // Ambil langsung ID petugas yang dipilih
    //         $logbook->users()->sync($petugasIds);
    //     } else {
    //         // Jika tidak ada petugas yang dipilih, hapus semua relasi
    //         $logbook->users()->detach();
    //     }

    //     // Redirect dengan pesan sukses
    //     return redirect()->route('data-logbook.index')->with('success', 'Logbook berhasil diperbarui');
    // }



    public function ubah(Request $request, $id)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama_tugas' => 'required',
            'wing' => 'required',
            'lantai' => 'required',
            'lokasi' => 'required',
            'tanggal' => 'required',
            'status' => 'required',
            'prioritas' => 'required',
            'kategori' => 'required',
            'jenis_pekerjaan' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal memperbarui logbook!');
        }

        $logbook = Logbook::find($id);

        $logbook->fill([
            "nama_tugas" => $request->nama_tugas,
            "wing" => $request->wing,
            "lantai" => $request->lantai,
            "lokasi" => $request->lokasi,
            "tanggal" => Carbon::parse($request->tanggal)->format('Y-m-d'),
            "status" => $request->status,
            "prioritas" => $request->prioritas,
            "kategori" => $request->kategori,
            "jenis_pekerjaan" => $request->jenis_pekerjaan,
            "type" => $request->type,
            "keterangan" => $request->keterangan,
            "user_updated" => auth()->user()->name,
        ])->save();

        // Sync relasi users dengan data yang baru
        if ($request->has('petugas')) {
            $petugasIds = $request->petugas; // Ambil langsung ID petugas yang dipilih
            $logbook->users()->sync($petugasIds);
        } else {
            // Jika tidak ada petugas yang dipilih, hapus semua relasi
            $logbook->users()->detach();
        }

        // Proses update dan menyimpan eviden
        if ($request->hasFile('evidens')) {
            // Hapus eviden lama
            foreach ($logbook->evidens as $eviden) {
                $evidenPath = public_path($eviden->path);
                if (File::exists($evidenPath)) {
                    File::delete($evidenPath);
                }
                $eviden->delete();
            }

            // Tambahkan eviden baru
            foreach ($request->file('evidens') as $file) {
                $extension = 'webp';

                // Buat nama unik untuk file
                // $name_gen = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
                $name_gen = hexdec(uniqid()) . '.' . $extension;

                // Simpan file ke dalam direktori public/uploads/logbook-evidens
                $file->move(public_path('uploads/logbook-evidens'), $name_gen);
                // $name_gen = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
                // $file->move(public_path('uploads/logbook-evidens'), $name_gen);
                $logbook->evidens()->create([
                    'filename' => $name_gen,
                    'path' => 'uploads/logbook-evidens/' . $name_gen,
                ]);
            }
        }


        // Redirect dengan pesan sukses
        return redirect()->route('data-logbook.index')->with('success', 'Logbook berhasil diperbarui');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Logbook $logbook)
    {


        try {
            // Mengambil ID pengguna yang sedang login
            $userDelete = auth()->user()->name;

            // Melakukan soft delete pada logbook
            $logbook->delete();

            // Memperbarui kolom is_delete menjadi ID pengguna yang sedang login
            $logbook->update(['is_delete' => $userDelete]);
            return back()->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    public function hapus($id)
    {
        try {
            Logbook::where('id', $id)->update(['is_delete' => auth()->user()->name]);
            Logbook::destroy($id);
            return back()->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    public function trash()
    {
        return view('appro.modul_logbook.recycle_bin', [
            'title' => 'APPRO - Recycle Bin',
            'logbooks' => Logbook::onlyTrashed()->get(),
        ]);
    }

    public function restore($id)
    {

        $restoreDataId = Logbook::withTrashed()->find($id);

        if ($restoreDataId && $restoreDataId->trashed()) {
            $restoreDataId->restore();
        }

        return back()->with('success', 'Data berhasil di restore');
    }

    public function hapusSemua()
    {
        $deletedCount = Logbook::onlyTrashed()->count(); // Menghitung jumlah data yang dihapus

        if ($deletedCount > 0) {
            Logbook::onlyTrashed()->forceDelete(); // Menghapus data secara permanen
            return back()->with('success', 'Recycle Bin berhasil dibersihkan!');
        } else {
            return back()->with('error', 'Tidak ada data yang dihapus!');
        }
    }

    public function exportDataLogbook()
    {
        try {
            return Excel::download(new exportLogbook, 'data-logbook.xlsx');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function filterLogbook(Request $request)
    {
        $data = $request->input('val');

        $start = date('Y-m-d', strtotime(substr($data, 0, 10)));
        $end = date('Y-m-d', strtotime(substr($data, 13, 24)));

        $logbook = Logbook::with('users', 'evidens')->whereBetween('tanggal', [$start, $end])->get();
        $countLogbook = $logbook->count();

        if ($countLogbook === 0) {
            return response()->json([
                'count' => 0,
                'message' => 'Data tidak ditemukan!'
            ], 404);
        }

        $result = [
            'count' => $countLogbook,
            'data' => $logbook
        ];

        return response()->json($result);
    }

    public function filterKategoriLogbook(Request $request)
    {
        $attribute = $request->attribute;
        $value = $request->value;

        $logbook = Logbook::with('users')->where(function ($query) use ($attribute, $value) {
            // Periksa apakah $attribute dan $value sudah terdefinisi
            if ($attribute && $value) {
                $query->where($attribute, $value);
            }
        })->get();

        $count = $logbook->count();
        if ($count === 0) {
            return response()->json([
                'count' => 0,
                'message' => 'Data tidak ditemukan!'
            ], 404);
        }
        $result = ['logbook' => $logbook, 'jumlah' => $count];
        return response()->json($result);
    }

    public function exportDataLogbookPdf($id)
    {
        
        $data = Logbook::find($id); // Ambil data dari model Anda
        // Instantiate Dompdf with options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);

        $html = view('appro.modul_logbook.export_pdf', compact('data'))->render();

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (optional: save to file)
        $dompdf->render();

        // Output PDF to browser
        return $dompdf->stream($data->nama_tugas . '.pdf');
    }
}
