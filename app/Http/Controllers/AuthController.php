<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {

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
                            return to_route('users.index');
                        } else {
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

                            return redirect()->intended($menu->menu_url);
                            // }
                        }

                        // Jika ada submenu yang aktif untuk menu aktif, arahkan ke URL submenu tersebut
                        return redirect()->intended($submenu->submenu_url);
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
}
