@extends('layouts.app')

@section('title', 'Thêm sản phẩm')

@section('content')
<div class="container mt-4">
    <h1>Thêm sản phẩm mới</h1>
    <form method="POST" action="{{ route('products.store') }}">
        @csrf
        <div class="mb-3">
            <label>Mã sản phẩm</label>
            <input type="text" name="MaSanPham" class="form-control" value="{{ old('MaSanPham') }}">
            @error('MaSanPham') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label>Tên sản phẩm</label>
            <input type="text" name="TenSanPham" class="form-control" value="{{ old('TenSanPham') }}">
            @error('TenSanPham') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label>Thương hiệu</label>
            <input type="text" name="ThuongHieu" class="form-control" value="{{ old('ThuongHieu') }}">
        </div>
        <div class="mb-3">
            <label>Mô tả</label>
            <textarea name="MoTa" class="form-control">{{ old('MoTa') }}</textarea>
        </div>
        <div class="mb-3">
            <label>Trạng thái</label>
            <select name="TrangThai" class="form-control">
                <option value="1">Hoạt động</option>
                <option value="0">Không hoạt động</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
</div>
@endsection