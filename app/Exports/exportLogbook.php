<?php

namespace App\Exports;


use App\Models\Logbook;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromView;

class exportLogbook implements FromView, WithHeadings
{
    public function headings(): array
    {
        return [
            'No.',
            'Nama Tugas',
            'Wing',
            'Lantai',
            'Lokasi',
            'Tanggal',
            'Status',
            'Prioritas',
            'Type',
            'Petugas',
            'Evidens'
        ];
    }

    public function view(): View
    {
        return view('appro.modul_logbook.export_excel', [
            'datas' => Logbook::all()
        ]);
    }
}
