<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;

class ProductAdminController extends Controller
{
    public function index()
    {
        $products = SanPham::with('chiTiets')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'MaSanPham' => 'required|unique:san_phams|max:20',
            'TenSanPham' => 'required|max:100',
            'ThuongHieu' => 'nullable|max:50',
            'MoTa' => 'nullable',
            'TrangThai' => 'required|boolean',
        ]);

        $sanPham = SanPham::create($request->all());
        return redirect()->route('product-details.create', $sanPham->id)
            ->with('success', 'Thêm sản phẩm thành công, hãy thêm chi tiết');
    }

    public function edit($id)
    {
        $product = SanPham::with('chiTiets')->findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'MaSanPham' => 'required|max:20|unique:san_phams,MaSanPham,' . $id,
            'TenSanPham' => 'required|max:100',
            'ThuongHieu' => 'nullable|max:50',
            'MoTa' => 'nullable',
            'TrangThai' => 'required|boolean',
        ]);

        $product = SanPham::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Cập nhật sản phẩm thành công');
    }

    public function destroy($id)
    {
        $product = SanPham::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Xóa sản phẩm thành công');
    }
}