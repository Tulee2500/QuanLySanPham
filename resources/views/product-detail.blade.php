@extends('layouts.app')

@section('title', $product->TenSanPham)

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                @php
                    $firstChiTiet = $product->chiTiets->first();
                    $defaultImage = $firstChiTiet && $firstChiTiet->Anh ? asset('storage/' . $firstChiTiet->Anh) : 'https://placehold.co/400x600';
                @endphp
                <img 
                    id="productImage"
                    src="{{ $defaultImage }}" 
                    alt="{{ $product->TenSanPham }}"
                    class="card-img-top img-fluid"
                    style="height: 600px; width: 400px; object-fit: cover; margin: auto;"
                >
            </div>
        </div>       
        <div class="col-md-6">
            <h2>{{ $product->TenSanPham }}</h2>
            <p>{{ $product->MoTa ?? 'Chưa có mô tả' }}</p>
            <h4>Giá: {{ number_format($firstChiTiet ? $firstChiTiet->Gia : 0, 2) }}đ</h4>
            <p>Số lượng còn: {{ $firstChiTiet ? $firstChiTiet->SoLuong : 0 }}</p>
            <p>Size: {{ $firstChiTiet ? $firstChiTiet->Size : 'N/A' }} | 
               Màu: {{ $firstChiTiet ? $firstChiTiet->MauSac : 'N/A' }}</p>
            <button class="btn btn-success">Thêm vào giỏ hàng</button>
        </div>
    </div>

    <hr>
    <h4 class="mt-5">Sản phẩm khác</h4>
    <div class="row">
        @foreach($relatedProducts as $related)
            <div class="col-md-3 mb-3">
                <div class="card">
                    @php
                        $relatedChiTiet = $related->chiTiets->first();
                        $relatedImage = $relatedChiTiet && $relatedChiTiet->Anh ? asset('storage/' . $relatedChiTiet->Anh) : 'https://placehold.co/300x200';
                    @endphp
                    <img src="{{ $relatedImage }}" 
                         class="card-img-top" alt="{{ $related->TenSanPham }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $related->TenSanPham }}</h5>
                        <p class="card-text">Giá: {{ number_format($relatedChiTiet ? $relatedChiTiet->Gia : 0, 2) }}đ</p>
                        <a href="{{ route('product.detail', $related->id) }}" 
                           class="btn btn-outline-primary">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    const images = [
        @foreach($product->chiTiets as $detail)
            @if($detail->Anh) '{{ asset('storage/' . $detail->Anh) }}', @endif
        @endforeach
    ].filter(Boolean);
    
    if (images.length > 1) {
        let index = 0;
        const imageElement = document.getElementById("productImage");
        setInterval(() => {
            index = (index + 1) % images.length;
            imageElement.src = images[index];
        }, 3000); // Chuyển ảnh mỗi 3 giây
    }
</script>

<style>
    .card-img-top {
        width: 100%;
        height: 400px;
        object-fit: cover;
        border-radius: 10px;
    }
</style>
@endsection