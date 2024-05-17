<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SubMenu;
use Illuminate\Http\Request;
use App\Models\FeatureLogbook;
use Illuminate\Support\Facades\Validator;

class FeatureLogbookController extends Controller
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
            'name' => 'required|unique:features_logbook',
            'icon' => 'required|unique:features_logbook',
        ], $errorForm);

        $name = $request->name;

        // Check if submenu with the same name already exists
        $oldFiturLogbook = FeatureLogbook::where('name', $name)->first();

        if ($oldFiturLogbook) {
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


        $submenu = SubMenu::where('submenu_label', 'Data AC')->first();

        // Ensure the menu is found
        if (!$submenu) {
            return back()->with('error', 'Submenu data logbook tidak ditemukan!');
        }

        // Create the submenu with associated menu
        $fitur = FeatureLogbook::create([
            "name" => $request->name,
            "icon" => $request->icon,
            "location" => $request->location,
            "is_active" => $request->is_active ? 1 : 0,
            "submenu_id" => $submenu->id, // Associate with the found submenu
        ]);

        $user = User::where('id_jabatan', 1)->first();

        $user->featuresLogbook()->attach($fitur->id);

        return back()->with('success', 'Fitur Logbook berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(FeatureLogbook $featureLogbook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FeatureLogbook $featureLogbook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->input('id');
        $isActive = $request->input('is_active');

        // Temukan Feature berdasarkan ID
        $fitur = FeatureLogbook::find($id);

        // Update status menu
        $fitur->is_active = $isActive;
        $fitur->save();


        return response()->json(['message' => 'Fitur Logbook berhasil diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeatureLogbook $featureLogbook, $id)
    {
        $featureLogbook = FeatureLogbook::find($id);

        $featureLogbook->delete();

        return back()->with('success', 'Fitur Logbook dihapus!');
    }
}
