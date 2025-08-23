@extends('frontend.layouts.app')

@section('content')
<!-- Hero Section with Background Image -->
<div style="
    background-image: url('{{ asset('latarresep.png') }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
    width: 100%;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
">
    <!-- Overlay for better text readability -->
    <div style="
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.3);
    "></div>
    
    <!-- Content -->
    <div style="
        position: relative;
        z-index: 10;
        text-align: center;
    ">
        <h1 style="
            color: white;
            font-size: clamp(4rem, 10vw, 8rem);
            font-weight: bold;
            font-family: 'Inter', sans-serif;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            margin: 0;
            letter-spacing: 0.02em;
        ">Blogs</h1>
    </div>
</div>

<!-- Include Scroll Indicator -->
@include('frontend.partials.scroll-indicator')

<!-- Blog Content Section -->
<section style="
    background-color: #F2ECE0;
    padding: 80px 0;
    min-height: 50vh;
" class="content-section" data-content>
    <div style="
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 40px;
    ">
        <!-- Blogs Grid - 3 Columns Horizontal Layout -->
        <div style="
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-bottom: 60px;
        " class="blogs-grid">
            @forelse($blogs as $blog)
                <!-- Blog {{ $loop->iteration }} -->
                <a href="{{ route('blogs.show', $blog) }}" style="text-decoration: none;">
                    <div style="
                        background: white;
                        border-radius: 12px;
                        overflow: hidden;
                        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
                        transition: transform 0.3s ease, box-shadow 0.3s ease;
                        display: flex;
                        flex-direction: column;
                        height: 100%;
                        cursor: pointer;
                    " class="blog-card" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 30px rgba(0, 0, 0, 0.15)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 20px rgba(0, 0, 0, 0.1)'">
                        <!-- Blog Image -->
                        <div style="
                            width: 100%;
                            height: 180px;
                            @if($blog->image)
                                background-image: url('{{ blog_image($blog->image) }}');
                            @else
                                background-image: url('{{ blog_image('placeholder-blog.jpg') }}');
                            @endif
                            background-size: cover;
                            background-position: center;
                            flex-shrink: 0;
                        " class="blog-image"></div>
                        
                        <!-- Blog Content -->
                        <div style="
                            padding: 20px;
                            flex: 1;
                            display: flex;
                            flex-direction: column;
                            justify-content: space-between;
                        " class="blog-content">
                            <div>
                                <h3 style="
                                    color: #482500;
                                    font-family: 'Inter', sans-serif;
                                    font-size: 1.1rem;
                                    font-weight: 600;
                                    margin: 0 0 12px 0;
                                    line-height: 1.3;
                                " class="blog-title">{{ $blog->getTranslatedTitle() }}</h3>
                                
                                <p style="
                                    color: #666;
                                    font-family: 'Inter', sans-serif;
                                    font-size: 0.85rem;
                                    line-height: 1.5;
                                    margin: 0 0 15px 0;
                                    display: -webkit-box;
                                    -webkit-line-clamp: 3;
                                    -webkit-box-orient: vertical;
                                    overflow: hidden;
                                " class="blog-excerpt">
                                    @if($blog->getTranslatedExcerpt())
                                        {{ Str::limit($blog->getTranslatedExcerpt(), 120) }}
                                    @else
                                        {{ Str::limit($blog->getTranslatedContent(), 120) }}
                                    @endif
                                </p>
                            </div>
                            
                            <p style="
                                color: #999;
                                font-family: 'Inter', sans-serif;
                                font-size: 0.8rem;
                                margin: 0;
                                font-weight: 500;
                            ">{{ \Carbon\Carbon::parse($blog->tanggal_upload)->format('d F Y') }}</p>
                        </div>
                    </div>
                </a>
            @empty
                <!-- Default content when no blogs -->
                <div style="
                    grid-column: 1 / -1;
                    text-align: center;
                    padding: 60px 0;
                ">
                    <p style="color: #888; font-size: 1.1rem; font-family: 'Inter', sans-serif;">
                        Belum ada blog yang dipublikasikan
                    </p>
                </div>
            @endforelse
        </div>
        
        <!-- Pagination -->
        @if($blogs->hasPages())
            <div style="
                display: flex;
                justify-content: center;
                margin-top: 40px;
            ">
                {{ $blogs->links() }}
            </div>
        @endif
    </div>
</section>

<style>
    /* Custom styles for responsive design */
    @media (max-width: 1024px) {
        /* 2 columns on tablet */
        .blogs-grid {
            grid-template-columns: repeat(2, 1fr) !important;
            gap: 25px !important;
        }
    }
    
    @media (max-width: 768px) {
        /* Single column on mobile */
        .blogs-grid {
            grid-template-columns: 1fr !important;
            gap: 20px !important;
        }
        
        .content-section {
            padding: 40px 0 !important;
        }
        
        .content-section > div {
            padding: 0 20px !important;
        }
    }
    
    @media (max-width: 480px) {
        .content-section {
            padding: 30px 0 !important;
        }
        
        .content-section > div {
            padding: 0 15px !important;
        }
    }
    
    /* Ensure equal height cards */
    .blogs-grid {
        align-items: stretch;
    }
    
    .blog-card {
        height: 100%;
    }
</style>
@endsection
