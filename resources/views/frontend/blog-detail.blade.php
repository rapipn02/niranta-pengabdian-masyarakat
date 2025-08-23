@extends('frontend.layouts.app')

@section('content')
<!-- Custom Navbar for Blog Detail -->
<nav class="fixed top-0 left-0 right-0 z-50 w-full" style="background: #482500; backdrop-filter: blur(2px); -webkit-backdrop-filter: blur(2px); height: 48px;">
    <div class="w-full h-full flex justify-between items-center px-16 lg:px-20">
        <!-- Logo -->
        <div class="flex-shrink-0">
            <a href="{{ route('home') }}" class="flex items-center">
                <img src="{{ asset('logoputih.png') }}" alt="Niranta Logo" style="height: 64px; width: auto;">
            </a>
        </div>

        <!-- Desktop Navigation -->
        <div class="flex items-center space-x-8">
            <a href="{{ route('home') }}" style="
                color: white;
                font-family: 'Inter', sans-serif;
                font-size: 11px;
                font-weight: 500;
                letter-spacing: 0.8px;
                text-transform: uppercase;
                text-decoration: none;
                text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
                transition: color 0.2s ease;
            " onmouseover="this.style.color='#D4A574'" onmouseout="this.style.color='white'">HOME</a>
            <a href="{{ route('product') }}" style="
                color: white;
                font-family: 'Inter', sans-serif;
                font-size: 11px;
                font-weight: 500;
                letter-spacing: 0.8px;
                text-transform: uppercase;
                text-decoration: none;
                text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
                transition: color 0.2s ease;
            " onmouseover="this.style.color='#D4A574'" onmouseout="this.style.color='white'">PRODUCT</a>
            <a href="{{ route('recipes') }}" style="
                color: white;
                font-family: 'Inter', sans-serif;
                font-size: 11px;
                font-weight: 500;
                letter-spacing: 0.8px;
                text-transform: uppercase;
                text-decoration: none;
                text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
                transition: color 0.2s ease;
            " onmouseover="this.style.color='#D4A574'" onmouseout="this.style.color='white'">RECIPE</a>
            <a href="{{ route('blogs') }}" style="
                color: #D4A574;
                font-family: 'Inter', sans-serif;
                font-size: 11px;
                font-weight: 500;
                letter-spacing: 0.8px;
                text-transform: uppercase;
                text-decoration: none;
                text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
                transition: color 0.2s ease;
            ">BLOGS</a>
            <a href="{{ route('contact') }}" style="
                color: white;
                font-family: 'Inter', sans-serif;
                font-size: 11px;
                font-weight: 500;
                letter-spacing: 0.8px;
                text-transform: uppercase;
                text-decoration: none;
                text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
                transition: color 0.2s ease;
            " onmouseover="this.style.color='#D4A574'" onmouseout="this.style.color='white'">CONTACT US</a>
        </div>
    </div>
</nav>

<!-- Blog Detail Section -->
<section style="
    background-color: #F2ECE0;
    min-height: 100vh;
    padding: 100px 0 60px 0;
">
    <div style="
        max-width: 1000px;
        margin: 0 auto;
        padding: 0 40px;
    ">
        <!-- Page Title -->
        <h1 style="
            text-align: center;
            color: #482500;
            font-size: 4rem;
            font-weight: bold;
            font-family: 'Inter', sans-serif;
            margin-bottom: 20px;
            letter-spacing: 0.02em;
        ">Blogs</h1>

        <!-- Horizontal Line -->
        <div style="
            width: 100%;
            height: 2px;
            background-color: #482500;
            margin: 0 auto 40px auto;
        "></div>

        <!-- Blog Title -->
        <h2 style="
            text-align: center;
            color: #482500;
            font-size: 1.5rem;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            margin-bottom: 40px;
        ">{{ $blog->getTranslatedTitle() }}</h2>

        <!-- Content Grid -->
        <div style="
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 50px;
            align-items: flex-start;
        " class="content-grid">
            <!-- Blog Image -->
            <div style="
                border: 1px solid #C0C0C0;
                padding: 0;
            " class="blog-image">
                @if($blog->image && file_exists(public_path($blog->image)))
                    <img src="{{ asset($blog->image) }}" alt="{{ $blog->getTranslatedTitle() }}" style="
                        width: 100%;
                        height: auto;
                        display: block;
                    ">
                @else
                    <img src="{{ blog_image('placeholder-blog.jpg') }}" alt="{{ $blog->getTranslatedTitle() }}" style="
                        width: 100%;
                        height: auto;
                        display: block;
                    ">
                @endif
            </div>

            <!-- Blog Details -->
            <div class="blog-content">
                <!-- Blog Meta Information -->
                <div style="margin-bottom: 30px;">
                    <h3 style="
                        color: #482500;
                        font-size: 1rem;
                        font-weight: 600;
                        font-family: 'Inter', sans-serif;
                        margin-bottom: 10px;
                    ">Blog Info:</h3>
                    
                    <div style="
                        color: #333;
                        font-family: 'Inter', sans-serif;
                        font-size: 0.9rem;
                        line-height: 1.5;
                        margin: 0;
                    ">
                        <p style="margin-bottom: 5px;"><strong>Tanggal Upload:</strong> {{ \Carbon\Carbon::parse($blog->tanggal_upload)->format('d F Y') }}</p>
                        @if($blog->author)
                            <p style="margin-bottom: 5px;"><strong>Penulis:</strong> {{ $blog->author }}</p>
                        @endif
                        @if($blog->getTranslatedExcerpt())
                            <p style="margin-bottom: 5px;"><strong>Ringkasan:</strong> {{ $blog->getTranslatedExcerpt() }}</p>
                        @endif
                    </div>
                </div>

                <!-- Blog Content -->
                <div>
                    <h3 style="
                        color: #482500;
                        font-size: 1rem;
                        font-weight: 600;
                        font-family: 'Inter', sans-serif;
                        margin-bottom: 10px;
                    ">Konten:</h3>
                    
                    <div style="
                        color: #333;
                        font-family: 'Inter', sans-serif;
                        font-size: 0.9rem;
                        line-height: 1.6;
                        margin: 0;
                        text-align: justify;
                    ">
                        {!! nl2br(e($blog->getTranslatedContent())) !!}
                    </div>
                </div>
            </div>
        </div>

        <!-- Back Button -->
        <div style="text-align: center; margin-top: 50px;">
            <a href="{{ route('blogs') }}" style="
                display: inline-block;
                background: #D4A574;
                color: white;
                text-decoration: none;
                padding: 12px 30px;
                border-radius: 6px;
                font-family: 'Inter', sans-serif;
                font-size: 0.95rem;
                font-weight: 500;
                transition: background 0.3s ease;
            " onmouseover="this.style.background='#C19A5F'" onmouseout="this.style.background='#D4A574'">← Kembali ke Blogs</a>
        </div>

        <!-- Related Blogs Section -->
        @if(isset($relatedBlogs) && $relatedBlogs->count() > 0)
            <div style="
                margin-top: 60px;
                padding-top: 40px;
                border-top: 2px solid #482500;
            ">
                <h3 style="
                    text-align: center;
                    color: #482500;
                    font-size: 1.8rem;
                    font-weight: 600;
                    font-family: 'Inter', sans-serif;
                    margin-bottom: 30px;
                ">Blog Terkait</h3>

                <div style="
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                    gap: 20px;
                    margin-top: 30px;
                ">
                    @foreach($relatedBlogs as $relatedBlog)
                        <a href="{{ route('blogs.show', $relatedBlog) }}" style="
                            text-decoration: none;
                            color: inherit;
                        ">
                            <div style="
                                border: 1px solid #C0C0C0;
                                border-radius: 8px;
                                overflow: hidden;
                                transition: transform 0.3s ease, box-shadow 0.3s ease;
                                background: white;
                            " onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 20px rgba(0, 0, 0, 0.1)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                                <div style="
                                    height: 120px;
                                    background-size: cover;
                                    background-position: center;
                                    @if($relatedBlog->image && file_exists(public_path($relatedBlog->image)))
                                        background-image: url('{{ asset($relatedBlog->image) }}');
                                    @else
                                        background-image: url('{{ asset('blog1.png') }}');
                                    @endif
                                "></div>
                                <div style="padding: 15px;">
                                    <h4 style="
                                        font-family: 'Inter', sans-serif;
                                        font-size: 0.9rem;
                                        font-weight: 600;
                                        color: #482500;
                                        margin: 0 0 8px 0;
                                        line-height: 1.3;
                                    ">{{ Str::limit($relatedBlog->getTranslatedTitle(), 50) }}</h4>
                                    <p style="
                                        font-family: 'Inter', sans-serif;
                                        font-size: 0.8rem;
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
@endsection

@push('head')
<meta name="description" content="{{ $blog->getTranslatedExcerpt() ?? Str::limit($blog->getTranslatedContent(), 160) }}">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    /* Custom styles for responsive design */
    @media (max-width: 768px) {
        .content-grid {
            grid-template-columns: 1fr !important;
            gap: 30px !important;
        }
        
        .blog-image {
            max-width: 250px;
            margin: 0 auto;
        }
        
        h1 {
            font-size: 2.5rem !important;
        }
        
        section > div {
            padding: 30px 20px !important;
        }
    }
    
    @media (max-width: 480px) {
        h1 {
            font-size: 2rem !important;
        }
        
        section > div {
            padding: 25px 15px !important;
        }
        
        .content-grid {
            gap: 25px !important;
        }
    }
</style>
@endpush
