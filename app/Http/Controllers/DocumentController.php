<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('appro.modul_document.index', [
            'title' => 'APPRO - Data Dokumen',
            'data' => Document::all()
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fileup' => 'required|file|max:50000',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'File melebihi 5MB');
        }

        if ($request->fileup == null) {
            return back()->with('error', 'Upload file gagal!');
        } else {
            $fileInfo = $request->file('fileup');
            $maxFileSizeMB = 50; // Ukuran maksimum file dalam MB

            // Pengecekan apakah ukuran file melebihi batas yang ditentukan
            if ($fileInfo->getSize() > ($maxFileSizeMB * 1024 * 1024)) {
                return back()->with('error', 'Ukuran file melebihi batas maksimum (5MB)!');
            }

            $allowedExtensions = ['pptx', 'zip', 'docx', 'xlsx', 'rar', 'txt', 'pdf', 'psd', 'ai'];
            $originalName = $fileInfo->getClientOriginalName();
            $extension = $fileInfo->getClientOriginalExtension();
            $fileSizeInBytes = $fileInfo->getSize();
            $fileSizeInMB = $fileSizeInBytes / 1024;
            $stringWithHyphen = str_replace([' ', '+', '_', '-'], '-', $originalName);

            // Pengecekan apakah ekstensi file diizinkan
            if (in_array(strtolower($extension), $allowedExtensions)) {
                // Tentukan path untuk menyimpan file
                // $destinationPath = public_path('uploads/documents/' . $originalName);
                // $fileName = time() . '-' . $stringWithHyphen;

                $fileInfo->move(public_path('uploads/documents'), $originalName);

                // Simpan ke database menggunakan Eloquent
                $document = new Document([
                    'file_name' => $originalName,
                    'extension_file' => $extension,
                    'file_size' => $fileSizeInMB,
                ]);

                $document->save();
                return back()->with('success', 'File berhasil diupload!');
            } else {
                return back()->with('error', 'Hanya file dengan ekstensi .pptx, .psd, .ai, .zip, .docx, .xlsx, .rar, .txt, .pdf yang diizinkan!');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan data berdasarkan ID
        $document = Document::find($id);

        if (!$document) {
            return back()->with('error', 'File tidak ditemukan!');
        }

        // Tentukan path file
        $filePath = public_path('uploads/documents/' . $document->file_name);

        // Hapus file dari folder jika ada
        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        // Hapus data dari database
        $document->delete();

        return back()->with('success', 'File berhasil dihapus!');
    }
}
