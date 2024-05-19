<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
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
        return view('appro.admin.manajemen-user.index', [
            'title' => 'Appro - Manajemen Users',
            'users' => User::with('jabatan')->get()
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

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'nik' => 'required|digits:8|numeric|unique:users',
            'id_jabatan' => 'required',
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required'
        ], $errorForm);

        $validator->sometimes('email', 'required|email|unique:users', function ($input) {
            return $input->email !== null;
        });

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Registrasi user gagal!');
        }

        $validateData['name'] = $request->name;
        $validateData['password'] = bcrypt($request->password);
        $validateData['nik'] = $request->nik;
        $validateData['email'] = $request->email;
        $validateData['is_active'] = $request->is_active ? 1 : 0;
        $validateData['id_jabatan'] = $request->id_jabatan;
        $validateData['role'] = 0;
        $validateData['image'] = "default.jpg";

        User::create($validateData);
        return back()->with('success', $request->firstname . ' berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $id = $request->id;
        $oldUser = User::find($id);
        $errorForm =
            [
                'required' => 'Kolom ini tidak boleh kosong!'
            ];

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'id_jabatan' => 'required'
        ], $errorForm);

        if ($oldUser->email != $request->email) {
            $validator->sometimes('email', 'required|email|unique:users', function ($input) {
                return !empty($input->email);
            });
        }

        if ($request->nik != null) {

            // Ini akan selalu mengembalikan false, sehingga field dinonaktifkan
            $validator->sometimes('nik', 'nullable', function ($input) {
                return false;
            });
        } else {
            $validator->sometimes('nik', 'required|digits:8|numeric|unique:users', function ($input) {
                return $input->tempat_lahir !== null;
            });
        }

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Registrasi user gagal!');
        }

        $validateData['name'] = $request->name;
        $validateData['nik'] = $request->nik;
        $validateData['email'] = $request->email;
        $validateData['is_active'] = $request->is_active ? 1 : 0;
        $validateData['id_jabatan'] = $request->id_jabatan;
        $validateData['role'] = 0;

        User::where('id', $id)
            ->update($validateData);

        // Cek jika id_jabatan berubah dari Administrator (1) ke Petugas (3)
        if ($oldUser->id_jabatan == 1 && $request->id_jabatan == 3) {
            // Hapus semua menu pengguna dari tabel user_menu
            DB::table('user_menu')->where('user_id', $id)->delete();
        }
        return back()->with('success', 'User berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        Session::getHandler()->destroy($id);

        return back()->with('success', 'User has been deleted!');
    }
}
