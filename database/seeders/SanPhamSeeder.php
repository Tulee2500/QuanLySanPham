<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SanPhamSeeder extends Seeder
{
    public function run()
    {
        // Thêm dữ liệu vào bảng san_phams
        DB::table('san_phams')->insert([
            [
                'MaSanPham' => 'SP001',
                'TenSanPham' => 'Áo thun nam',
                'ThuongHieu' => 'Adidas',
                'MoTa' => 'Áo thun cotton thoáng mát',
                'TrangThai' => true,
            ],
            [
                'MaSanPham' => 'SP002',
                'TenSanPham' => 'Quần jeans nữ',
                'ThuongHieu' => 'Levis',
                'MoTa' => 'Quần jeans ôm dáng',
                'TrangThai' => true,
            ],
        ]);

        DB::table('san_pham_chi_tiets')->insert([
            [
                'IdSanPham' => 1,
                'Size' => 38,
                'MauSac' => 'Đen',
                'SoLuong' => 50,
                'Gia' => 250000.00,
                'Anh' => 'https://bizweb.dktcdn.net/100/415/697/products/1-4db3b09d-bd47-4f42-9b5c-2b33059a262d.jpg?v=1706691015690',
            ],
            [
                'IdSanPham' => 2,
                'Size' => 28,
                'MauSac' => 'Xanh navy',
                'SoLuong' => 20,
                'Gia' => 450000.00,
                'Anh' => 'https://bizweb.dktcdn.net/thumb/1024x1024/100/399/392/products/ls.png',
            ],
        ]);
    }
}