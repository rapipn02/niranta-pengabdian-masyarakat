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
            <a href="{{ route('resep') }}" style="
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
            " onmouseover="this.style.color='#D4A574'" onmouseout="this.style.color='white'">CONTACT</a>
        </div>
    </div>
</nav>

<!-- Main Content Section -->
<section style="
    background-color: #F2ECE0;
    padding: 80px 0 60px 0;
    min-height: 100vh;
    margin-top: 48px;
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
        ">Benarkah Gula aren baik untuk tubuh?</h2>

        <!-- Content Grid -->
        <div style="
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 50px;
            align-items: flex-start;
        ">
            <!-- Blog Image -->
            <div style="
                border: 1px solid #C0C0C0;
                padding: 0;
            ">
                <img src="{{ asset('blog1.png') }}" alt="Gula Aren Niranta" style="
                    width: 100%;
                    height: auto;
                    display: block;
                ">
                <div style="
                    text-align: center;
                    background-color: white;
                    padding: 8px;
                    font-family: 'Inter', sans-serif;
                    font-size: 0.8rem;
                    color: #666;
                    border-top: 1px solid #C0C0C0;
                ">15 Juli 2025</div>
            </div>

            <!-- Blog Content -->
            <div>
                <!-- Introduction -->
                <div style="margin-bottom: 30px;">
                    <p style="
                        color: #333;
                        font-family: 'Inter', sans-serif;
                        font-size: 0.95rem;
                        line-height: 1.7;
                        margin-bottom: 20px;
                        text-align: justify;
                    ">Gula aren mengandung mineral alami seperti kalium, magnesium, dan zat besi, serta memiliki indeks glikemik yang lebih rendah dibandingkan gula putih, sehingga lebih ramah bagi tubuh dalam menjaga kadar gula darah yang stabil.</p>
                </div>

                <!-- Section 1: Indeks Glikemik -->
                <div style="margin-bottom: 30px;">
                    <h3 style="
                        color: #482500;
                        font-size: 1rem;
                        font-weight: 600;
                        font-family: 'Inter', sans-serif;
                        margin-bottom: 15px;
                    ">1. Indeks Glikemik Rendah</h3>
                    
                    <p style="
                        color: #333;
                        font-family: 'Inter', sans-serif;
                        font-size: 0.9rem;
                        line-height: 1.6;
                        margin-bottom: 10px;
                        text-align: justify;
                    ">Gula aren memiliki indeks glikemik (IG) yang lebih rendah dibandingkan gula putih. Indeks glikemik adalah ukuran seberapa cepat makanan dapat meningkatkan kadar gula darah. Ini berarti bahwa gula aren secara bertahap, sehingga lebih baik berharga dengan sama seperti krenjang gula darah yang tidak konsumsi gula putih.</p>
                </div>

                <!-- Section 2: Kandungan Vitamin dan Mineral -->
                <div style="margin-bottom: 30px;">
                    <h3 style="
                        color: #482500;
                        font-size: 1rem;
                        font-weight: 600;
                        font-family: 'Inter', sans-serif;
                        margin-bottom: 15px;
                    ">2. Kaya Vitamin dan Mineral</h3>
                    
                    <p style="
                        color: #333;
                        font-family: 'Inter', sans-serif;
                        font-size: 0.9rem;
                        line-height: 1.6;
                        margin-bottom: 10px;
                        text-align: justify;
                    ">Gula aren mengandung vitamin dan mineral alami, seperti:</p>
                    
                    <ul style="
                        color: #333;
                        font-family: 'Inter', sans-serif;
                        font-size: 0.9rem;
                        line-height: 1.5;
                        margin: 10px 0;
                        padding-left: 20px;
                    ">
                        <li style="margin-bottom: 5px;"><strong>Kalium:</strong> membantu menjaga fungsi jantung dan otot,</li>
                        <li style="margin-bottom: 5px;"><strong>Zat besi:</strong> membantu pembentukan sel darah merah,</li>
                        <li style="margin-bottom: 5px;"><strong>Magnesium:</strong> mendukung kerja saraf dan otot,</li>
                        <li style="margin-bottom: 5px;"><strong>Kalsium:</strong> menjaga kesehatan tulang dan gigi.</li>
                    </ul>
                    
                    <p style="
                        color: #333;
                        font-family: 'Inter', sans-serif;
                        font-size: 0.9rem;
                        line-height: 1.6;
                        margin-top: 10px;
                        text-align: justify;
                    ">Karena tidak melalui proses pemurnian seperti gula putih, nutrisi alaminya tetap terjaga.</p>
                </div>

                <!-- Section 3: Energi Lebih Stabil -->
                <div style="margin-bottom: 30px;">
                    <h3 style="
                        color: #482500;
                        font-size: 1rem;
                        font-weight: 600;
                        font-family: 'Inter', sans-serif;
                        margin-bottom: 15px;
                    ">3. Energi Lebih Stabil</h3>
                    
                    <p style="
                        color: #333;
                        font-family: 'Inter', sans-serif;
                        font-size: 0.9rem;
                        line-height: 1.6;
                        margin-bottom: 10px;
                        text-align: justify;
                    ">Gula aren mengandung karbohidrat kompleks, yang dicerna lebih lambat oleh tubuh. Ini memberikan energi yang lebih stabil dan tahan lama dibandingkan dengan gula putih yang memberikan energi cepat tetapi tanpa lonjakkan gula darah yang tiba-tiba sehingga tidak menyebabkan gula putih.</p>
                </div>

                <!-- Section 4: Mengandung Antioksidan -->
                <div style="margin-bottom: 30px;">
                    <h3 style="
                        color: #482500;
                        font-size: 1rem;
                        font-weight: 600;
                        font-family: 'Inter', sans-serif;
                        margin-bottom: 15px;
                    ">4. Mengandung Antioksidan</h3>
                    
                    <p style="
                        color: #333;
                        font-family: 'Inter', sans-serif;
                        font-size: 0.9rem;
                        line-height: 1.6;
                        margin-bottom: 10px;
                        text-align: justify;
                    ">Gula aren mengandung senyawa antioksidan alami seperti polifenol dan flavonoid, yang membantu melawan radikal bebas dalam tubuh dan dapat menurunkan risiko berbagai penyakit kronis.</p>
                    
                    <ul style="
                        color: #333;
                        font-family: 'Inter', sans-serif;
                        font-size: 0.9rem;
                        line-height: 1.5;
                        margin: 10px 0;
                        padding-left: 20px;
                    ">
                        <li style="margin-bottom: 5px;">Melawan radikal bebas (zat berbahaya yang bisa merusak sel tubuh),</li>
                        <li style="margin-bottom: 5px;">Mencegah penuaan dini,</li>
                        <li style="margin-bottom: 5px;">Menurunkan risiko berbagai penyakit kronis.</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Bottom Note -->
        <div style="
            margin-top: 40px;
            text-align: left;
        ">
            <p style="
                color: #666;
                font-family: 'Inter', sans-serif;
                font-size: 0.85rem;
                line-height: 1.5;
                font-style: italic;
            "><strong>Catatan:</strong> Meskipun gula aren memiliki banyak manfaat, tetap konsumsi dalam jumlah yang wajar. Segala sesuatu yang berlebihan tidak baik untuk kesehatan.</p>
        </div>
    </div>
</section>
@endsection

@push('head')
<meta name="description" content="Benarkah Gula aren baik untuk tubuh? - Pelajari manfaat gula aren untuk kesehatan dan mengapa lebih baik dari gula putih biasa">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>

<style>
    /* Custom responsive styles */
    @media (max-width: 768px) {
        /* Mobile Layout Adjustments */
        nav {
            height: 44px !important;
            padding: 0 20px !important;
        }
        
        nav img {
            height: 56px !important;
        }
        
        nav .flex.items-center.space-x-8 {
            display: none !important;
        }
        
        section {
            margin-top: 44px !important;
            padding: 40px 0 40px 0 !important;
        }
        
        section > div {
            padding: 0 20px !important;
        }
        
        /* Page title adjustments */
        h1 {
            font-size: 2.5rem !important;
        }
        
        h2 {
            font-size: 1.2rem !important;
            margin-bottom: 30px !important;
        }
        
        /* Grid becomes single column on mobile */
        .content-grid {
            grid-template-columns: 1fr !important;
            gap: 30px !important;
        }
        
        /* Image adjustments */
        .blog-image {
            max-width: 300px !important;
            margin: 0 auto !important;
        }
        
        /* Text adjustments */
        .blog-content h3 {
            font-size: 0.95rem !important;
        }
        
        .blog-content p,
        .blog-content li {
            font-size: 0.85rem !important;
        }
    }
    
    @media (max-width: 480px) {
        h1 {
            font-size: 2rem !important;
        }
        
        h2 {
            font-size: 1.1rem !important;
        }
        
        section {
            padding: 30px 0 30px 0 !important;
        }
        
        section > div {
            padding: 0 15px !important;
        }
        
        .content-grid {
            gap: 25px !important;
        }
        
        .blog-image {
            max-width: 280px !important;
        }
        
        .blog-content h3 {
            font-size: 0.9rem !important;
            margin-bottom: 10px !important;
        }
        
        .blog-content p,
        .blog-content li {
            font-size: 0.8rem !important;
        }
    }
</style>

<script>
    // Add grid class to content grid
    document.addEventListener('DOMContentLoaded', function() {
        const contentGrid = document.querySelector('[style*="grid-template-columns: 280px 1fr"]');
        if (contentGrid) {
            contentGrid.classList.add('content-grid');
        }
        
        const blogImage = document.querySelector('[style*="border: 1px solid #C0C0C0"]');
        if (blogImage) {
            blogImage.classList.add('blog-image');
        }
        
        const blogContent = blogImage?.nextElementSibling;
        if (blogContent) {
            blogContent.classList.add('blog-content');
        }
    });
</script>
@endpush
