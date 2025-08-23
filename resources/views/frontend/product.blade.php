@extends('frontend.layouts.app')

@section('content')
<!-- Hero Section with Background Image -->
<div style="
    background-image: url('{{ asset('latarproduk.png') }}');
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
            font-size: clamp(3rem, 8vw, 8rem);
            font-weight: bold;
            font-family: 'Inter', sans-serif;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            margin: 0;
            letter-spacing: 0.02em;
        ">Product</h1>
    </div>
</div>

<!-- Include Scroll Indicator -->
@include('frontend.partials.scroll-indicator')

<!-- Products Content Section -->
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
        
        <!-- Products Grid -->
        <div style="
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 40px;
            margin-bottom: 60px;
        ">
            @forelse($products as $product)
                <!-- Product {{ $loop->iteration }} -->
                <div style="
                    background: white;
                    border-radius: 15px;
                    overflow: hidden;
                    box-shadow: 0 10px 30px rgba(72, 37, 0, 0.1);
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                " onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 20px 40px rgba(72, 37, 0, 0.15)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(72, 37, 0, 0.1)'">
                    <div style="height: 250px; overflow: hidden;">
                        @if($product->image)
                            <img src="{{ product_image($product->image) }}" alt="{{ $product->getTranslatedName() }}"
                                 style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <img src="{{ product_image('placeholder-product.jpg') }}" alt="{{ $product->getTranslatedName() }}"
                                 style="width: 100%; height: 100%; object-fit: cover;">
                        @endif
                    </div>
                    <div style="padding: 25px;">
                        <h3 style="color: #482500; font-size: 1.25rem; font-weight: 600; margin-bottom: 20px; font-family: 'Inter', sans-serif;">
                            {{ $product->getTranslatedName() }}
                        </h3>
                        <p style="color: #B1410A; font-size: 1.1rem; font-weight: 600; margin-bottom: 20px;">
                            {{ $product->formatted_price }}
                        </p>
                        @if($product->link_produk)
                            <a href="{{ $product->link_produk }}" target="_blank" style="
                                display: inline-block;
                                background-color: #482500;
                                color: white;
                                padding: 12px 24px;
                                border-radius: 8px;
                                text-decoration: none;
                                font-weight: 500;
                                transition: background-color 0.3s ease;
                            " onmouseover="this.style.backgroundColor='#3a1d00'" onmouseout="this.style.backgroundColor='#482500'">
                                Buy Now
                            </a>
                        @else
                            <span style="
                                display: inline-block;
                                background-color: #ccc;
                                color: #666;
                                padding: 12px 24px;
                                border-radius: 8px;
                                font-weight: 500;
                            ">
                                Contact Us
                            </span>
                        @endif
                    </div>
                </div>
            @empty
                <!-- Default products when no data -->
                <div style="
                    grid-column: 1 / -1;
                    text-align: center;
                    padding: 60px 0;
                ">
                    <p style="color: #888; font-size: 1.1rem; font-family: 'Inter', sans-serif;">
                        Belum ada produk yang tersedia
                    </p>
                </div>
            @endforelse
        </div>
        
        <!-- Pagination -->
        @if($products->hasPages())
            <div style="
                display: flex;
                justify-content: center;
                margin-top: 40px;
            ">
                {{ $products->links() }}
            </div>
        @endif
    </div>
</section>
@endsection

@push('head')
<meta name="description" content="Jelajahi koleksi produk gula kelapa berkualitas tinggi kami yang diproduksi dengan metode tradisional dan modern">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    /* Ensure full height for hero section */
    body, html {
        margin: 0;
        padding: 0;
        height: 100%;
    }
    
    /* Custom styles for responsive design */
    @media (max-width: 1200px) {
        /* Tablet adjustments */
        .products-grid {
            grid-template-columns: repeat(2, 1fr) !important;
            gap: 30px !important;
        }
    }
    
    @media (max-width: 768px) {
        /* Mobile adjustments */
        .hero-section {
            height: 80vh !important;
        }
        
        .hero-title {
            font-size: clamp(2rem, 12vw, 4rem) !important;
        }
        
        .products-section {
            padding: 40px 20px !important;
        }
        
        .products-grid {
            grid-template-columns: 1fr !important;
            gap: 30px !important;
        }
    }
    
    @media (max-width: 480px) {
        .hero-section {
            height: 70vh !important;
        }
        
        .products-section {
            padding: 30px 15px !important;
        }
    }
</style>
@endpush
