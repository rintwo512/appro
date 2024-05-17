<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Models\Feature;
use App\Models\SubMenu;
use Illuminate\Http\Request;
use App\Models\FeatureLogbook;
use Illuminate\Support\Facades\Validator;

class MenusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('appro.admin.manajemen-menus.index', [
            'title' => 'APPRO - Manajemen Menus',
            'menus' => Menu::with("submenus")->orderBy('menu_location')->get(),
            'submenus' => SubMenu::with("features1")->orderBy('submenu_location')->get(),
            'featuresAC' => Feature::orderBy('location')->get(),
            'featuresLogbook' => FeatureLogbook::orderBy('location')->get(),
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
                'unique' => 'Menu sudah ada!',
            ];

        $validator = Validator::make($request->all(), [
            'menu_label' => 'required|unique:menus',
            'menu_url' => 'required|unique:menus',
            'menu_icon' => 'required',
        ], $errorForm);


        $menu_label = $request->menu_label;
        // Cek apakah menu dengan nama yang sama sudah ada
        $oldMenu = Menu::where('menu_label', $menu_label)->first();

        if ($oldMenu) {
            return back()
                ->withInput()
                ->with('error', 'Menu ' . '<span class="text-primary fw-bold">' . $menu_label . '</span>' . ' sudah ada!');
        }

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Terjadi kesalahan!');
        }

        $data =
            [
                "menu_label" => $request->menu_label,
                "menu_url" => $request->menu_url,
                "menu_icon" => $request->menu_icon,
                "menu_location" => $request->menu_location,
                "is_active" => $request->is_active ? 1 : 0,
            ];

        $menu = Menu::create($data);

        $adminUsers = User::where('id_jabatan', 1)->get();
        // Loop melalui setiap pengguna Administrator dan tambahkan menu baru ke pivot table user_menu
        foreach ($adminUsers as $user) {
            $user->menus()->attach($menu->id);
        }

        return back()->with('success', 'Menu berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $id = $request->input('id');
        $isActive = $request->input('is_active');

        // Temukan menu berdasarkan ID
        $menu = Menu::find($id);

        // Update status menu
        $menu->is_active = $isActive;
        $menu->save();


        return response()->json(['message' => 'Menu berhasil diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);

        $menu->delete();

        return back()->with('success', 'Menu has been deleted!');
    }
}
