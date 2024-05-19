<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Models\SubMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubmenusController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $errorForm = [
            'required' => 'Kolom ini tidak boleh kosong!',
            'unique' => 'Menu sudah ada!',
        ];

        $validator = Validator::make($request->all(), [
            'submenu_label' => 'required|unique:submenus',
            'submenu_url' => 'required|unique:submenus',
        ], $errorForm);

        $submenu_label = $request->submenu_label;

        // Check if submenu with the same name already exists
        $oldSubmenu = SubMenu::where('submenu_label', $submenu_label)->first();

        if ($oldSubmenu) {
            return back()
                ->withInput()
                ->with('error', 'Submenu ' . '<span class="text-primary fw-bold">' . $submenu_label . '</span>' . ' sudah ada!');
        }

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Terjadi kesalahan!');
        }

        // Find the menu with label 'Databases'
        $menu = Menu::where('menu_label', $request->menu_id)->first();
        $user = User::where('nik', 15920011)->first();

        // Ensure the menu is found
        if (!$menu) {
            return back()->with('error', 'Menu ' . $request->menu_id . ' tidak ditemukan!');
        }

        // Create the submenu with associated menu
        $submenu = SubMenu::create([
            "submenu_label" => $request->submenu_label,
            "submenu_url" => $request->submenu_url,
            "submenu_icon" => "ti ti-circle",
            "submenu_location" => $request->submenu_location,
            "is_active" => $request->is_active ? 1 : 0,
            "menu_id" => $menu->id, // Associate with the found menu
        ]);
        $menu->submenus()->attach($submenu->id);
        $user->submenus1()->attach($submenu->id);
        return back()->with('success', 'Submenu berhasil ditambahkan!');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubMenu $subMenu)
    {
        $id = $request->input('id');
        $isActive = $request->input('is_active');

        // Temukan menu berdasarkan ID
        $menu = SubMenu::find($id);

        // Update status menu
        $menu->is_active = $isActive;
        $menu->save();


        return response()->json(['message' => 'Submenu berhasil diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $submenu = SubMenu::find($id);

        $submenu->delete();

        return back()->with('success', 'submenu has been deleted!');
    }
}
