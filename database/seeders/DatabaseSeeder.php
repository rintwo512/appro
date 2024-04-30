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

        $bulan = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];

        $tahun = "2021";

        foreach ($bulan as $indeks => $namaBulan) {
            ChartAc::create([
                'tahun' => $tahun,
                'bulan' => $namaBulan,
                'total' => mt_rand(15, 35)
            ]);
        }

        $bulan1 = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];

        $tahun1 = "2022";

        foreach ($bulan1 as $indeks => $namaBulan) {
            ChartAc::create([
                'tahun' => $tahun1,
                'bulan' => $namaBulan,
                'total' => mt_rand(10, 30)
            ]);
        }

        $bulan2 = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];

        $tahun2 = "2023";

        foreach ($bulan2 as $indeks => $namaBulan2) {
            ChartAc::create([
                'tahun' => $tahun2,
                'bulan' => $namaBulan2,
                'total' => mt_rand(7, 30)
            ]);
        }

        $bulan3 = [
            'January',
            'February',
            'March',
            'April',
        ];

        $tahun3 = "2024";

        foreach ($bulan3 as $indeks => $namaBulan3) {
            ChartAc::create([
                'tahun' => $tahun3,
                'bulan' => $namaBulan3,
                'total' => mt_rand(7, 30)
            ]);
        }

        User::insert(
            [
                [
                    'id_jabatan' => 1,
                    'name' => 'Jon Doe',
                    'email' => 'jon@doe.com',
                    'password' => bcrypt('admin123'),
                    'nik' => 15920011,
                    'image' => 'https://via.placeholder.com/150',
                    'is_active' => true,
                ],
                [
                    'id_jabatan' => 3,
                    'name' => 'Jen Doe',
                    'email' => 'jen@doe.com',
                    'password' => bcrypt('admin123'),
                    'nik' => 15920012,
                    'image' => 'https://via.placeholder.com/150',
                    'is_active' => true,
                ]
            ]
        );



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

        // Memulai transaksi
        DB::beginTransaction();

        try {
            // Insert data ke tabel Menu
            $menus = [
                [
                    "menu_label" => "Dashboard",
                    "menu_url" => "dashboard",
                    "menu_icon" => "bx bx-home-alt",
                    "menu_location" => "mainmenu"
                ],
                [
                    "menu_label" => "Databases",
                    "menu_url" => "javascript:void(0)",
                    "menu_icon" => "bx bx-data",
                    "menu_location" => "mainmenu"
                ]
            ];

            $menuIds = [];
            foreach ($menus as $menu) {
                $menuModel = Menu::create($menu);
                $menuIds[] = $menuModel->id;
            }

            // Insert data ke tabel user_menu
            $userId = 1; // Ganti dengan ID pengguna yang ingin Anda hubungkan dengan menu
            foreach ($menuIds as $menuId) {
                UserMenu::create([
                    'user_id' => $userId,
                    'menu_id' => $menuId
                ]);
            }

            // Commit transaksi jika berhasil
            DB::commit();
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollback();
            throw $e;
        }

        try {
            $submenus = [
                [
                    "submenu_label" => "Data AC",
                    "submenu_url" => "data-ac",
                    "submenu_icon" => "ti ti-circle",
                    "submenu_location" => "mainmenu"
                ],
                [
                    "submenu_label" => "Data Apar",
                    "submenu_url" => "data-apar",
                    "submenu_icon" => "ti ti-circle",
                    "submenu_location" => "mainmenu"
                ]
            ];

            $subMenuIds2 = [];
            foreach ($submenus as $submenu) {
                $submenuModel = SubMenu::create($submenu);
                $subMenuIds2[] = $submenuModel->id;
            }



            $menu_id = 2;
            foreach ($subMenuIds2 as $subMenuIds) {
                MenuSubmenu::create([
                    'menu_id' => $menu_id,
                    'submenu_id' => $subMenuIds
                ]);
            }


            DB::commit();
        } catch (\Exception $e) {

            DB::rollback();
            throw $e;
        }

        Jabatan::insert(
            [
                [
                    "nama_jabatan" => "Administrator",
                ],
                [
                    "nama_jabatan" => "Auditor",
                ],
                [
                    "nama_jabatan" => "Petugas",
                ]
            ]
        );
        $features = [
            [
                'name' => 'Tambah AC',
                'type' => 'anchor',
                'action' => 'ac.create',
                'btn_id' => 'btnCreateAC',
                'class' => 'btn',
                'icon' => 'bx bx-plus',
                'toggle' => 'modal',
                'target' => '#modalCreateAC',
                'location' => 'content'
            ],
            [
                'name' => 'Edit AC',
                'type' => 'anchor',
                'action' => 'ac.edit',
                'btn_id' => 'btnEditAC',
                'class' => 'btn',
                'icon' => 'bx bx-edit',
                'toggle' => 'modal',
                'target' => '#modalEditAC',
                'location' => 'content'
            ],
            [
                'name' => 'Detail AC',
                'type' => 'anchor',
                'action' => 'ac.detail',
                'btn_id' => 'btnDetailAC',
                'class' => 'btn',
                'icon' => 'bx bx-low-vision',
                'toggle' => 'modal',
                'target' => '#modalDetailAC',
                'location' => 'content'
            ],
            [
                'name' => 'Delete AC',
                'type' => 'anchor',
                'action' => 'ac.delete',
                'btn_id' => 'btnDeleteAC',
                'class' => 'btn',
                'icon' => 'bx bx-trash',
                'toggle' => 'modal',
                'target' => '#modalDeleteAC',
                'location' => 'content'
            ],
        ];

        foreach ($features as $featureData) {
            $feature = Feature::create($featureData); // Simpan data ke tabel features

            // Tambahkan entri ke tabel pivot_feature menggunakan attach
            $pivotData = [
                'user_id' => 1, // Sesuaikan dengan user ID yang sesuai
                'feature_id' => $feature->id
            ];
            DB::table('pivot_feature')->insert($pivotData);
        }
    }
}
