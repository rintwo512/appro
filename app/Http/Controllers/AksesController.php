<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Models\Feature;
use App\Models\SubMenu;
use Illuminate\Http\Request;
use App\Models\FeatureLogbook;
use Illuminate\Support\Facades\Auth;

class AksesController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Jika user tidak ditemukan (null), redirect ke halaman login
        if (!$user) {
            return redirect()->route('login');
        }
        $user = User::all();
        // $user = User::with(['menusUser' => function ($query) {
        //     $query->where('is_active', 1);
        // }])->get();



        // echo "Menus:<br>";
        // foreach ($user->menusUser as $menu) {
        //     echo "- " . $menu->menu_label . "<br>";
        //     foreach ($menu->submenuUser as $submenu) {
        //         echo "&nbsp;&nbsp;&nbsp;&nbsp;- " . $submenu->submenu_label . "<br>";
        //         foreach ($submenu->featuresUser as $feature) {
        //             echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- " . $feature->name . "<br>";
        //         }
        //     }
        // }
        return view('appro.admin.manajemen-akses.index', [
            'title' => 'APPRO - Manajemen Akses',
            'users' => $user
        ]);
    }

    public function menu($id)
    {
        // Dapatkan user berdasarkan ID
        $user = User::find($id);

        // Ambil semua menu
        $allMenus = Menu::all();

        return view('appro.admin.manajemen-akses.user-menu-view', [
            'title' => 'APPRO - Menu ' . $user->name,
            'allMenus' => $allMenus,
            'user' => $user,
        ]);
    }


    public function updateMenu(Request $request, $id)
    {
        // Temukan user berdasarkan ID
        $user = User::find($id);

        // Ambil ID-menu yang dipilih dari form
        $selectedMenus = $request->input('menus', []);

        // Update menu untuk user
        $user->menus()->sync($selectedMenus);

        return back()->with('successtoast', 'Menu berhasil diperbaruhi');
    }

    public function submenu($id)
    {
        // Dapatkan user berdasarkan ID
        $user = User::find($id);
        // Ambil semua menu
        $allSubmenus = SubMenu::all();

        return view('appro.admin.manajemen-akses.user-submenu-view', [
            'title' => 'APPRO - Submenu ' . $user->name,
            'allSubmenus' => $allSubmenus,
            'user' => $user,
        ]);
    }

    public function updateSubmenu(Request $request, $id)
    {
        // Temukan user berdasarkan ID
        $user = User::find($id);

        // Ambil ID-menu yang dipilih dari form
        $selectedSubmenus = $request->input('submenus', []);

        // Update menu untuk user
        $user->submenus1()->sync($selectedSubmenus);

        return back()->with('successtoast', 'Submenu berhasil diperbaruhi');
    }

    public function fitur($id)
    {
        // Dapatkan user berdasarkan ID
        $user = User::find($id);

        // Ambil semua fitur
        $allFitur = Feature::all();
        $allFiturLogbook = FeatureLogbook::all();

        return view('appro.admin.manajemen-akses.user-fitur-view', [
            'title' => 'APPRO - Fitur ' . $user->name,
            'allFitur' => $allFitur,
            'allFiturLogbook' => $allFiturLogbook,
            'user' => $user,
        ]);
    }


    public function updateFitur(Request $request, $id)
    {
        // Temukan user berdasarkan ID
        $user = User::find($id);

        // Ambil ID-menu yang dipilih dari form
        $selectedFitur = $request->input('fiturs', []);

        // Update menu untuk user
        $user->features1()->sync($selectedFitur);

        return back()->with('successtoast', 'Fitur AC berhasil diperbaruhi');
    }

    public function updateFiturLogbook(Request $request, $id)
    {
        // Temukan user berdasarkan ID
        $user = User::find($id);

        // Ambil ID-menu yang dipilih dari form
        $selectedFitur = $request->input('fiturs_logbook', []);

        // Update menu untuk user
        $user->featuresLogbook()->sync($selectedFitur);

        return back()->with('successtoast', 'Fitur Logbook berhasil diperbaruhi');
    }
}
