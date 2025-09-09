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
        <!-- Main Blog Card -->
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
                <!-- Left Side - Blog Image -->
                <div style="
                    background-size: cover;
                    background-position: center;
                    background-repeat: no-repeat;
                    @if($blog->image && file_exists(public_path('storage/' . $blog->image)))
                        background-image: url('{{ asset('storage/' . $blog->image) }}');
                    @else
                        background-image: url('{{ asset('blog1.png') }}');
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

                    <!-- Blog Excerpt -->
                    @if($blog->excerpt)
                        <p style="
                            font-family: 'Inter', sans-serif;
                            font-size: 1rem;
                            color: #666;
                            line-height: 1.6;
                            margin: 0 0 20px 0;
                        ">{{ $blog->excerpt }}</p>
                    @endif

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

                    <!-- Author -->
                    @if($blog->author)
                        <div style="
                            color: #999;
                            font-family: 'Inter', sans-serif;
                            font-size: 14px;
                        ">
                            By {{ $blog->author }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Blog Content Section -->
        <div style="
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        ">
            <!-- Blog Content dari Database -->
            <div style="
                font-family: 'Inter', sans-serif;
                color: #333;
                line-height: 1.8;
                font-size: 16px;
            ">
                {!! nl2br(e($blog->content)) !!}
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

        <!-- Related Blogs Section -->
        @if(isset($relatedBlogs) && $relatedBlogs->count() > 0)
            <div style="
                background: white;
                border-radius: 20px;
                padding: 40px;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
                margin-top: 40px;
            ">
                <h3 style="
                    font-family: 'Inter', sans-serif;
                    font-size: 1.5rem;
                    font-weight: bold;
                    color: #2C1810;
                    margin-bottom: 30px;
                ">Related Blogs</h3>

                <div style="
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                    gap: 20px;
                ">
                    @foreach($relatedBlogs as $relatedBlog)
                        <a href="{{ route('blogs.show', $relatedBlog) }}" style="
                            text-decoration: none;
                            color: inherit;
                        ">
                            <div style="
                                border: 1px solid #f0f0f0;
                                border-radius: 12px;
                                overflow: hidden;
                                transition: transform 0.3s ease, box-shadow 0.3s ease;
                            " onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 20px rgba(0, 0, 0, 0.1)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                <div style="
                                    height: 120px;
                                    background-size: cover;
                                    background-position: center;
                                    @if($relatedBlog->image && file_exists(public_path('storage/' . $relatedBlog->image)))
                                        background-image: url('{{ asset('storage/' . $relatedBlog->image) }}');
                                    @else
                                        background-image: url('{{ asset('blog1.png') }}');
                                    @endif
                                "></div>
                                <div style="padding: 15px;">
                                    <h4 style="
                                        font-family: 'Inter', sans-serif;
                                        font-size: 14px;
                                        font-weight: 600;
                                        color: #2C1810;
                                        margin: 0 0 8px 0;
                                        line-height: 1.3;
                                    ">{{ Str::limit($relatedBlog->judul_blog, 50) }}</h4>
                                    <p style="
                                        font-family: 'Inter', sans-serif;
                                        font-size: 12px;
                                        color: #888;
                                        margin: 0;
                                    ">{{ \Carbon\Carbon::parse($relatedBlog->tanggal_upload)->format('d M Y') }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
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
