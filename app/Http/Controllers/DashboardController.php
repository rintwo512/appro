<?php

namespace App\Http\Controllers;

use App\Models\Ac;
use App\Models\User;
use App\Models\ChartAc;
use App\Models\Logbook;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $user = Auth::user();

        // Jika user tidak ditemukan (null), redirect ke halaman login
        if (!$user) {
            return redirect()->route('login');
        }

        // Mendapatkan daftar menu yang dimiliki oleh pengguna
        $userMenus = Auth::user()->menus;

        // Periksa apakah pengguna memiliki akses ke menu 'Dashboard'
        $dashboardMenu = $userMenus->where('menu_label', 'Dashboard')->first();

        if (!$dashboardMenu) {
            // Jika tidak memiliki akses, alihkan ke halaman lain atau tampilkan pesan kesalahan
            return back()->with('error', 'Anda tidak memiliki akses ke menu ini.');
        }

        // Mendapatkan tanggal awal dan akhir bulan ini
        $startOfMonth = Carbon::now()->startOfMonth()->toDateString();
        $endOfMonth = Carbon::now()->endOfMonth()->toDateString();
       
        // Menggunakan Eloquent untuk mengambil data bulan ini
        $dataLogBookBulanIni = Logbook::whereBetween('tanggal', [$startOfMonth, $endOfMonth])->count();

        $dataLogBookDoneBulanIni = Logbook::whereBetween('tanggal', [$startOfMonth, $endOfMonth])
            ->where('status', 'Done')
            ->count();

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
            'totalLogbook' => $dataLogBookBulanIni,
            'totalLogbookDone' => $dataLogBookDoneBulanIni,
        ]);
    }

    public function getOnlineUsers()
    {
        $onlineUsers = User::where('status_login', 'online')
            ->where('role', '!=', 1)
            ->where('name', '!=', auth()->user()->name)
            ->get();

        $onlineUsersCount = User::where('status_login', 'online')
            ->where('role', '!=', 1)
            ->where('name', '!=', auth()->user()->name)
            ->count();

        if ($onlineUsersCount > 0) {
            $result =
                [
                    'jumlah' => $onlineUsersCount,
                    'data' => $onlineUsers
                ];
        } else {
            $result = 0;
        }
        return response()->json($result);
    }
}
