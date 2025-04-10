<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = 'san_phams';
    protected $fillable = ['MaSanPham', 'TenSanPham', 'ThuongHieu', 'MoTa', 'TrangThai'];
    public $timestamps = false; // Tắt timestamps

    public function chiTiets()
    {
        return $this->hasMany(SanPhamChiTiet::class, 'IdSanPham');
    }
}