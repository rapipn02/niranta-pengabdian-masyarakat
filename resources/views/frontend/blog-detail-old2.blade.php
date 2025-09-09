@extends('frontend.layouts.app')

@section('content')
<!-- Blog Detail Section -->
<section style="
    background-color: #F2ECE0;
    padding: 120px 0 80px 0;
    min-height: 100vh;
">
    <div style="
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    ">
        <!-- Main Blog Card - Layout seperti foto referensi -->
        <div style="
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
        ">
            <div style="
                display: grid;
                grid-template-columns: 400px 1fr;
                min-height: 500px;
            " class="blog-main">
                <!-- Left Side - Blog Image (seperti foto produk di referensi) -->
                <div style="
                    background-size: cover;
                    background-position: center;
                    background-repeat: no-repeat;
                    @if($blog->image && file_exists(public_path('storage/' . $blog->image)))
                        background-image: url('{{ asset('storage/' . $blog->image) }}');
                    @else
                        background-image: url('{{ asset('makanan1.png') }}');
                    @endif
                "></div>

                <!-- Right Side - Blog Content -->
                <div style="
                    padding: 40px;
                    display: flex;
                    flex-direction: column;
                    justify-content: flex-start;
                ">
                    <!-- Blog Title -->
                    <h1 style="
                        font-family: 'Inter', sans-serif;
                        font-size: 2rem;
                        font-weight: bold;
                        color: #2C1810;
                        margin: 0 0 15px 0;
                        line-height: 1.3;
                    ">{{ $blog->judul_blog }}</h1>

                    <!-- Blog Excerpt/Intro -->
                    <p style="
                        font-family: 'Inter', sans-serif;
                        font-size: 1rem;
                        color: #666;
                        line-height: 1.6;
                        margin: 0 0 20px 0;
                    ">{{ $blog->excerpt }}</p>

                    <!-- Blog Date -->
                    <div style="
                        color: #888;
                        font-family: 'Inter', sans-serif;
                        font-size: 14px;
                        margin-bottom: 30px;
                        padding-bottom: 20px;
                        border-bottom: 1px solid #f0f0f0;
                    ">
                        {{ \Carbon\Carbon::parse($blog->tanggal_upload)->format('d M Y') }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Blog Content Section - Format seperti list di foto referensi -->
        <div style="
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        ">
            <!-- Blog Content dengan format yang sesuai database -->
            <div style="
                font-family: 'Inter', sans-serif;
                color: #333;
                line-height: 1.8;
                font-size: 16px;
            ">
                <!-- Display blog content dari database -->
                <div style="
                    font-size: 16px;
                    line-height: 1.8;
                    color: #333;
                ">
                    {!! nl2br(e($blog->content)) !!}
                </div>
            </div>

            <!-- Back Button -->
            <div style="
                margin-top: 40px;
                text-align: center;
            ">
                <a href="{{ route('blogs') }}" style="
                    display: inline-flex;
                    align-items: center;
                    background: #D4A574;
                    color: white;
                    text-decoration: none;
                    padding: 12px 30px;
                    border-radius: 10px;
                    font-family: 'Inter', sans-serif;
                    font-size: 14px;
                    font-weight: 500;
                    transition: background 0.3s ease;
                " onmouseover="this.style.background='#C19A5F'" onmouseout="this.style.background='#D4A574'">
                    ← Back to Blogs
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Responsive Styles -->
<style>
    @media (max-width: 1024px) {
        .blog-main {
            grid-template-columns: 1fr !important;
        }
    }
    
    @media (max-width: 768px) {
        section {
            padding: 100px 0 60px 0 !important;
        }
    }
</style>
@endsection
