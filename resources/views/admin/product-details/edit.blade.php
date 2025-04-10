@extends('layouts.app')

@section('title', 'Sửa chi tiết sản phẩm')

@section('content')
<div class="container mt-4">
    <h1>Sửa chi tiết sản phẩm: {{ $sanPham->TenSanPham }}</h1>
    <form method="POST" action="{{ route('product-details.update', $chiTiet->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="IdSanPham" value="{{ $sanPham->id }}">
        <div class="mb-3">
            <label>Size</label>
            <input type="number" name="Size" class="form-control" value="{{ $chiTiet->Size }}" required>
            @error('Size') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label>Màu sắc</label>
            <select name="MauSac" class="form-control">
                <option value="">-- Chọn màu sắc --</option>
                <option value="Đen" {{ $chiTiet->MauSac == 'Đen' ? 'selected' : '' }}>Đen</option>
                <option value="Trắng" {{ $chiTiet->MauSac == 'Trắng' ? 'selected' : '' }}>Trắng</option>
                <option value="Xanh" {{ $chiTiet->MauSac == 'Xanh' ? 'selected' : '' }}>Xanh</option>
                <option value="Đỏ" {{ $chiTiet->MauSac == 'Đỏ' ? 'selected' : '' }}>Đỏ</option>
                <option value="Vàng" {{ $chiTiet->MauSac == 'Vàng' ? 'selected' : '' }}>Vàng</option>
                <option value="Xám" {{ $chiTiet->MauSac == 'Xám' ? 'selected' : '' }}>Xám</option>
            </select>
            @error('MauSac') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label>Số lượng</label>
            <input type="number" name="SoLuong" class="form-control" value="{{ $chiTiet->SoLuong }}" required>
            @error('SoLuong') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label>Giá</label>
            <input type="number" name="Gia" class="form-control" step="0.01" value="{{ $chiTiet->Gia }}" required>
            @error('Gia') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label>Ảnh hiện tại</label>
            @if($chiTiet->Anh)
                <img src="{{ asset('storage/' . $chiTiet->Anh) }}" alt="Ảnh" style="max-width: 200px; display: block; margin-bottom: 10px;">
            @else
                <p>Chưa có ảnh</p>
            @endif
        </div>
        <div class="mb-3">
            <label>Thay ảnh mới</label>
            <input type="file" name="Anh" class="form-control" accept="image/*">
            @error('Anh') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection