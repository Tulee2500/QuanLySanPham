@extends('layouts.app')

@section('title', 'Sửa sản phẩm')

@section('content')
<div class="container mt-4">
    <h1>Sửa sản phẩm</h1>
    <form method="POST" action="{{ route('products.update', $product->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Mã sản phẩm</label>
            <input type="text" name="MaSanPham" class="form-control" value="{{ $product->MaSanPham }}">
            @error('MaSanPham') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label>Tên sản phẩm</label>
            <input type="text" name="TenSanPham" class="form-control" value="{{ $product->TenSanPham }}">
            @error('TenSanPham') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label>Thương hiệu</label>
            <input type="text" name="ThuongHieu" class="form-control" value="{{ $product->ThuongHieu }}">
        </div>
        <div class="mb-3">
            <label>Mô tả</label>
            <textarea name="MoTa" class="form-control">{{ $product->MoTa }}</textarea>
        </div>
        <div class="mb-3">
            <label>Trạng thái</label>
            <select name="TrangThai" class="form-control">
                <option value="1" {{ $product->TrangThai ? 'selected' : '' }}>Hoạt động</option>
                <option value="0" {{ !$product->TrangThai ? 'selected' : '' }}>Không hoạt động</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection