<?php

namespace App\Http\Controllers;

use App\Models\Ac;
use App\Models\User;
use App\Models\ChartAc;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        // Mendapatkan daftar menu yang dimiliki oleh pengguna
        $userMenus = Auth::user()->menus;

        // Periksa apakah pengguna memiliki akses ke menu 'Dashboard'
        $dashboardMenu = $userMenus->where('menu_label', 'Dashboard')->first();

        if (!$dashboardMenu) {
            // Jika tidak memiliki akses, alihkan ke halaman lain atau tampilkan pesan kesalahan
            return back()->with('error', 'Anda tidak memiliki akses ke menu ini.');
        }

        $totalAc = Ac::count();
        $AcRusak = Ac::where('status', 'Rusak')->count();

        $threeMonthsAgo = Carbon::now()->subMonths(3)->format('Y-m-d');
        $dataMainten = Ac::where(DB::raw("STR_TO_DATE(tgl_maintenance, '%Y-%m-%d')"), '<', $threeMonthsAgo)
            ->get()->count();

        $list_tahun = DB::table('chart_ac')
            ->select('tahun')
            ->groupBy('tahun')
            ->orderBy('tahun', 'DESC')
            ->get();
        return view('appro.modul_dashboard.dashboard', [
            'title' => 'APPRO - Dashboard',
            'list_tahun' => $list_tahun,
            'totalAc' => $totalAc,
            'acRusak' => $AcRusak,
            'mainten' => $dataMainten,
        ]);
    }
}
