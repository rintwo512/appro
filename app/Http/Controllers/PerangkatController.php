<?php

namespace App\Http\Controllers;

use App\Models\Perankgat;
use Illuminate\Http\Request;

class PerangkatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('appro.modul_perangkat.index', [
            'title' => 'APPRO - Data Perangkat',
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Perankgat $perankgat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perankgat $perankgat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Perankgat $perankgat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perankgat $perankgat)
    {
        //
    }
}
