<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Jabatan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    protected $user;

    public function __construct()
    {
        $this->user = User::where('role', 1)->first();
    }

    public function login()
    {
        if (empty($this->user)) {
            return to_route('signup.admin');
        }

        return view('appro.modul_auth.login');
    }

    public function loginPost(Request $request)
    {
        $errorForm =
            [
                'required' => 'Kolom ini tidak boleh kosong!'
            ];
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ], $errorForm);

        $loginField = $request->input('login');
        $password = $request->input('password');



        $user = User::where(function ($query) use ($loginField) {
            $query->where('nik', $loginField)
                ->orWhere('email', $loginField);
        })->first();

        if ($user) {
            if ($user->is_active == 1) {
                $credentials = [];
                if (filter_var($loginField, FILTER_VALIDATE_EMAIL)) {
                    $credentials['email'] = $loginField;
                } else {
                    $credentials['nik'] = $loginField;
                }

                if (Auth::attempt(array_merge($credentials, ['password' => $password]))) {
                    $dataLogin = ['user_time_online' => Carbon::now(), 'status_login' => 'online'];
                    User::where('id', Auth::user()->id)->update($dataLogin);
                    $request->session()->regenerate();
                    $menu = $user->menus()->where('is_active', true)->first();

                    if (!$menu) {

                        if ($user->id_jabatan == 1) {
                            return to_route('menus.index');
                        } else {
                            $dataLog = ['user_time_offline' => Carbon::now(), 'status_login' => 'offline'];
                            User::where('id', $user->id)->update($dataLog);
                            $request->session()->invalidate();
                            $request->session()->regenerateToken();
                            return to_route('page-not-found');
                        }
                    } else {
                        // Jika ada menu yang aktif, arahkan ke URL submenu yang pertama
                        $submenu = $menu->submenus()->where('is_active', true)->first();

                        // Jika tidak ada submenu yang aktif untuk menu aktif, redirect ke halaman lain
                        if (!$submenu) {
                            // if ($menu->menu_url == "javascript:void(0)") {
                            //     return redirect(404);
                            // } else {

                            // return redirect()->intended($menu->menu_url);
                            return redirect()->route($menu->menu_url);
                            // }
                        }

                        // Jika ada submenu yang aktif untuk menu aktif, arahkan ke URL submenu tersebut
                        // return redirect()->intended($submenu->submenu_url);
                        return redirect()->route($submenu->submenu_url);
                    }

                    // return redirect()->intended('/dashboard');
                } else {
                    return back()->with('errorLogin', 'Something Wrong');
                }
            } else {
                return back()->with('errorLogin', 'Maaf <span class="text-danger fw-bold">' .  $user->name . '</span>, akun Anda belum di aktifkan');
            }
        } else {
            return back()->with('errorLogin', '<span class="text-danger">' .  $loginField . '</span>, not found');
        }
    }

    public function logout(Request $request, $id)
    {
        $dataLogout = ['user_time_offline' => Carbon::now(), 'status_login' => 'offline'];
        User::where('id', $id)->update($dataLogout);

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('login');
    }

    public function forgotPass()
    {
        return view('appro.modul_auth.forgot-pass');
    }

    public function forgotPassPost(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users'
        ]);

        $email = $request->email;
        $user = User::where('email', $email)->first();
        $token = Str::random(64);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('errorLogin', 'Email ' . $request->email . ' tidak terdaftar!');
        }

        if ($user->is_active == 0) {
            return redirect()->to(route('auth.forgot-password'))->with('errorLogin', 'Akun Anda tidak aktif!');
        }

        // Hapus token yang sudah kadaluwarsa sebelum memasukkan yang baru
        DB::table('password_reset_tokens')
            ->where('created_at', '<=', Carbon::now()->subMinutes(30))
            ->delete();

        Mail::send('appro.modul_auth.emails.reset-password', ['token' => $token, "email" => $request->email], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject("Reset Password");
        });

        // Tambahkan token dengan waktu kadaluwarsa 1 menit
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'expires_at' => Carbon::now()->addMinutes(1),
            'created_at' => Carbon::now()
        ]);

        return redirect()->to(route('login'))->with('successLogin', 'Silahkan buka email Anda!');
    }

    public function resetPassword($token, $email)
    {
        return view('appro.modul_auth.new-password', compact('token', 'email'));
    }

    public function resetPasswordPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:3|confirmed',
            'password_confirmation' => 'required'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('errorLogin', 'Gagal mengubah password!');
        }

        $updatePassword = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->where('expires_at', '>', Carbon::now())
            ->first();

        if (!$updatePassword) {
            return redirect()->to(route('reset.password', ['token' => $request->token, 'email' => $request->email]))
                ->with('errorLogin', 'Token reset password tidak valid atau sudah kadaluwarsa!');
        }

        User::where("email", $request->email)->update(["password" => Hash::make($request->password)]);

        DB::table("password_reset_tokens")->where(["email" => $request->email])->delete();

        return redirect()->to(route('login'))->with('successLogin', 'Password berhasil diubah!');
    }
}
