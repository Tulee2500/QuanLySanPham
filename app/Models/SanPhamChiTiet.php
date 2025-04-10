<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SanPhamChiTiet extends Model
{
    protected $table = 'san_pham_chi_tiets';
    protected $fillable = ['IdSanPham', 'Size', 'MauSac', 'SoLuong', 'Gia', 'Anh'];
    public $timestamps = false; // Tắt timestamps, dùng NgayCapNhat thay thế

    public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'IdSanPham');
    }
}