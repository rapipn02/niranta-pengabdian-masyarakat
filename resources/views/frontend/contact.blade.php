@extends('layouts.frontend')

@section('title', 'Contact Us - Niranta')

@section('content')
<!-- Include Navbar -->
@include('frontend.partials.navbar')

<style>
    /* Global Background */
    body {
        background-color: #F2ECE0 !important;
    }

    /* Hero Section */
    .hero-section {
        height: 70vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
        background-color: #F2ECE0;
    }

    .hero-content {
        text-align: center;
        color: white;
        z-index: 10;
        position: relative;
    }

    .hero-content h1 {
        font-size: 56px;
        font-weight: 700;
        margin-bottom: 20px;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.7);
        letter-spacing: 2px;
    }

    /* Contact Hero Video Background */
    #contactHeroVideo {
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
    
    /* Video loading state */
    #contactHeroVideo[data-loaded="true"] {
        opacity: 1;
    }
    
    /* Responsive video handling */
    @media (max-width: 768px) {
        #contactHeroVideo {
            object-position: center center !important;
            transform: scale(1.02);
        }
    }

    /* Main Content */
    .main-content {
        background-color: #F2ECE0;
        padding: 80px 0;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    /* Help Section */
    .help-section {
        text-align: center;
        margin-bottom: 60px;
    }

    .help-section h2 {
        font-size: 32px;
        color: #482500;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .help-section p {
        font-size: 18px;
        color: #666;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.8;
    }

    /* Contact Info Section */
    .contact-info {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 60px;
        margin-bottom: 80px;
        max-width: 900px;
        margin-left: auto;
        margin-right: auto;
    }

    .contact-item {
        padding: 30px 20px;
        text-align: center;
        position: relative;
    }

    .contact-item:not(:last-child)::after {
        content: '';
        position: absolute;
        right: -30px;
        top: 10%;
        bottom: 10%;
        width: 1px;
        background-color: #482500;
        opacity: 0.3;
    }

    .contact-icon {
        width: 60px;
        height: 60px;
        margin: 0 auto 20px;
        display: block;
    }

    .contact-item h3 {
        color: #482500;
        font-size: 24px;
        margin-bottom: 15px;
        font-weight: 700;
        font-family: 'Poppins', sans-serif;
    }

    .contact-item p {
        color: #666;
        font-size: 16px;
        line-height: 1.6;
        margin: 0;
    }

    .contact-item p strong {
        color: #482500;
        display: block;
        margin-bottom: 5px;
    }

    /* Maps Section */
    .maps-section {
        background: white;
        border-radius: 15px;
        padding: 0;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .maps-container {
        position: relative;
        height: 400px;
    }

    .maps-container iframe {
        width: 100%;
        height: 100%;
        border: none;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .hero-content h1 {
            font-size: 36px;
        }

        .contact-info {
            grid-template-columns: 1fr;
            gap: 40px;
        }

        .contact-item:not(:last-child)::after {
            display: none;
        }

        .contact-item {
            padding: 20px 15px;
        }

        .main-content {
            padding: 40px 0;
        }
    }

    @media (max-width: 480px) {
        .hero-content h1 {
            font-size: 28px;
        }

        .container {
            padding: 0 15px;
        }

        .contact-item {
            padding: 30px 20px;
        }

        /* About Us Mobile Responsive */
        .about-us-grid {
            grid-template-columns: 1fr !important;
            gap: 40px !important;
            text-align: center;
        }

        .about-us-content h2 {
            font-size: 2rem !important;
        }

        .about-us-content p {
            font-size: 1rem !important;
        }

        .about-us-image {
            order: -1;
        }
    }
</style>

<!-- Hero Section -->
<section class="hero-section">
    <!-- Background Video Container -->
    <div class="absolute inset-0 w-full h-full overflow-hidden" style="z-index: 1;">
        <video 
            id="contactHeroVideo"
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
    <div class="absolute inset-0 w-full h-full" style="z-index: 2; background: rgba(0, 0, 0, 0.5);"></div>
    
    <div class="hero-content">
        <h1>{{ __('messages.contact.title') }}</h1>
    </div>
</section>

<!-- Main Content -->
<section class="main-content">
    <div class="container">
        <!-- Help Section -->
        <div class="help-section">
            <h2>{{ __('messages.contact.help_title') }}</h2>
            <p>{{ __('messages.contact.help_description') }}</p>
        </div>

        <!-- Contact Info -->
        <div class="contact-info">
            <!-- Address -->
            <div class="contact-item">
                <img src="{{ asset('iconhome.png') }}" alt="Address Icon" class="contact-icon">
                <h3>{{ __('messages.contact.address') }}</h3>
                <p>
                    <strong>{{ __('messages.contact.address_detail') }}</strong>
                </p>
            </div>

            <!-- Email -->
            <div class="contact-item">
                <img src="{{ asset('iconemail.png') }}" alt="Email Icon" class="contact-icon">
                <h3>{{ __('messages.contact.email_us') }}</h3>
                <p>
                    <strong>{{ __('messages.contact.email_text') }}</strong>
                 niraku.pdg@gmail.com
                </p>
            </div>

            <!-- Phone -->
            <div class="contact-item">
                <img src="{{ asset('icontelpon.png') }}" alt="Phone Icon" class="contact-icon">
                <h3>{{ __('messages.contact.call_us') }}</h3>
                <p>
                    <strong>{{ __('messages.contact.phone_text') }}</strong>
                    +62 812 6768 106
                </p>
            </div>
        </div>

        <!-- Google Maps Section -->
        <div class="maps-section">
            <div class="maps-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.271827033123!2d100.36300917599615!3d-0.9483277353522623!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b90c01406991%3A0xc0ba0ebd4f3936ae!2sNiranta%20Gula%20Aren%20Asli!5e0!3m2!1sid!2sid!4v1753179953281!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>

<script>
    // Contact hero video background functionality
    document.addEventListener('DOMContentLoaded', function() {
        // Contact hero background video
        const contactVideo = document.getElementById('contactHeroVideo');
        const contactContainer = contactVideo ? contactVideo.closest('.hero-section') : null;
        
        if (contactVideo && contactContainer) {
            console.log('Initializing contact hero video background...');
            
            // Set video properties
            contactVideo.muted = true;
            contactVideo.playsInline = true;
            contactVideo.loop = true;
            contactVideo.autoplay = true;
            contactVideo.preload = 'auto';
            
            // Handle video events
            contactVideo.addEventListener('loadstart', function() {
                console.log('Contact video loading started');
            });
            
            contactVideo.addEventListener('loadeddata', function() {
                console.log('Contact video data loaded successfully');
                contactVideo.style.opacity = '1';
            });
            
            contactVideo.addEventListener('canplay', function() {
                console.log('Contact video can play');
                const playPromise = contactVideo.play();
                if (playPromise !== undefined) {
                    playPromise.then(function() {
                        console.log('Contact video playing successfully');
                    }).catch(function(error) {
                        console.error('Contact video play failed:', error);
                    });
                }
            });
            
            contactVideo.addEventListener('error', function(e) {
                console.error('Contact video error:', e);
            });
            
            // Force load after timeout
            setTimeout(() => {
                if (contactVideo.readyState < 2) {
                    console.log('Contact video not loaded after 3 seconds, trying alternative approach...');
                    contactVideo.src = '{{ asset("vidniranta.mp4") }}';
                    contactVideo.load();
                }
            }, 3000);
        } else {
            console.error('Contact hero video element not found');
        }
    });
</script>

@endsection
