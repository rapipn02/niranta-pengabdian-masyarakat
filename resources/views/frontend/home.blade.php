@extends('layouts.frontend')

@section('title', 'Home - Niranta Palm Sugar')

@section('content')
<!-- Include Navbar -->
@include('frontend.partials.navbar')

<!-- Hero Section -->
<div class="relative min-h-screen bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('home.png') }}'); padding-top: 80px;">
    <!-- Content -->
    <div class="relative z-10 flex items-center justify-center min-h-screen px-4" style="min-height: calc(100vh - 80px);">
        <div class="text-center text-white max-w-4xl mx-auto">
            <!-- Main Heading -->
            <h1 class="hero-title mb-4 leading-none tracking-tight" style="
                font-size: clamp(2.5rem, 8vw, 9rem);
                font-weight: 800;
                font-family: 'Inter', sans-serif;
                text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
                letter-spacing: -0.02em;
                line-height: 0.9;
            ">
                <span class="block">{{ __('messages.home.hero_title') }}</span>
            </h1>
            
            <!-- Subheading -->
            <div class="flex flex-col items-center justify-center hero-subtitle" style="gap: clamp(20px, 5vw, 61px); margin-top: clamp(20px, 4vw, 40px);">
                <span class="block text-[#F2ECE0] tracking-wide" style="
                    text-shadow: 0 2px 8px rgba(72,37,0,0.18); 
                    font-family: 'Inter', sans-serif; 
                    font-weight: 400; 
                    font-size: clamp(1rem, 3vw, 1.5rem); 
                    line-height: 1.5; 
                    margin: 0 auto;
                ">{{ __('messages.home.hero_subtitle') }}</span>
                <a
                    href="{{ route('product') }}"
                    class="hero-button flex items-center justify-center font-semibold border-none outline-none transition-all duration-200"
                    style="
                        background: #E2D0BA;
                        border-radius: 40px;
                        width: clamp(200px, 50vw, 296px);
                        height: clamp(45px, 10vw, 60px);
                        flex-shrink: 0;
                        box-shadow: 0 2px 12px rgba(72,37,0,0.10);
                        font-family: 'Inter', sans-serif;
                        font-weight: 500;
                        font-size: clamp(0.9rem, 2.5vw, 1.25rem);
                        margin: 0 auto;
                        color: #482500;
                        text-decoration: none;
                    "
                >
                    Buy now
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Include Scroll Indicator -->
@include('frontend.partials.scroll-indicator')

<!-- Our Product Section -->
<!-- Spacer responsive -->
<div style="height: clamp(40px, 8vw, 80px); width:100%; background:#F2ECE0;" class="content-section" data-content></div>

<section class="py-8 md:py-16" style="background-color: #F2ECE0;">
    <div class="max-w-7xl mx-auto px-4">
        <!-- Header -->
        <div class="text-center mb-8 md:mb-12">
            <!-- Title -->
            <h2 class="product-title" style="
                color: #000;
                text-align: center;
                font-family: 'Inter', sans-serif;
                font-size: clamp(24px, 6vw, 42px);
                font-style: normal;
                font-weight: 900;
                line-height: 1.2;
                margin-bottom: clamp(12px, 3vw, 18px);
                align-self: stretch;
            ">
                OUR PRODUCT
            </h2>
            <!-- Description -->
            <p class="product-description" style="
                color: #000;
                text-align: center;
                font-family: 'Inter', sans-serif;
                font-size: clamp(14px, 4vw, 24px);
                font-style: normal;
                font-weight: 400;
                line-height: 1.4;
                margin: 0 auto;
                max-width: 1033px;
                padding: 0 20px; 
            ">
                {{ __('frontend.product_tagline') }}
            </p>
        </div>
        
        <!-- Product Grid - Responsive Layout -->
        <div class="flex justify-center items-center">
            <div class="product-grid flex flex-wrap justify-center items-center" style="
                gap: clamp(32px, 8vw, 48px);
                max-width: 100%;
            ">
                <!-- Product 1 -->
                <div class="flex items-center justify-center product-item" style="
                    min-width: clamp(160px, 40vw, 240px);
                ">
                    <img src="{{ asset('produk1.png') }}" alt="Niranta Product 1" style="
                        width: auto; 
                        height: clamp(160px, 40vw, 352px); 
                        object-fit: contain;
                        max-width: 100%;
                    ">
                </div>
                
                <!-- Product 2 -->
                <div class="flex items-center justify-center product-item" style="
                    min-width: clamp(160px, 40vw, 240px);
                ">
                    <img src="{{ asset('produk2.png') }}" alt="Niranta Product 2" style="
                        width: auto; 
                        height: clamp(160px, 40vw, 352px); 
                        object-fit: contain;
                        max-width: 100%;
                    ">
                </div>
                
                <!-- Product 3 -->
                <div class="flex items-center justify-center product-item" style="
                    min-width: clamp(160px, 40vw, 240px);
                ">
                    <img src="{{ asset('produk3.png') }}" alt="Niranta Product 3" style="
                        width: auto; 
                        height: clamp(160px, 40vw, 352px); 
                        object-fit: contain;
                        max-width: 100%;
                    ">
                </div>
                
                <!-- Product 4 -->
                <div class="flex items-center justify-center product-item" style="
                    min-width: clamp(160px, 40vw, 240px);
                ">
                    <img src="{{ asset('produk4.png') }}" alt="Niranta Product 4" style="
                        width: auto; 
                        height: clamp(160px, 40vw, 352px); 
                        object-fit: contain;
                        max-width: 100%;
                    ">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Spacer responsive -->
<div style="height: clamp(30px, 5vw, 93px); width:100%; background:#F2ECE0;"></div>

<!-- History & Why Choose Us Section -->
<section class="history-why-section" style="
    padding: 0; 
    margin: 0; 
    overflow-x: hidden; 
    display: flex; 
    justify-content: center; 
    align-items: center; 
    min-height: clamp(400px, 50vw, 500px); 
    background-color: #F2ECE0;
">
    <div class="history-why-container" style="
        display: flex; 
        width: 100vw; 
        height: clamp(400px, 50vw, 380px); 
        margin: 0; 
        padding: 0;
    ">
        
        <!-- History Section (Brown Background) -->
        <div class="history-section" style="
            width: 60%;
            height: 100%;
            flex-shrink: 0;
            background: #482500;
            position: relative;
            padding: clamp(20px, 4vw, 40px) clamp(15px, 3vw, 30px);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
        ">
            <div class="history-content" style="z-index: 2; position: relative; text-align: left; max-width: clamp(250px, 50vw, 400px);">
                <h2 style="
                    align-self: stretch;
                    color: #FFF;
                    font-family: 'Poppins', sans-serif;
                    font-size: clamp(18px, 4vw, 28px);
                    font-style: normal;
                    font-weight: 900;
                    line-height: 1.2;
                    margin-bottom: clamp(10px, 2vw, 15px);
                ">{{ __('frontend.our_history') }}</h2>
                <p style="
                    color: #FFF;
                    font-family: 'Inter', sans-serif;
                    font-size: clamp(12px, 2.5vw, 16px);
                    font-style: normal;
                    font-weight: 400;
                    line-height: 1.4;
                    margin: 0;
                ">
                    {{ __('frontend.our_history_text') }}
                </p>
            </div>
            
            <!-- Product Image Overlay - Responsive -->
            <div class="history-image-overlay" style="
                position: absolute;
                right: 0;
                top: 50%;
                transform: translateY(-50%);
                z-index: 1;
                width: clamp(200px, 40vw, 280px);
                height: 100%;
                flex-shrink: 0;
                display: flex;
                align-items: center;
                justify-content: flex-end;
            ">
                <!-- Tempel Background Image -->
                <img src="{{ asset('tempel.png') }}" alt="Background" style="
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                    z-index: 1;
                    opacity: 0.7;
                ">
                <!-- History Main Image -->
                <img src="{{ asset('history.png') }}" alt="History Main Image" style="
                    position: relative;
                    z-index: 2;
                    width: 100%;
                    height: 100%;
                    object-fit: contain;
                    object-position: center;
                ">
            </div>
        </div>

        <!-- Why Choose Us Section (Cream Background) -->
        <div class="why-choose-section" style="
            width: 40%;
            height: 100%;
            flex-shrink: 0;
            background: #E2D0BA;
            padding: clamp(20px, 4vw, 30px) clamp(15px, 3vw, 25px);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        ">
            <div class="why-choose-content" style="
                display: flex; 
                flex-direction: column; 
                align-items: center; 
                gap: clamp(10px, 2vw, 15px);
                max-width: 100%;
            ">
                <h2 style="
                    align-self: stretch;
                    color: #000;
                    text-align: center;
                    font-family: 'Poppins', sans-serif;
                    font-size: clamp(16px, 4vw, 26px);
                    font-style: normal;
                    font-weight: 900;
                    line-height: 1.2;
                    margin: 0;
                ">Why choose us?</h2>
                <p style="
                    align-self: stretch;
                    color: #000;
                    text-align: center;
                    font-family: 'Inter', sans-serif;
                    font-size: clamp(11px, 2.5vw, 15px);
                    font-style: normal;
                    font-weight: 400;
                    line-height: 1.4;
                    margin: 0;
                ">
                    {{ __('frontend.why_choose_us_text') }}
                </p>
                
                <a href="{{ route('product') }}" style="
                    width: clamp(120px, 25vw, 170px);
                    height: clamp(30px, 6vw, 38px);
                    flex-shrink: 0;
                    border-radius: 22px;
                    background: #482500;
                    border: none;
                    cursor: pointer;
                    transition: all 0.3s ease;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin-top: clamp(8px, 2vw, 12px);
                    text-decoration: none;
                " onmouseover="this.style.background='#5a2e00'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 12px rgba(72, 37, 0, 0.3)'" onmouseout="this.style.background='#482500'; this.style.transform='translateY(0)'; this.style.boxShadow='none'">
                    <span style="
                        color: #FFF;
                        font-family: 'Inter', sans-serif;
                        font-size: clamp(10px, 2vw, 13px);
                        font-style: normal;
                        font-weight: 700;
                        line-height: normal;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    ">Buy now</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Today Recipes Section -->
<section class="today-recipes-section" style="
    background-color: #F2ECE0;
    padding: clamp(30px, 8vw, 60px) 0;
    margin: 0;
    width: 100%;
">
    <div class="recipes-container" style="
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 clamp(20px, 5vw, 40px);
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: clamp(30px, 8vw, 60px);
    ">
        
        <!-- Left Content -->
        <div class="recipes-content" style="
            flex: 1;
            max-width: clamp(300px, 50vw, 400px);
            display: flex;
            flex-direction: column;
            gap: clamp(16px, 4vw, 24px);
        ">
            <!-- Logo -->
            <div style="margin-bottom: clamp(13px, 3vw, 25px);">
                <img src="{{ asset('logo.png') }}" alt="Niranta Logo" style="
                    height: clamp(40px, 6vw, 50px);
                    width: auto;
                    object-fit: contain;
                ">
            </div>
            
            <!-- Heading -->
            <h2 style="
                color: #000;
                font-family: 'Poppins', sans-serif;
                font-size: clamp(24px, 6vw, 36px);
                font-style: normal;
                font-weight: 900;
                line-height: 1.2;
                margin: 0;
            ">Today Recipes</h2>
            
            <!-- Subtitle -->
            <p style="
                color: #000;
                font-family: 'Inter', sans-serif;
                font-size: clamp(14px, 3vw, 16px);
                font-style: normal;
                font-weight: 400;
                line-height: 1.5;
                margin: 0;
                opacity: 0.8;
            ">
                {!! __('frontend.natural_delicious_tagline') !!}
            </p>
            
            <!-- Button -->
            <a href="{{ route('recipes') }}" style="display: flex; align-items: center; justify-content: center; gap: 8px; width: clamp(160px, 40vw, 200px); height: clamp(36px, 7vw, 44px); background: #482500; border-radius: 20px; border: none; cursor: pointer; transition: all 0.3s ease; margin-top: clamp(6px, 2vw, 8px); padding: 0 clamp(12px, 2.5vw, 16px); white-space: nowrap; overflow: hidden; font-family: 'Inter', sans-serif; font-size: clamp(12px, 2.8vw, 14px); font-weight: 600; color: #FFF; text-decoration: none;" onmouseover="this.style.background='#5a2e00'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 12px rgba(72, 37, 0, 0.3)'" onmouseout="this.style.background='#482500'; this.style.transform='translateY(0)'; this.style.boxShadow='none'">
   {{ __('frontend.check_other_recipes') }}
   <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="flex-shrink: 0;">
       <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="#FFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
   </svg>
</a>
        </div>
        
        <!-- Vertical Divider -->
        <div class="recipes-divider" style="
            width: 2px;
            height: clamp(150px, 25vw, 200px);
            background-color: #482500;
            opacity: 1;
            flex-shrink: 0;
        "></div>
        
        <!-- Right Content - Recipe Images -->
        <div class="recipes-grid" style="
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: clamp(12px, 3vw, 20px);
            flex-wrap: wrap;
            max-width: clamp(300px, 50vw, 600px);
        ">
            <!-- Recipe 1 -->
            <div class="recipe-item" style="
                width: clamp(80px, 18vw, 130px);
                height: clamp(85px, 20vw, 140px);
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease;
            " onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                <img src="{{ asset('resep1.png') }}" alt="Recipe 1" style="
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                ">
            </div>
            
            <!-- Recipe 2 -->
            <div class="recipe-item" style="
                width: clamp(80px, 18vw, 130px);
                height: clamp(85px, 20vw, 140px);
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease;
            " onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                <img src="{{ asset('resep2.png') }}" alt="Recipe 2" style="
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                ">
            </div>
            
            <!-- Recipe 3 -->
            <div class="recipe-item" style="
                width: clamp(80px, 18vw, 130px);
                height: clamp(85px, 20vw, 140px);
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease;
            " onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                <img src="{{ asset('resep3.png') }}" alt="Recipe 3" style="
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                ">
            </div>
            
            <!-- Recipe 4 -->
            <div class="recipe-item" style="
                width: clamp(80px, 18vw, 130px);
                height: clamp(85px, 20vw, 140px);
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease;
            " onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                <img src="{{ asset('resep4.png') }}" alt="Recipe 4" style="
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                ">
            </div>
        </div>
    </div>
</section>

<!-- Video Profile Section -->
<section class="video-profile-section" style="
    background-color: #F2ECE0;
    padding: clamp(40px, 8vw, 80px) 0;
    margin: 0;
    width: 100%;
">
    <div class="video-container" style="
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 clamp(20px, 5vw, 40px);
        text-align: center;
    ">
        <!-- Section Title -->
        <h2 style="
            color: #000;
            font-family: 'Poppins', sans-serif;
            font-size: clamp(28px, 6vw, 42px);
            font-style: normal;
            font-weight: 900;
            line-height: 1.2;
            margin-bottom: clamp(20px, 4vw, 30px);
        ">Company Profile</h2>
        
        <!-- Video Player -->
        <div class="video-wrapper" style="
            position: relative;
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 32px rgba(72, 37, 0, 0.15);
            background: #000;
        ">
            <video 
                id="companyProfileVideo"
                controls 
                muted
                preload="metadata"
                style="
                    width: 100%;
                    height: auto;
                    display: block;
                    border-radius: 20px;
                "
                poster="{{ asset('home.png') }}"
            >
                <source src="{{ asset('vidprofil.mp4') }}" type="video/mp4">
                <p style="
                    color: #482500;
                    font-family: 'Inter', sans-serif;
                    font-size: 16px;
                    padding: 20px;
                ">
                    Your browser does not support the video tag. 
                    <a href="{{ asset('vidprofil.mp4') }}" style="color: #482500; text-decoration: underline;">
                        Download the video here
                    </a>
                </p>
            </video>
            
            <!-- Play/Pause Indicator -->
            <div id="videoPlayIndicator" style="
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background: rgba(0, 0, 0, 0.7);
                border-radius: 50%;
                width: 60px;
                height: 60px;
                display: flex;
                align-items: center;
                justify-content: center;
                opacity: 0;
                transition: opacity 0.3s ease;
                pointer-events: none;
                z-index: 10;
            ">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="white">
                    <path d="M8 5v14l11-7z"/>
                </svg>
            </div>
        </div>
        
        <!-- Video Description -->
        <p style="
            color: #000;
            font-family: 'Inter', sans-serif;
            font-size: clamp(14px, 3vw, 18px);
            font-style: normal;
            font-weight: 400;
            line-height: 1.5;
            margin-top: clamp(20px, 4vw, 30px);
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            opacity: 0.8;
        ">
            Discover the story behind Niranta Palm Sugar and our commitment to providing natural, high-quality products for your healthy lifestyle.
        </p>
    </div>
</section>

<!-- Custom Styles -->
<style>
    /* Import Google Fonts */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@900&family=Inter:wght@400;500;600;700;800&display=swap');
    
    /* Base Styles */
    * {
        box-sizing: border-box;
    }
    
    body {
        margin: 0;
        padding: 0;
        overflow-x: hidden;
    }
    
    /* Custom styles for better visual match */
    .bg-cover {
        background-size: cover;
    }
    
    .bg-center {
        background-position: center;
    }
    
    .bg-no-repeat {
        background-repeat: no-repeat;
    }
    
    /* Typography improvements */
    h1 {
        font-family: 'Inter', sans-serif;
        font-weight: 800;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
        letter-spacing: -0.02em;
    }
    
    p {
        font-family: 'Inter', sans-serif;
        font-weight: 300;
        letter-spacing: 0.02em;
    }
    
    /* Button styling */
    button {
        border: none;
        cursor: pointer;
        font-family: 'Inter', sans-serif;
        font-weight: 500;
    }
    
    button:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.5);
    }
    
    button:active {
        transform: scale(0.98);
    }

    /* Mobile First Responsive Design */
    
    /* Video Profile Section Responsive */
    .video-wrapper {
        aspect-ratio: 16/9;
        position: relative;
    }
    
    .video-wrapper video {
        transition: opacity 0.3s ease;
    }
    
    .video-wrapper video:not([src]) {
        opacity: 0.7;
    }
    
    /* Video loading spinner */
    .video-wrapper::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 40px;
        height: 40px;
        border: 3px solid rgba(255, 255, 255, 0.3);
        border-top: 3px solid #482500;
        border-radius: 50%;
        animation: videoSpin 1s linear infinite;
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: 5;
    }
    
    .video-wrapper.loading::before {
        opacity: 1;
    }
    
    @keyframes videoSpin {
        0% { transform: translate(-50%, -50%) rotate(0deg); }
        100% { transform: translate(-50%, -50%) rotate(360deg); }
    }
    
    /* Video autoplay indicator */
    #videoPlayIndicator {
        pointer-events: none;
    }
    
    #videoPlayIndicator svg {
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.3));
    }
    
    @media (max-width: 480px) {
        .video-wrapper {
            border-radius: 12px !important;
            margin: 0 10px !important;
        }
        
        .video-wrapper video {
            border-radius: 12px !important;
        }
        
        #videoPlayIndicator {
            width: 50px !important;
            height: 50px !important;
        }
        
        #videoPlayIndicator svg {
            width: 20px !important;
            height: 20px !important;
        }
    }
    
    @media (min-width: 481px) and (max-width: 768px) {
        .video-wrapper {
            border-radius: 16px !important;
        }
        
        .video-wrapper video {
            border-radius: 16px !important;
        }
    }
    
    /* Small Mobile - 320px to 480px */
    @media (max-width: 480px) {
        /* History Section Mobile Stack */
        .history-why-container {
            flex-direction: column !important;
            height: auto !important;
        }
        
        .history-section,
        .why-choose-section {
            width: 100% !important;
            height: auto !important;
            min-height: 250px !important;
            position: relative !important;
        }
        
        .history-section {
            padding: 30px 20px !important;
        }
        
        .why-choose-section {
            padding: 30px 20px !important;
        }
        
        .history-image-overlay {
            position: relative !important;
            right: auto !important;
            top: auto !important;
            transform: none !important;
            width: 100% !important;
            height: 250px !important;
            margin-top: 20px !important;
        }
        
        .history-image-overlay img {
            object-fit: contain !important;
            object-position: center !important;
        }
        
        .history-content {
            max-width: 100% !important;
        }
        
        /* Today Recipes Mobile Stack */
        .recipes-container {
            flex-direction: column !important;
            text-align: center !important;
        }
        
        .recipes-content {
            max-width: 100% !important;
            align-items: center !important;
        }
        
        .recipes-divider {
            width: 60% !important;
            height: 2px !important;
            margin: 20px auto !important;
        }
        
        .recipes-grid {
            max-width: 100% !important;
            justify-content: center !important;
        }
        
        /* Product Grid Mobile - 2x2 Grid */
        .product-grid {
            display: grid !important;
            grid-template-columns: 1fr 1fr !important;
            gap: clamp(16px, 4vw, 20px) !important;
            max-width: 280px !important;
            margin: 0 auto !important;
        }
        
        .product-item {
            min-width: auto !important;
        }
    }
    
    /* Large Mobile - 481px to 768px */
    @media (min-width: 481px) and (max-width: 768px) {
        /* History Section Tablet */
        .history-why-container {
            flex-direction: column !important;
            height: auto !important;
        }
        
        .history-section,
        .why-choose-section {
            width: 100% !important;
            height: auto !important;
            min-height: 300px !important;
        }
        
        .history-image-overlay {
            position: relative !important;
            right: auto !important;
            top: auto !important;
            transform: none !important;
            width: 100% !important;
            height: 250px !important;
            margin-top: 25px !important;
        }
        
        .history-image-overlay img {
            object-fit: contain !important;
            object-position: center !important;
        }
        
        /* Today Recipes Tablet */
        .recipes-container {
            flex-direction: column !important;
            text-align: center !important;
        }
        
        .recipes-content {
            max-width: 100% !important;
            align-items: center !important;
        }
        
        .recipes-divider {
            width: 50% !important;
            height: 2px !important;
            margin: 25px auto !important;
        }
    }
    
    /* Tablet - 769px to 1024px */
    @media (min-width: 769px) and (max-width: 1024px) {
        .history-section,
        .why-choose-section {
            padding: 35px 25px !important;
        }
        
        .history-image-overlay {
            right: -30px !important;
            width: 250px !important;
        }
    }
    
    /* Large Tablet/Small Desktop - 1025px to 1200px */
    @media (min-width: 1025px) and (max-width: 1200px) {
        .history-section,
        .why-choose-section {
            padding: 40px 30px !important;
        }
        
        .history-image-overlay {
            right: -20px !important;
            width: 270px !important;
        }
    }
    
    /* Landscape Mobile Specific */
    @media (max-width: 896px) and (orientation: landscape) {
        .hero-title {
            font-size: clamp(2rem, 6vw, 4rem) !important;
        }
        
        .hero-subtitle {
            gap: clamp(15px, 3vw, 30px) !important;
            margin-top: clamp(15px, 3vw, 25px) !important;
        }
        
        .hero-button {
            width: clamp(180px, 40vw, 250px) !important;
            height: clamp(40px, 8vw, 50px) !important;
        }
    }
    
    /* Ultra Wide Screen Support */
    @media (min-width: 1920px) {
        .recipes-container,
        .max-w-7xl {
            max-width: 1400px !important;
        }
    }
    
    /* Print Styles */
    @media print {
        .hero-section,
        .today-recipes-section,
        .history-why-section {
            break-inside: avoid;
        }
    }
    
    /* Accessibility Improvements */
    @media (prefers-reduced-motion: reduce) {
        * {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
        }
    }
    
    /* High Contrast Mode */
    @media (prefers-contrast: high) {
        .hero-button,
        button {
            border: 2px solid #FFF !important;
        }
    }
</style>

<script>
    // Video autoplay on scroll functionality
    document.addEventListener('DOMContentLoaded', function() {
        const video = document.getElementById('companyProfileVideo');
        const playIndicator = document.getElementById('videoPlayIndicator');
        let hasPlayedOnce = false;
        
        // Video caching - preload video when page loads
        function preloadVideo() {
            if (video) {
                video.preload = 'auto';
                // Force load the video metadata
                video.load();
            }
        }
        
        // Intersection Observer for autoplay on scroll
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.5 // Video needs to be 50% visible
        };
        
        const videoObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting && !hasPlayedOnce) {
                    // Auto play when video comes into view
                    video.muted = true; // Ensure it's muted for autoplay
                    video.play().then(() => {
                        hasPlayedOnce = true;
                        showPlayIndicator();
                    }).catch((error) => {
                        console.log('Autoplay prevented:', error);
                    });
                }
            });
        }, observerOptions);
        
        // Observe the video element
        if (video) {
            videoObserver.observe(video);
        }
        
        // Show play indicator
        function showPlayIndicator() {
            if (playIndicator) {
                playIndicator.style.opacity = '1';
                setTimeout(() => {
                    playIndicator.style.opacity = '0';
                }, 1500);
            }
        }
        
        // Video event listeners
        if (video) {
            // Show/hide play indicator on play/pause
            video.addEventListener('play', () => {
                showPlayIndicator();
            });
            
            video.addEventListener('pause', () => {
                if (playIndicator) {
                    const pauseIcon = playIndicator.querySelector('svg');
                    pauseIcon.innerHTML = '<path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>';
                    playIndicator.style.opacity = '1';
                    setTimeout(() => {
                        playIndicator.style.opacity = '0';
                        // Reset to play icon
                        pauseIcon.innerHTML = '<path d="M8 5v14l11-7z"/>';
                    }, 1500);
                }
            });
            
            // Lazy load video when user interacts
            video.addEventListener('click', () => {
                if (video.paused) {
                    video.play();
                } else {
                    video.pause();
                }
            });
            
            // Progressive loading for better performance
            video.addEventListener('loadstart', () => {
                console.log('Video loading started');
            });
            
            video.addEventListener('loadeddata', () => {
                console.log('Video data loaded');
            });
            
            video.addEventListener('canplaythrough', () => {
                console.log('Video can play through');
            });
        }
        
        // Initialize video preloading
        preloadVideo();
        
        // Cache video in browser storage for faster subsequent loads
        if ('serviceWorker' in navigator) {
            // Register service worker for video caching
            navigator.serviceWorker.register('/sw.js').then((registration) => {
                console.log('Service Worker registered for video caching');
            }).catch((error) => {
                console.log('Service Worker registration failed');
            });
        }
        
        // Local storage caching for video preferences
        const videoPrefs = {
            muted: localStorage.getItem('niranta_video_muted') === 'true',
            volume: parseFloat(localStorage.getItem('niranta_video_volume')) || 0.5
        };
        
        // Apply saved preferences
        if (video) {
            video.muted = videoPrefs.muted;
            video.volume = videoPrefs.volume;
            
            // Save preferences when changed
            video.addEventListener('volumechange', () => {
                localStorage.setItem('niranta_video_muted', video.muted);
                localStorage.setItem('niranta_video_volume', video.volume);
            });
        }
    });
</script>

@endsection