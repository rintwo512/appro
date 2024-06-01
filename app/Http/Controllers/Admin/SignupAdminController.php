<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SignupAdminController extends Controller
{

    protected $user;

    public function __construct()
    {
        $this->user = User::where('role', 1)->first();
    }
    public function index()
    {

        if (!empty($this->user)) {
            return to_route('login');
        }
        return view('appro.admin.auth.sign_up');
    }
    public function signup(Request $request)
    {

        $errorForm =
            [
                'required' => 'Kolom ini tidak boleh kosong!',
                'numeric' => 'NIK harus berupa angka!',
                'digits_between' => 'NIK minimal 8 angka & maximal 9 angka!'
            ];

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'nik' => 'required|numeric|unique:users|digits_between:8,9',
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
                ->with('error', 'Terjadi kesalahan!');
        }

        User::create(
            [
                'id_jabatan' => 1,
                'name' => $request->name,
                'nik' => $request->nik,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'is_active' => 1,
                'image' => "default.jpg",
                'role' => true,
            ]
        );

        Jabatan::insert(
            [
                [
                    'nama_jabatan' => 'Administrator'
                ],
                [
                    'nama_jabatan' => 'Auditor'
                ],
                [
                    'nama_jabatan' => 'Petugas'
                ]
            ]
        );

        return to_route('login')->with('successLogin', 'Silahkan login!');
    }
}
