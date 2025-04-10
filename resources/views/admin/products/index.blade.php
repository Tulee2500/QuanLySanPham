@extends('layouts.app')

@section('title', 'Quản lý sản phẩm')

@section('content')
<div class="container mt-4">
    <h1>Quản lý sản phẩm</h1>
    <a href="{{ route('products.create') }}" class="btn btn-success mb-3">Thêm sản phẩm mới</a>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã SP</th>
                <th>Tên SP</th>
                <th>Thương hiệu</th>
                <th>Trạng thái</th>
                <th>Chi tiết</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->MaSanPham }}</td>
                    <td>{{ $product->TenSanPham }}</td>
                    <td>{{ $product->ThuongHieu }}</td>
                    <td>{{ $product->TrangThai ? 'Hoạt động' : 'Không hoạt động' }}</td>
                    <td>
                        @foreach($product->chiTiets as $chiTiet)
                            <div>
                                Size: {{ $chiTiet->Size }}, 
                                Màu: {{ $chiTiet->MauSac ?? 'N/A' }}, 
                                Giá: {{ number_format($chiTiet->Gia, 2) }}đ
                                @if($chiTiet->Anh)
                                    <img src="{{ asset('storage/' . $chiTiet->Anh) }}" alt="Ảnh" style="max-width: 50px;">
                                @endif
                                <a href="{{ route('product-details.edit', $chiTiet->id) }}" class="btn btn-sm btn-primary">Sửa</a>
                                <form action="{{ route('product-details.destroy', $chiTiet->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Xóa chi tiết này?')">Xóa</button>
                                </form>
                            </div>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                        <a href="{{ route('product-details.create', $product->id) }}" class="btn btn-info btn-sm">Thêm chi tiết</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7">Chưa có sản phẩm nào</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection