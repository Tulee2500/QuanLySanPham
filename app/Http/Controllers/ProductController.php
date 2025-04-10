<?php
namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
{
    $products = SanPham::with('chiTiets')
        ->where('TrangThai', true)
        ->get();
    
    // Debug: Kiểm tra dữ liệu
    if ($products->isEmpty()) {
        dd('Không có sản phẩm nào được tìm thấy');
    }
    
    return view('index', compact('products'));
}

    public function detail($id)
    {
        $product = SanPham::with('chiTiets')->findOrFail($id);
        $relatedProducts = SanPham::with('chiTiets')
            ->where('TrangThai', true)
            ->where('id', '!=', $id)
            ->limit(4)
            ->get();

        return view('product-detail', compact('product', 'relatedProducts'));
    }
}