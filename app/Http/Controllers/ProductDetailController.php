<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use App\Models\SanPhamChiTiet;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function create($sanPhamId)
    {
        $sanPham = SanPham::findOrFail($sanPhamId);
        return view('admin.product-details.create', compact('sanPham'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'IdSanPham' => 'required|exists:san_phams,Id',
            'Size' => 'required|integer',
            'MauSac' => 'nullable|max:30',
            'SoLuong' => 'required|integer|min:0',
            'Gia' => 'required|numeric|min:0',
            'Anh' => 'nullable|image|max:2048', // Giới hạn file ảnh 2MB
        ]);

        $data = $request->all();
        if ($request->hasFile('Anh')) {
            $path = $request->file('Anh')->store('images', 'public');
            $data['Anh'] = $path; // Lưu đường dẫn tương đối
        }
        $data['NgayCapNhat'] = now();

        SanPhamChiTiet::create($data);
        return redirect()->route('products.index')->with('success', 'Thêm chi tiết sản phẩm thành công');
    }

    public function edit($id)
    {
        $chiTiet = SanPhamChiTiet::findOrFail($id);
        $sanPham = $chiTiet->sanPham;
        return view('admin.product-details.edit', compact('chiTiet', 'sanPham'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Size' => 'required|integer',
            'MauSac' => 'nullable|max:30',
            'SoLuong' => 'required|integer|min:0',
            'Gia' => 'required|numeric|min:0',
            'Anh' => 'nullable|image|max:2048', // Giới hạn file ảnh 2MB
        ]);

        $chiTiet = SanPhamChiTiet::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('Anh')) {
            // Xóa ảnh cũ nếu có (tùy chọn)
            if ($chiTiet->Anh && \Storage::disk('public')->exists($chiTiet->Anh)) {
                \Storage::disk('public')->delete($chiTiet->Anh);
            }
            $path = $request->file('Anh')->store('images', 'public');
            $data['Anh'] = $path;
        }
        $data['NgayCapNhat'] = now();

        $chiTiet->update($data);
        return redirect()->route('products.index')->with('success', 'Cập nhật chi tiết sản phẩm thành công');
    }

    public function destroy($id)
    {
        $chiTiet = SanPhamChiTiet::findOrFail($id);
        if ($chiTiet->Anh && \Storage::disk('public')->exists($chiTiet->Anh)) {
            \Storage::disk('public')->delete($chiTiet->Anh);
        }
        $chiTiet->delete();
        return redirect()->route('products.index')->with('success', 'Xóa chi tiết sản phẩm thành công');
    }
}