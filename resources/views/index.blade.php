@extends('layouts.app')

@section('title', 'Trang chủ')

@section('content')
<div class="container mt-4">
    <h1>Chào mừng đến với FPolyShop!</h1>
    <p>Danh sách sản phẩm hiện có:</p>
    <div class="row">
        @forelse($products as $product)
            <div class="col-md-3 mb-3">
                <div class="card">
                    @php
                        $firstChiTiet = $product->chiTiets->first();
                        $imageUrl = $firstChiTiet && $firstChiTiet->Anh ? asset('storage/' . $firstChiTiet->Anh) : 'https://placehold.co/300x200';
                    @endphp
                    <img src="{{ $imageUrl }}" class="card-img-top" alt="{{ $product->TenSanPham }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->TenSanPham }}</h5>
                        <p class="card-text">
                            Giá bán: {{ number_format($firstChiTiet ? $firstChiTiet->Gia : 0, 2) }}đ
                        </p>
                        <a class="btn btn-primary" href="{{ route('product.detail', $product->id) }}">
                            Xem chi tiết
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <p>Chưa có sản phẩm nào.</p>
        @endforelse
    </div>
</div>
@endsection