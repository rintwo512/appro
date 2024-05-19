<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Menu;
use App\Models\User;
use App\Models\ChartAc;
use App\Models\Feature;
use App\Models\Jabatan;
use App\Models\SubMenu;
use App\Models\UserMenu;
use App\Models\MenuSubmenu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $bulan = [
        //     'January',
        //     'February',
        //     'March',
        //     'April',
        //     'May',
        //     'June',
        //     'July',
        //     'August',
        //     'September',
        //     'October',
        //     'November',
        //     'December'
        // ];

        // $tahun = "2021";

        // foreach ($bulan as $indeks => $namaBulan) {
        //     ChartAc::create([
        //         'tahun' => $tahun,
        //         'bulan' => $namaBulan,
        //         'total' => mt_rand(15, 35)
        //     ]);
        // }

        // $bulan1 = [
        //     'January',
        //     'February',
        //     'March',
        //     'April',
        //     'May',
        //     'June',
        //     'July',
        //     'August',
        //     'September',
        //     'October',
        //     'November',
        //     'December'
        // ];

        // $tahun1 = "2022";

        // foreach ($bulan1 as $indeks => $namaBulan) {
        //     ChartAc::create([
        //         'tahun' => $tahun1,
        //         'bulan' => $namaBulan,
        //         'total' => mt_rand(10, 30)
        //     ]);
        // }

        // $bulan2 = [
        //     'January',
        //     'February',
        //     'March',
        //     'April',
        //     'May',
        //     'June',
        //     'July',
        //     'August',
        //     'September',
        //     'October',
        //     'November',
        //     'December'
        // ];

        // $tahun2 = "2023";

        // foreach ($bulan2 as $indeks => $namaBulan2) {
        //     ChartAc::create([
        //         'tahun' => $tahun2,
        //         'bulan' => $namaBulan2,
        //         'total' => mt_rand(7, 30)
        //     ]);
        // }

        // $bulan3 = [
        //     'January',
        //     'February',
        //     'March',
        //     'April',
        // ];

        // $tahun3 = "2024";

        // foreach ($bulan3 as $indeks => $namaBulan3) {
        //     ChartAc::create([
        //         'tahun' => $tahun3,
        //         'bulan' => $namaBulan3,
        //         'total' => mt_rand(7, 30)
        //     ]);
        // }

        // User::insert(
        //     [
        //         [
        //             'id_jabatan' => 1,
        //             'name' => 'Rinto Harahap',
        //             'email' => 'engineeringsulsel@gmail.com',
        //             'password' => bcrypt('admin123'),
        //             'nik' => 15920011,
        //             'image' => 'default.jpg',
        //             'is_active' => true,
        //         ]
        //     ]
        // );



        // Menu::insert(
        //     [
        //         [
        //             "menu_label" => "Dashboard",
        //             "menu_url" => "dashboard",
        //             "menu_icon" => "bx bx-home-alt",
        //             "menu_location" => "mainmenu"
        //         ],
        //         [
        //             "menu_label" => "Databases",
        //             "menu_url" => "javascript:void(0)",
        //             "menu_icon" => "bx bx-data",
        //             "menu_location" => "mainmenu"
        //         ]
        //     ]
        // );


        // DB::beginTransaction();

        // try {

        //     $menus = [
        //         [
        //             "menu_label" => "Dashboard",
        //             "menu_url" => "/dashboard",
        //             "menu_icon" => "bx bx-home-alt",
        //             "menu_location" => "1"
        //         ],
        //         [
        //             "menu_label" => "Databases",
        //             "menu_url" => "javascript:void(0)",
        //             "menu_icon" => "bx bx-data",
        //             "menu_location" => "2"
        //         ]
        //     ];

        //     $menuIds = [];
        //     foreach ($menus as $menu) {
        //         $menuModel = Menu::create($menu);
        //         $menuIds[] = $menuModel->id;
        //     }


        //     $userId = 1; 
        //     foreach ($menuIds as $menuId) {
        //         UserMenu::create([
        //             'user_id' => $userId,
        //             'menu_id' => $menuId
        //         ]);
        //     }


        //     DB::commit();
        // } catch (\Exception $e) {

        //     DB::rollback();
        //     throw $e;
        // }

        // try {
        //     $submenus = [
        //         [
        //             "menu_id" => 2,
        //             "submenu_label" => "Data AC",
        //             "submenu_url" => "/data-ac",
        //             "submenu_icon" => "ti ti-circle",
        //             "submenu_location" => "1"
        //         ],
        //         [
        //             "menu_id" => 2,
        //             "submenu_label" => "Data Logbook",
        //             "submenu_url" => "/data-logbook",
        //             "submenu_icon" => "ti ti-circle",
        //             "submenu_location" => "2"
        //         ]
        //     ];

        //     $subMenuIds2 = [];
        //     foreach ($submenus as $submenu) {
        //         $submenuModel = SubMenu::create($submenu);
        //         $subMenuIds2[] = $submenuModel->id;
        //     }



        //     $menu_id = 2;
        //     foreach ($subMenuIds2 as $subMenuIds) {
        //         MenuSubmenu::create([
        //             'menu_id' => $menu_id,
        //             'submenu_id' => $subMenuIds
        //         ]);
        //     }


        //     DB::commit();
        // } catch (\Exception $e) {

        //     DB::rollback();
        //     throw $e;
        // }

        // Jabatan::insert(
        //     [
        //         [
        //             "nama_jabatan" => "Administrator",
        //         ],
        //         [
        //             "nama_jabatan" => "Auditor",
        //         ],
        //         [
        //             "nama_jabatan" => "Petugas",
        //         ]
        //     ]
        // );
        // $features = [
        //     [
        //         'submenu_id' => 1,
        //         'name' => 'Tambah AC',
        //         'is_active' => 1,
        //         'icon' => 'bx bx-plus',
        //         'location' => '1'
        //     ],
        //     [
        //         'submenu_id' => 1,
        //         'name' => 'Edit AC',
        //         'is_active' => 1,
        //         'icon' => 'bx bx-edit',
        //         'location' => '2'
        //     ],
        //     [
        //         'submenu_id' => 1,
        //         'name' => 'Detail AC',
        //         'is_active' => 1,
        //         'icon' => 'bx bx-low-vision',
        //         'location' => '3'
        //     ],
        //     [
        //         'submenu_id' => 1,
        //         'name' => 'Delete AC',
        //         'is_active' => 1,
        //         'icon' => 'bx bx-trash',
        //         'location' => '4'
        //     ],
        // ];

        // foreach ($features as $featureData) {
        //     $feature = Feature::create($featureData); 


        //     $pivotData = [
        //         'user_id' => 1, 
        //         'feature_id' => $feature->id
        //     ];
        //     DB::table('pivot_feature')->insert($pivotData);
        //     DB::table('user_feature')->insert($pivotData);
        // }
    }
}
