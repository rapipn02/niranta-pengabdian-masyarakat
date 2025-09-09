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
            <!-- Blog 1 -->
            <a href="{{ route('blog.detail') }}" style="text-decoration: none;">
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
            <!-- Blog 1 -->
            <div style="
                background: white;
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                display: flex;
                flex-direction: column;
                height: 100%;
            " class="blog-card" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 30px rgba(0, 0, 0, 0.15)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 20px rgba(0, 0, 0, 0.1)'">
                <!-- Blog Image -->
                <div style="
                    width: 100%;
                    height: 180px;
                    background-image: url('{{ asset('blog1.png') }}');
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
                        " class="blog-title">Gula aren baik untuk tubuh?</h3>
                        
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
                        " class="blog-excerpt">Gula aren mengandung mineral alami seperti kalium, magnesium, dan zat besi, serta memiliki indeks glikemik lebih rendah dibandingkan gula putih, sehingga lebih ramah bagi tubuh dalam menjaga kadar [...]</p>
                    </div>
                    
                    <p style="
                        color: #999;
                        font-family: 'Inter', sans-serif;
                        font-size: 0.8rem;
                        margin: 0;
                        font-weight: 500;
                    ">15 Juli 2025</p>
                </div>
            </div>
            </a>

            <!-- Blog 2 -->
            <div style="
                background: white;
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                display: flex;
                flex-direction: column;
                height: 100%;
            " class="blog-card" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 30px rgba(0, 0, 0, 0.15)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 20px rgba(0, 0, 0, 0.1)'">
                <!-- Blog Image -->
                <div style="
                    width: 100%;
                    height: 180px;
                    background-image: url('{{ asset('blog2.png') }}');
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
                        " class="blog-title">Serupa tapi tak sama!</h3>
                        
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
                        " class="blog-excerpt">Tahukah kamu? Meski sering disamakan, gula aren dan gula merah ternyata berasal dari bahan yang berbeda dan punya cita rasa yang unik [...]</p>
                    </div>
                    
                    <p style="
                        color: #999;
                        font-family: 'Inter', sans-serif;
                        font-size: 0.8rem;
                        margin: 0;
                        font-weight: 500;
                    ">15 Juli 2025</p>
                </div>
            </div>

            <!-- Blog 3 -->
            <div style="
                background: white;
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                display: flex;
                flex-direction: column;
                height: 100%;
            " class="blog-card" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 30px rgba(0, 0, 0, 0.15)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 20px rgba(0, 0, 0, 0.1)'">
                <!-- Blog Image -->
                <div style="
                    width: 100%;
                    height: 180px;
                    background-image: url('{{ asset('blog3.png') }}');
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
                        " class="blog-title">Tips menyimpan gula aren!</h3>
                        
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
                        " class="blog-excerpt">Agar manisnya tetap alami dan tidak mudah rusak, simpan gula aren di wadah tertutup, jauh dari lembap, dan hindari kulkas [...]</p>
                    </div>
                    
                    <p style="
                        color: #999;
                        font-family: 'Inter', sans-serif;
                        font-size: 0.8rem;
                        margin: 0;
                        font-weight: 500;
                    ">15 Juli 2025</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('head')
<meta name="description" content="Blog Niranta - Artikel terbaru seputar gula aren, tips, manfaat, dan informasi menarik lainnya">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

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
        
        .blog-card {
            flex-direction: row !important;
            min-height: 150px !important;
        }
        
        .blog-image {
            width: 120px !important;
            height: 150px !important;
            flex-shrink: 0 !important;
        }
        
        .blog-content {
            padding: 15px !important;
        }
        
        .blog-title {
            font-size: 1rem !important;
            margin-bottom: 8px !important;
        }
        
        .blog-excerpt {
            font-size: 0.8rem !important;
            margin-bottom: 10px !important;
            -webkit-line-clamp: 2 !important;
        }
        
        .hero-title {
            font-size: clamp(3rem, 12vw, 6rem) !important;
        }
        
        .content-section {
            padding: 40px 0 !important;
        }
        
        .content-section > div {
            padding: 0 20px !important;
        }
    }
    
    @media (max-width: 480px) {
        .blogs-grid {
            gap: 15px !important;
        }
        
        .blog-card {
            flex-direction: column !important;
            min-height: auto !important;
        }
        
        .blog-image {
            width: 100% !important;
            height: 150px !important;
        }
        
        .blog-content {
            padding: 12px !important;
        }
        
        .blog-title {
            font-size: 0.95rem !important;
        }
        
        .blog-excerpt {
            font-size: 0.75rem !important;
            margin-bottom: 8px !important;
        }
        
        .hero-title {
            font-size: clamp(2.5rem, 15vw, 5rem) !important;
        }
        
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
@endpush
