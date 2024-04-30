<?php

namespace App\Exports;

use App\Models\Ac;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class exportAc implements \Maatwebsite\Excel\Concerns\FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('appro.modul_ac.exportExcel', [
            'dataExport' => Ac::all()
        ]);
    }
}
