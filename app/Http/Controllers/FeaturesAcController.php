<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\SubMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FeaturesAcController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $errorForm = [
            'required' => 'Kolom ini tidak boleh kosong!',
            'unique' => 'Menu sudah ada!',
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:features',
            'icon' => 'required|unique:features',
        ], $errorForm);

        $name = $request->name;

        // Check if submenu with the same name already exists
        $oldFiturAc = Feature::where('name', $name)->first();

        if ($oldFiturAc) {
            return back()
                ->withInput()
                ->with('error', 'Fitur ' . '<span class="text-primary fw-bold">' . $name . '</span>' . ' sudah ada!');
        }

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Terjadi kesalahan!');
        }

        // Find the menu with label 'Databases'
        $submenu = SubMenu::where('submenu_label', 'Data AC')->first();

        // Ensure the menu is found
        if (!$submenu) {
            return back()->with('error', 'Submenu data ac tidak ditemukan!');
        }

        // Create the submenu with associated menu
        $fitur = Feature::create([
            "name" => $request->name,
            "icon" => $request->icon,
            "location" => $request->location,
            "is_active" => $request->is_active ? 1 : 0,
            "submenu_id" => $submenu->id, // Associate with the found submenu
        ]);

        DB::table('pivot_feature')->insert([
            'user_id' => 1,
            'feature_id' => $fitur->id,
            'created_at' => now()
        ]);

        return back()->with('success', 'Fitur AC berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Feature $feature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feature $feature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feature $feature)
    {
        $id = $request->input('id');
        $isActive = $request->input('is_active');

        // Temukan Feature berdasarkan ID
        $fitur = Feature::find($id);

        // Update status menu
        $fitur->is_active = $isActive;
        $fitur->save();


        return response()->json(['message' => 'Fitur AC berhasil diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feature $feature, $id)
    {
        $featureAc = Feature::find($id);

        $featureAc->delete();

        return back()->with('success', 'Fitur AC dihapus!');
    }
}
