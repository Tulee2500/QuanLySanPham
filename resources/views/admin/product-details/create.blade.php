@extends('layouts.app')

@section('title', 'Thêm chi tiết sản phẩm')

@section('content')
<div class="container mt-4">
    <h1>Thêm chi tiết cho sản phẩm: {{ $sanPham->TenSanPham }}</h1>
    <form method="POST" action="{{ route('product-details.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="IdSanPham" value="{{ $sanPham->id }}">
        <div class="mb-3">
            <label>Size</label>
            <input type="number" name="Size" class="form-control" required>
            @error('Size') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label>Màu sắc</label>
            <select name="MauSac" class="form-control">
                <option value="">-- Chọn màu sắc --</option>
                <option value="Đen">Đen</option>
                <option value="Trắng">Trắng</option>
                <option value="Xanh">Xanh</option>
                <option value="Đỏ">Đỏ</option>
                <option value="Vàng">Vàng</option>
                <option value="Xám">Xám</option>
            </select>
            @error('MauSac') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label>Số lượng</label>
            <input type="number" name="SoLuong" class="form-control" value="0" required>
            @error('SoLuong') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label>Giá</label>
            <input type="number" name="Gia" class="form-control" step="0.01" required>
            @error('Gia') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label>Ảnh</label>
            <input type="file" name="Anh" class="form-control" accept="image/*">
            @error('Anh') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-success">Thêm chi tiết</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection