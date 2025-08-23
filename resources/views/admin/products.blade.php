@extends('admin.layouts.app')

@section('title', 'Products')
@section('page-title', 'Product')

@section('content')
<!-- Success Message -->
@if(session('success'))
    <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 20px; border-radius: 8px; border: 1px solid #c3e6cb;">
        {{ session('success') }}
    </div>
@endif

<div class="table-container">
    <table class="data-table">
        <thead class="table-header">
            <tr>
              <th style="color: #482500;">No</th>
                <th style="color: #482500;">Nama Produk</th>
                <th style="color: #482500;">Harga</th>
                <th style="color: #482500;">Link</th>
                <th style="color: #482500;">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr class="table-row">
                    <td>{{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}</td>
                    <td class="product-name">{{ $product->nama_produk }}</td>
                    <td class="product-price">{{ $product->formatted_price }}</td>
                    <td class="product-link">
                        @if($product->link_produk)
                            <a href="{{ $product->link_produk }}" target="_blank" style="color: #8B4513; text-decoration: none;">
                                {{ Str::limit($product->link_produk, 30) }}
                            </a>
                        @else
                            <span style="color: #999;">Tidak ada</span>
                        @endif
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-edit">Edit</a>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr class="table-row">
                    <td colspan="5" style="text-align: center; padding: 20px; color: #999;">
                        Belum ada produk yang ditambahkan
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    @if($products->hasPages())
        <div style="margin-top: 20px; text-align: center;">
            {{ $products->links() }}
        </div>
    @endif

    <div class="add-product-container">
        <a href="{{ route('admin.products.create') }}" class="btn-add-product">
            <span class="add-icon">+</span>
            Add Product
        </a>
    </div>
</div>
@endsection
