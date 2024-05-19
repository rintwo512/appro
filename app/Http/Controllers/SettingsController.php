<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
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
        return view('appro.modul_settings.edit_profile', [
            'title' => "APPRO - Edit Profile"
        ]);
    }

    public function editProfile(Request $request)
    {
        $id = $request->id;
        $oldUser = User::find($id);

        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Update profile gagal!');
        }

        // Logika penyimpanan file
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/profile_images'), $filename);

            // Hapus gambar lama jika ada
            if ($oldUser->image) {
                $oldImagePath = public_path('uploads/profile_images/' . $oldUser->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Update pengguna dengan nama file baru
            $oldUser->image = $filename;
            $oldUser->save();
        }

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function ubahPass()
    {
        $user = Auth::user();

        // Jika user tidak ditemukan (null), redirect ke halaman login
        if (!$user) {
            return redirect()->route('login');
        }
        return view('appro.modul_settings.change_pass', [
            'title' => "APPRO - Ubah Password"
        ]);
    }

    public function ubahPassPost(Request $request)
    {
        $id = $request->userId;
        $userSet = User::where('id', $id)->first();

        // Aturan validasi
        $rules = [
            'changeOldPass' => 'required',
            'password' => 'required|min:4|confirmed'
        ];

        // Validasi input berdasarkan aturan di atas
        $request->validate($rules);

        $oldPass = $request->changeOldPass;
        $password = $request->password;

        // Periksa apakah password lama benar
        if (!Hash::check($oldPass, $userSet->password)) {
            return back()->with('error', 'Password lama Anda salah!');
        }

        // Periksa apakah password baru tidak sama dengan password lama
        if (Hash::check($password, $userSet->password)) {
            return back()->with('error', 'Password baru tidak boleh sama dengan password lama!');
        }

        // Jika semua validasi terpenuhi, perbarui password
        $userSet->password = bcrypt($password);
        $userSet->save();

        return back()->with('success', 'Password berhasil diubah!');
    }
}
