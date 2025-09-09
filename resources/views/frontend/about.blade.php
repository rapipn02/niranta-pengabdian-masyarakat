@extends('layouts.frontend')

@section('content')
<!-- Include Navbar -->
@include('frontend.partials.navbar')

<!-- Hero Section with Background Image -->
<div style="
    background-image: url('{{ asset('home.png') }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
    width: 100%;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    padding-top: 80px;
">
    <!-- Overlay for better text readability -->
    <div style="
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.4);
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
        ">About Us</h1>
    </div>
</div>

<!-- Include Scroll Indicator -->
@include('frontend.partials.scroll-indicator')

<!-- Company Profile Video Section -->
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
        
    </div>
</section>

<!-- About Us Mission Section -->
<section class="about-us-section" style="
    background-color: #F2ECE0;
    padding: 0;
    margin: 0;
    width: 100%;
">
    <div class="about-us-container" style="
        width: 100%;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    ">
        <!-- Left Side - Full Image -->
        <div class="about-image-section" style="
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #F2ECE0;
            padding: 0;
        ">
            <img src="{{ asset('aboutus.png') }}" alt="About Us" style="
                width: 100%;
                height: auto;
                max-width: 100%;
                object-fit: contain;
                object-position: center;
                display: block;
            " />
        </div>
        
        <!-- Right Side - Mission Content -->
        <div class="about-content-section" style="
            flex: 1;
            background-color: #482500;
            padding: clamp(42px, 5.3vw, 56px);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: auto;
        ">
            <!-- Mission Section -->
            <div class="mission-section">
                <h3 style="
                    font-family: 'Poppins', sans-serif;
                    font-size: clamp(16px, 2.5vw, 20px);
                    font-weight: 700;
                    margin-bottom: 4px;
                    color: white;
                    letter-spacing: 1px;
                ">{{ __('messages.about.mission_title') }}</h3>
                
                <p style="
                    font-family: 'Dancing Script', cursive;
                    font-size: clamp(14px, 2vw, 16px);
                    margin-bottom: 12px;
                    color: #F2ECE0;
                    font-weight: 500;
                ">{{ __('messages.about.mission_subtitle') }}</p>
                
                <!-- Mission Items Grid -->
                <div class="mission-items" style="
                    display: grid;
                    grid-template-columns: 1fr 1fr;
                    grid-template-rows: repeat(3, auto);
                    gap: 12px 20px;
                    margin-top: 12px;
                ">
                    <!-- Mission Item 1 -->
                    <div class="mission-item" style="
                        display: block;
                    ">
                        <p style="
                            font-family: 'Inter', sans-serif;
                            font-size: clamp(11px, 1.6vw, 13px);
                            line-height: 1.3;
                            color: white;
                            margin: 0 0 4px 0;
                            font-weight: 600;
                        ">To deliver high-quality, safe, and consistent palm sugar products.</p>
                        <p style="
                            font-family: 'Inter', sans-serif;
                            font-size: clamp(9px, 1.4vw, 11px);
                            line-height: 1.3;
                            color: #F2ECE0;
                            margin: 0;
                            font-weight: 400;
                        ">Menyediakan produk gula aren berkualitas tinggi yang aman dan konsisten.</p>
                    </div>
                    
                    <!-- Mission Item 2 -->
                    <div class="mission-item" style="
                        display: block;
                    ">
                        <p style="
                            font-family: 'Inter', sans-serif;
                            font-size: clamp(11px, 1.6vw, 13px);
                            line-height: 1.3;
                            color: white;
                            margin: 0 0 4px 0;
                            font-weight: 600;
                        ">To create employment opportunities and strengthen the rural economy.</p>
                        <p style="
                            font-family: 'Inter', sans-serif;
                            font-size: clamp(9px, 1.4vw, 11px);
                            line-height: 1.3;
                            color: #F2ECE0;
                            margin: 0;
                            font-weight: 400;
                        ">Membuka lapangan kerja dan mendukung ekonomi pedesaan.</p>
                    </div>
                    
                    <!-- Mission Item 3 -->
                    <div class="mission-item" style="
                        display: block;
                    ">
                        <p style="
                            font-family: 'Inter', sans-serif;
                            font-size: clamp(11px, 1.6vw, 13px);
                            line-height: 1.3;
                            color: white;
                            margin: 0 0 4px 0;
                            font-weight: 600;
                        ">To promote sustainable farming practices in collaboration with local farmers.</p>
                        <p style="
                            font-family: 'Inter', sans-serif;
                            font-size: clamp(9px, 1.4vw, 11px);
                            line-height: 1.3;
                            color: #F2ECE0;
                            margin: 0;
                            font-weight: 400;
                        ">Mendorong praktik pertanian berkelanjutan bersama petani lokal.</p>
                    </div>
                    
                    <!-- Mission Item 4 -->
                    <div class="mission-item" style="
                        display: block;
                    ">
                        <p style="
                            font-family: 'Inter', sans-serif;
                            font-size: clamp(11px, 1.6vw, 13px);
                            line-height: 1.3;
                            color: white;
                            margin: 0 0 4px 0;
                            font-weight: 600;
                        ">To empower local communities through long-term partnerships.</p>
                        <p style="
                            font-family: 'Inter', sans-serif;
                            font-size: clamp(9px, 1.4vw, 11px);
                            line-height: 1.3;
                            color: #F2ECE0;
                            margin: 0;
                            font-weight: 400;
                        ">Memberdayakan masyarakat lokal melalui kemitraan jangka panjang.</p>
                    </div>
                    
                    <!-- Mission Item 5 -->
                    <div class="mission-item" style="
                        display: block;
                    ">
                        <p style="
                            font-family: 'Inter', sans-serif;
                            font-size: clamp(11px, 1.6vw, 13px);
                            line-height: 1.3;
                            color: white;
                            margin: 0 0 4px 0;
                            font-weight: 600;
                        ">To ensure transparency throughout the production and distribution process.</p>
                        <p style="
                            font-family: 'Inter', sans-serif;
                            font-size: clamp(9px, 1.4vw, 11px);
                            line-height: 1.3;
                            color: #F2ECE0;
                            margin: 0;
                            font-weight: 400;
                        ">Menjamin transparansi proses dari produksi hingga distribusi.</p>
                    </div>
                    
                    <!-- Mission Item 6 -->
                    <div class="mission-item" style="
                        display: block;
                    ">
                        <p style="
                            font-family: 'Inter', sans-serif;
                            font-size: clamp(11px, 1.6vw, 13px);
                            line-height: 1.3;
                            color: white;
                            margin: 0 0 4px 0;
                            font-weight: 600;
                        ">To build global collaborations with professional and reliable services.</p>
                        <p style="
                            font-family: 'Inter', sans-serif;
                            font-size: clamp(9px, 1.4vw, 11px);
                            line-height: 1.3;
                            color: #F2ECE0;
                            margin: 0;
                            font-weight: 400;
                        ">Menjalin kerja sama global dengan layanan profesional dan terpercaya.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Additional Background Section -->
<section style="
    background-color: #F2ECE0;
    padding: 60px 0;
    margin: 0;
    width: 100%;
">
    <div style="
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    ">
        <!-- Title -->
        <h2 style="
            text-align: center;
            font-family: 'Poppins', sans-serif;
            font-size: clamp(24px, 4vw, 32px);
            font-weight: 700;
            color: #482500;
            margin-bottom: 50px;
            letter-spacing: 1px;
        ">Keunggulan Niranta</h2>
        
        <!-- Cards Container -->
        <div class="cards-container" style="
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            justify-items: center;
        ">
            <!-- Card 1 -->
            <div style="
                background-color: #482500;
                padding: 30px 20px;
                text-align: center;
                width: 100%;
                max-width: 220px;
                box-shadow: 0 4px 12px rgba(72, 37, 0, 0.2);
            ">
                <div style="
                    width: 60px;
                    height: 60px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin: 0 auto 15px auto;
                ">
                    <img src="{{ asset('icon1.png') }}" alt="Natural Organic" style="
                        width: 40px;
                        height: 40px;
                        object-fit: contain;
                    " />
                </div>
                <h3 style="
                    font-family: 'Poppins', sans-serif;
                    font-size: 14px;
                    font-weight: 700;
                    color: white;
                    margin-bottom: 10px;
                    line-height: 1.3;
                ">100% Natural and Organic</h3>
                <p style="
                    font-family: 'Inter', sans-serif;
                    font-size: 11px;
                    color: #F2ECE0;
                    line-height: 1.4;
                    margin: 0;
                ">Made from organic palm sap without chemicals, artificial sweeteners, coloring, or preservatives.</p>
            </div>
            
            <!-- Card 2 -->
            <div style="
                background-color: #482500;
                padding: 30px 20px;
                text-align: center;
                width: 100%;
                max-width: 220px;
                box-shadow: 0 4px 12px rgba(72, 37, 0, 0.2);
            ">
                <div style="
                    width: 60px;
                    height: 60px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin: 0 auto 15px auto;
                ">
                    <img src="{{ asset('icon2.png') }}" alt="Partnership" style="
                        width: 40px;
                        height: 40px;
                        object-fit: contain;
                    " />
                </div>
                <h3 style="
                    font-family: 'Poppins', sans-serif;
                    font-size: 14px;
                    font-weight: 700;
                    color: white;
                    margin-bottom: 10px;
                    line-height: 1.3;
                ">Partnership with Trained Farmers</h3>
                <p style="
                    font-family: 'Inter', sans-serif;
                    font-size: 11px;
                    color: #F2ECE0;
                    line-height: 1.4;
                    margin: 0;
                ">Work directly with local farmers who have been trained in sustainable farming methods.</p>
            </div>
            
            <!-- Card 3 -->
            <div style="
                background-color: #482500;
                padding: 30px 20px;
                text-align: center;
                width: 100%;
                max-width: 220px;
                box-shadow: 0 4px 12px rgba(72, 37, 0, 0.2);
            ">
                <div style="
                    width: 60px;
                    height: 60px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin: 0 auto 15px auto;
                ">
                    <img src="{{ asset('icon3.png') }}" alt="Healthy Safe" style="
                        width: 40px;
                        height: 40px;
                        object-fit: contain;
                    " />
                </div>
                <h3 style="
                    font-family: 'Poppins', sans-serif;
                    font-size: 14px;
                    font-weight: 700;
                    color: white;
                    margin-bottom: 10px;
                    line-height: 1.3;
                ">Healthy and Safe for Consumption</h3>
                <p style="
                    font-family: 'Inter', sans-serif;
                    font-size: 11px;
                    color: #F2ECE0;
                    line-height: 1.4;
                    margin: 0;
                ">Low glycemic index and rich in natural minerals that are good for the body.</p>
            </div>
            
            <!-- Card 4 -->
            <div style="
                background-color: #482500;
                padding: 30px 20px;
                text-align: center;
                width: 100%;
                max-width: 220px;
                box-shadow: 0 4px 12px rgba(72, 37, 0, 0.2);
            ">
                <div style="
                    width: 60px;
                    height: 60px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin: 0 auto 15px auto;
                ">
                    <img src="{{ asset('icon4.png') }}" alt="Clean Production" style="
                        width: 40px;
                        height: 40px;
                        object-fit: contain;
                    " />
                </div>
                <h3 style="
                    font-family: 'Poppins', sans-serif;
                    font-size: 14px;
                    font-weight: 700;
                    color: white;
                    margin-bottom: 10px;
                    line-height: 1.3;
                ">Clean and Controlled Production</h3>
                <p style="
                    font-family: 'Inter', sans-serif;
                    font-size: 11px;
                    color: #F2ECE0;
                    line-height: 1.4;
                    margin: 0;
                ">Every step of the process follows strict hygiene standards to ensure quality and safety.</p>
            </div>
            
            <!-- Card 5 -->
            <div style="
                background-color: #482500;
                padding: 30px 20px;
                text-align: center;
                width: 100%;
                max-width: 220px;
                box-shadow: 0 4px 12px rgba(72, 37, 0, 0.2);
            ">
                <div style="
                    width: 60px;
                    height: 60px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin: 0 auto 15px auto;
                ">
                    <img src="{{ asset('icon5.png') }}" alt="Natural Organic" style="
                        width: 40px;
                        height: 40px;
                        object-fit: contain;
                    " />
                </div>
                <h3 style="
                    font-family: 'Poppins', sans-serif;
                    font-size: 14px;
                    font-weight: 700;
                    color: white;
                    margin-bottom: 10px;
                    line-height: 1.3;
                ">100% Natural and Organic</h3>
                <p style="
                    font-family: 'Inter', sans-serif;
                    font-size: 11px;
                    color: #F2ECE0;
                    line-height: 1.4;
                    margin: 0;
                ">Made from organic palm sap without chemicals, artificial sweeteners, coloring, or preservatives.</p>
            </div>
        </div>
    </div>
</section>

<!-- Our Certify Section -->
<section style="
    background-color: #F2ECE0;
    padding: 80px 0;
    margin: 0;
    width: 100%;
">
    <div style="
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    ">
        <!-- Title -->
        <h2 style="
            text-align: center;
            font-family: 'Poppins', sans-serif;
            font-size: clamp(24px, 4vw, 32px);
            font-weight: 700;
            color: #482500;
            margin-bottom: 60px;
            letter-spacing: 1px;
        ">Our Certify</h2>
        
        <!-- Certificates Grid -->
        <div class="certificates-grid" style="
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: repeat(2, auto);
            gap: 30px;
            align-items: center;
            justify-items: center;
        ">
            <!-- Certificate 1 - Top Row Left -->
            <div style="
                width: 100%;
                max-width: 280px;
                text-align: center;
            ">
                <img src="{{ asset('sertif1.png') }}" alt="Certificate 1" style="
                    width: 100%;
                    height: auto;
                    object-fit: contain;
                " />
            </div>
            
            <!-- Certificate 2 - Top Row Center -->
            <div style="
                width: 100%;
                max-width: 280px;
                text-align: center;
            ">
                <img src="{{ asset('sertif2.png') }}" alt="Certificate 2" style="
                    width: 100%;
                    height: auto;
                    object-fit: contain;
                " />
            </div>
            
            <!-- Certificate 3 - Top Row Right -->
            <div style="
                width: 100%;
                max-width: 280px;
                text-align: center;
            ">
                <img src="{{ asset('sertif3.png') }}" alt="Certificate 3" style="
                    width: 100%;
                    height: auto;
                    object-fit: contain;
                " />
            </div>
            
            <!-- Certificate 4 - Bottom Row Left (positioned between cert 1 and 2) -->
            <div class="cert-4" style="
                width: 100%;
                max-width: 280px;
                text-align: center;
                grid-column: 1 / 3;
                justify-self: center;
                margin-right: 70px;
                grid-row: 2;
            ">
                <img src="{{ asset('sertif4.png') }}" alt="Certificate 4" style="
                    width: 100%;
                    height: auto;
                    object-fit: contain;
                " />
            </div>
            
            <!-- Certificate 5 - Bottom Row Right (positioned between cert 2 and 3) -->
            <div class="cert-5" style="
                width: 100%;
                max-width: 280px;
                text-align: center;
                grid-column: 2 / 4;
                justify-self: center;
                margin-left: 70px;
                grid-row: 2;
            ">
                <img src="{{ asset('sertif5.png') }}" alt="Certificate 5" style="
                    width: 100%;
                    height: auto;
                    object-fit: contain;
                " />
            </div>
        </div>
    </div>
</section>

<!-- Video JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const video = document.getElementById('companyProfileVideo');
        const playIndicator = document.getElementById('videoPlayIndicator');
        let hasPlayedOnce = false;
        
        // Video event listeners for play indicator
        if (video && playIndicator) {
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
            
            // Click to play/pause
            video.addEventListener('click', () => {
                if (video.paused) {
                    video.play();
                } else {
                    video.pause();
                }
            });
        }
        
        function showPlayIndicator() {
            if (playIndicator) {
                playIndicator.style.opacity = '1';
                setTimeout(() => {
                    playIndicator.style.opacity = '0';
                }, 1500);
            }
        }
    });
</script>

<style>
    /* Video wrapper responsive */
    .video-wrapper {
        aspect-ratio: 16/9;
        position: relative;
    }
    
    .video-wrapper video {
        transition: opacity 0.3s ease;
    }
    
    /* Mobile responsive */
    @media (max-width: 768px) {
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
        
        /* About Us Section Mobile */
        .about-us-container {
            flex-direction: column !important;
            width: 100% !important;
        }
        
        .about-image-section {
            min-height: 300px !important;
            order: 1;
        }
        
        .about-image-section img {
            width: 100% !important;
            height: auto !important;
            object-fit: contain !important;
        }
        
        .about-content-section {
            padding: clamp(30px, 5vw, 40px) clamp(20px, 4vw, 30px) !important;
            order: 2;
        }
        
        .mission-items {
            grid-template-columns: 1fr !important;
            gap: 15px !important;
        }
        
        /* Cards Section Mobile */
        .cards-container {
            grid-template-columns: 1fr !important;
            gap: 20px !important;
        }
        
        .card-item {
            max-width: 100% !important;
            margin: 0 auto !important;
        }
        
        /* Certificate Section Mobile */
        .certificates-grid {
            grid-template-columns: 1fr !important;
            grid-template-rows: auto !important;
            gap: 25px !important;
            padding: 0 20px !important;
        }
        
        .certificates-grid > div {
            margin: 0 !important;
            justify-self: center !important;
            grid-column: 1 !important;
            grid-row: auto !important;
            max-width: 250px !important;
        }
        
        /* Mobile padding adjustments */
        section {
            padding: 40px 0 !important;
        }
        
        /* Mobile title spacing */
        h2 {
            margin-bottom: 30px !important;
            font-size: clamp(20px, 5vw, 24px) !important;
        }
    }
    
    /* Tablet responsive */
    @media (max-width: 1024px) and (min-width: 769px) {
        .about-content-section {
            padding: clamp(35px, 5vw, 50px) !important;
        }
        
        .certificates-grid {
            gap: 25px !important;
        }
        
        .cert-4 {
            margin-right: 25px !important;
        }
        
        .cert-5 {
            margin-left: 25px !important;
        }
    }
</style>
@endsection
