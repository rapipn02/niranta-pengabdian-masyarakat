@extends('admin.layouts.app')

@section('title', 'Blogs')
@section('page-title', 'Blogs')

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
                <th style="color: #482500;">Judul Blog</th>
                <th style="color: #482500;">Tanggal upload</th>
                <th style="color: #482500;">Action</th>

            </tr>
        </thead>
        <tbody>
            @forelse($blogs as $blog)
                <tr class="table-row">
                    <td>{{ $loop->iteration + ($blogs->currentPage() - 1) * $blogs->perPage() }}</td>
                    <td class="product-name">{{ $blog->judul_blog }}</td>
                    <td class="blog-date">{{ $blog->formatted_date }}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-edit">Edit</a>
                            <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus blog ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr class="table-row">
                    <td colspan="4" style="text-align: center; padding: 20px; color: #999;">
                        Belum ada blog yang ditambahkan
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    @if($blogs->hasPages())
        <div style="margin-top: 20px; text-align: center;">
            {{ $blogs->links() }}
        </div>
    @endif

    <div class="add-product-container">
        <a href="{{ route('admin.blogs.create') }}" class="btn-add-product">
            <span class="add-icon">+</span>
            Add Blog
        </a>
    </div>
</div>

<style>
    /* Custom styles for blogs table */
    .table-header th:nth-child(2) {
        width: 400px;
    }

    .table-header th:nth-child(3) {
        width: 200px;
    }

    .table-header th:last-child {
        text-align: center;
        width: 200px;
    }

    .blog-date {
        font-weight: 500;
        color: #666;
    }
</style>
@endsection
