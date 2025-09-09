@extends('layouts.frontend')

@section('title', 'Home - Niranta Palm Sugar')

@section('content')
<!-- Include Navbar -->
@include('frontend.partials.navbar')

<!-- Hero Section -->
<div class="hero-section relative min-h-screen" style="padding-top: 80px; background-color: #F2ECE0;">
    <!-- Background Video Container -->
    <div class="absolute inset-0 w-full h-full overflow-hidden" style="z-index: 1;">
        <video 
            id="heroBackgroundVideo"
            autoplay 
            loop 
            muted 
            playsinline
            preload="auto"
            class="w-full h-full object-cover"
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;"
        >
            <source src="{{ asset('vidniranta.mp4') }}" type="video/mp4">
        </video>
    </div>
    
    <!-- Dark overlay for better text readability -->
    <div class="absolute inset-0 w-full h-full" style="z-index: 2; background: rgba(0, 0, 0, 0.4);"></div>
    
    <!-- Content -->
    <div class="relative flex items-center justify-center min-h-screen px-4" style="min-height: calc(100vh - 80px); z-index: 10;">
        <div class="text-center max-w-4xl mx-auto" style="color: #FFFFFF;">
            <!-- Main Heading -->
            <h1 class="hero-title mb-4 leading-none tracking-tight" style="
                font-size: clamp(2.5rem, 8vw, 9rem);
                font-weight: 800;
                font-family: 'Inter', sans-serif;
                color: #FFFFFF;
                text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
                letter-spacing: -0.02em;
                line-height: 0.9;
            ">
                <span class="block">{{ __('messages.home.hero_title') }}</span>
            </h1>
            
            <!-- Subheading -->
            <div class="flex flex-col items-center justify-center hero-subtitle" style="gap: clamp(20px, 5vw, 61px); margin-top: clamp(20px, 4vw, 40px);">
                <span class="block tracking-wide" style="
                    color: #FFFFFF;
                    text-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
                    font-family: 'Inter', sans-serif; 
                    font-weight: 400; 
                    font-size: clamp(1rem, 3vw, 1.5rem); 
                    line-height: 1.5; 
                    margin: 0 auto;
                    opacity: 0.9;
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
                    margin: 0 0 clamp(20px, 4vw, 30px) 0;
                ">
                    {{ __('frontend.our_history_text') }}
                </p>
                
                <!-- See More Button -->
                <a href="{{ asset('profil.pdf') }}" download="Niranta-Company-Profile.pdf" style="
                    display: inline-flex;
                    align-items: center;
                    background-color: #F2ECE0;
                    color: #482500;
                    text-decoration: none;
                    padding: clamp(10px, 2vw, 12px) clamp(20px, 4vw, 30px);
                    border-radius: 25px;
                    font-family: 'Poppins', sans-serif;
                    font-size: clamp(12px, 2.5vw, 16px);
                    font-weight: 700;
                    transition: all 0.3s ease;
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                    gap: clamp(6px, 1.5vw, 8px);
                    cursor: pointer;
                " onmouseover="
                    this.style.transform='translateY(-2px)';
                    this.style.boxShadow='0 6px 20px rgba(0, 0, 0, 0.15)';
                    this.style.backgroundColor='#EAE5DD';
                " onmouseout="
                    this.style.transform='translateY(0)';
                    this.style.boxShadow='0 4px 15px rgba(0, 0, 0, 0.1)';
                    this.style.backgroundColor='#F2ECE0';
                " onclick="
                    // Fallback untuk hosting dengan JavaScript
                    setTimeout(() => {
                        const link = document.createElement('a');
                        link.href = '{{ asset('profil.pdf') }}';
                        link.download = 'Niranta-Company-Profile.pdf';
                        link.target = '_blank';
                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);
                    }, 100);
                ">
                    <span>{{ __('frontend.see_more') }}</span>
                    <svg width="clamp(16px, 3vw, 20px)" height="clamp(16px, 3vw, 20px)" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.75 6.75L19.25 12L13.75 17.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M19 12H4.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
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
    
    /* Hero Video Background */
    #heroBackgroundVideo {
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        width: 100% !important;
        height: 100% !important;
        object-fit: cover !important;
        z-index: 1 !important;
        opacity: 0;
        transition: opacity 0.5s ease;
    }
    
    /* Ensure video is properly sized */
    .hero-video-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 1;
    }
    
    /* Video loading state */
    #heroBackgroundVideo[data-loaded="true"] {
        opacity: 1;
    }
    
    /* Responsive video handling */
    @media (max-width: 768px) {
        #heroBackgroundVideo {
            object-position: center center !important;
            transform: scale(1.02); /* Slight scale to avoid black bars on mobile */
        }
    }
    
    /* Ensure video container doesn't overflow */
    .hero-section {
        position: relative;
        overflow: hidden;
    }
    
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
    // Hero video background functionality
    document.addEventListener('DOMContentLoaded', function() {
        // Hero background video
        const heroVideo = document.getElementById('heroBackgroundVideo');
        const heroContainer = heroVideo ? heroVideo.closest('.relative.min-h-screen') : null;
        
        if (heroVideo && heroContainer) {
            console.log('Initializing hero video background...');
            
            // Set video properties
            heroVideo.muted = true;
            heroVideo.playsInline = true;
            heroVideo.loop = true;
            heroVideo.autoplay = true;
            heroVideo.preload = 'auto';
            
            // Add loading indicator
            heroContainer.style.position = 'relative';
            
            // Handle video events
            heroVideo.addEventListener('loadstart', function() {
                console.log('Video loading started');
            });
            
            heroVideo.addEventListener('loadedmetadata', function() {
                console.log('Video metadata loaded');
            });
            
            heroVideo.addEventListener('loadeddata', function() {
                console.log('Video data loaded successfully');
                heroVideo.style.opacity = '1';
            });
            
            heroVideo.addEventListener('canplay', function() {
                console.log('Video can play');
                // Force play the video
                const playPromise = heroVideo.play();
                if (playPromise !== undefined) {
                    playPromise.then(function() {
                        console.log('Video playing successfully');
                    }).catch(function(error) {
                        console.error('Video play failed:', error);
                        handleVideoError();
                    });
                }
            });
            
            heroVideo.addEventListener('error', function(e) {
                console.error('Video error:', e);
                handleVideoError();
            });
            
            heroVideo.addEventListener('stalled', function() {
                console.warn('Video stalled');
            });
            
            // Error handling function
            function handleVideoError() {
                console.log('Handling video error - switching to fallback');
                if (heroVideo) {
                    heroVideo.style.display = 'none';
                }
                if (heroContainer) {
                    heroContainer.style.backgroundColor = '#F2ECE0';
                    // Change text color for fallback
                    const textElements = heroContainer.querySelectorAll('[style*="color: #FFFFFF"]');
                    textElements.forEach(el => {
                        el.style.color = '#482500';
                    });
                    // Hide overlay
                    const overlay = heroContainer.querySelector('[style*="background: rgba(0, 0, 0, 0.4)"]');
                    if (overlay) overlay.style.display = 'none';
                }
            }
            
            // Force load and play after a short delay
            setTimeout(() => {
                if (heroVideo.readyState === 0) {
                    console.log('Forcing video load...');
                    heroVideo.load();
                }
            }, 100);
            
            // Backup play attempt
            setTimeout(() => {
                if (heroVideo.paused) {
                    console.log('Video still paused, attempting to play...');
                    heroVideo.play().catch(handleVideoError);
                }
            }, 1000);
            
            // Debug click handler (remove in production)
            heroVideo.addEventListener('click', function() {
                console.log('Video clicked - Current state:');
                console.log('- Ready State:', heroVideo.readyState);
                console.log('- Network State:', heroVideo.networkState);
                console.log('- Paused:', heroVideo.paused);
                console.log('- Muted:', heroVideo.muted);
                console.log('- Current Source:', heroVideo.currentSrc);
                console.log('- Duration:', heroVideo.duration);
                console.log('- Video Width:', heroVideo.videoWidth);
                console.log('- Video Height:', heroVideo.videoHeight);
                
                if (heroVideo.paused) {
                    heroVideo.play().catch(console.error);
                }
            });
            
            // Alternative loading approach if standard fails
            setTimeout(() => {
                if (heroVideo.readyState < 2) {
                    console.log('Video not loaded after 3 seconds, trying alternative approach...');
                    heroVideo.src = '{{ asset("vidniranta.mp4") }}';
                    heroVideo.load();
                }
            }, 3000);
        } else {
            console.error('Hero video element not found');
        }

    });
</script>

@endsection