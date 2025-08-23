@extends('admin.layouts.app')

@section('title', 'Recipes')
@section('page-title', 'Recipes')

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
                <th style="color: #482500;">Nama Resep</th>
                <th style="color: #482500;">Jenis</th>
                <th style="color: #482500;">Deskripsi</th>
                <th style="color: #482500;">Action</th>

            </tr>
        </thead>
        <tbody>
            @forelse($recipes as $recipe)
                <tr class="table-row">
                    <td>{{ $loop->iteration + ($recipes->currentPage() - 1) * $recipes->perPage() }}</td>
                    <td class="product-name">{{ $recipe->nama_resep }}</td>
                    <td class="recipe-type">{{ $recipe->jenis }}</td>
                    <td class="recipe-description">{{ Str::limit($recipe->deskripsi, 80) }}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('admin.recipes.edit', $recipe) }}" class="btn btn-edit">Edit</a>
                            <form action="{{ route('admin.recipes.destroy', $recipe) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus resep ini?')">
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
                        Belum ada resep yang ditambahkan
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    @if($recipes->hasPages())
        <div style="margin-top: 20px; text-align: center;">
            {{ $recipes->links() }}
        </div>
    @endif

    <div class="add-product-container">
        <a href="{{ route('admin.recipes.create') }}" class="btn-add-product">
            <span class="add-icon">+</span>
            Add Recipe
        </a>
    </div>
</div>

<style>
    /* Custom styles for recipes table */
    .table-header th:nth-child(2) {
        width: 250px;
    }

    .table-header th:nth-child(3) {
        width: 150px;
    }

    .table-header th:nth-child(4) {
        width: 300px;
    }

    .table-header th:last-child {
        text-align: center;
        width: 200px;
    }

    .recipe-type {
        font-weight: 500;
        color: #8B4513;
    }

    .recipe-description {
        font-size: 14px;
        color: #555;
        line-height: 1.4;
        max-width: 300px;
        word-wrap: break-word;
    }
</style>
@endsection
