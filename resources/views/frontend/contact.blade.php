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
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('latarproduk.png') }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .hero-content {
        text-align: center;
        color: white;
        z-index: 2;
    }

    .hero-content h1 {
        font-size: 56px;
        font-weight: 700;
        margin-bottom: 20px;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.7);
        letter-spacing: 2px;
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
    <div class="hero-content">
        <h1>Contact Us</h1>
    </div>
</section>

<!-- About Us Section -->
<section style="
    background-color: #F2ECE0;
    padding: 80px 0;
">
    <div class="about-us-grid" style="
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 40px;
        display: grid;
        grid-template-columns: 1fr 1.2fr;
        gap: 60px;
        align-items: center;
    ">
        <!-- Left Side - Image -->
        <div class="about-us-image" style="
            display: flex;
            justify-content: center;
            align-items: center;
        ">
            <img src="{{ asset('more.png') }}" alt="Niranta Palm Sugar Package" style="
                width: 100%;
                max-width: 350px;
                height: auto;
            ">
        </div>

        <!-- Right Side - Content -->
        <div class="about-us-content" style="
            padding: 20px 0;
        ">
            <h2 style="
                font-family: 'Poppins', sans-serif;
                font-size: 2.5rem;
                font-weight: 700;
                color: #000000;
                margin-bottom: 30px;
                line-height: 1.2;
            ">About Us</h2>
            
            <div style="
                color: #000000;
                font-size: 16px;
                line-height: 100%;
                margin-bottom: 35px;
                font-family: 'Inter', sans-serif;
                font-weight: 400;
                letter-spacing: 0%;
            ">
                <p style="margin-bottom: 20px;">
                    Founded in Padang in 2015, Niranta began as a large-scale distributor of solid palm sugar. 
                    As market demand continued to evolve, Niranta responded with ongoing innovation and product development.
                </p>
                
                <p style="margin-bottom: 0;">
                    In 2019, we introduced palm sugar powder—a more convenient option now available in supermarkets, 
                    through reseller networks, and on digital platforms. With consistent quality and trend adaptation, 
                    Niranta is recognized as one of the producers bringing authentic local flavors to the global stage.
                </p>
            </div>
            
            <button style="
                background-color: #482500;
                color: white;
                border: none;
                border-radius: 25px;
                padding: 12px 30px;
                font-size: 1rem;
                font-weight: 600;
                font-family: 'Poppins', sans-serif;
                cursor: pointer;
                transition: all 0.3s ease;
                box-shadow: 0 8px 20px rgba(72, 37, 0, 0.3);
            " onmouseover="
                this.style.transform='translateY(-2px)';
                this.style.boxShadow='0 12px 25px rgba(72, 37, 0, 0.4)';
                this.style.backgroundColor='#3a1d00';
            " onmouseout="
                this.style.transform='translateY(0)';
                this.style.boxShadow='0 8px 20px rgba(72, 37, 0, 0.3)';
                this.style.backgroundColor='#482500';
            ">
                Lihat selengkapnya
            </button>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="main-content">
    <div class="container">
        <!-- Help Section -->
        <div class="help-section">
            <h2>Butuh Bantuan?</h2>
            <p>Dengan senang hati tim kami akan membantu menyelesaikan kendala anda. Hubungi kami melalui informasi kontak dibawah ini</p>
        </div>

        <!-- Contact Info -->
        <div class="contact-info">
            <!-- Address -->
            <div class="contact-item">
                <img src="{{ asset('iconhome.png') }}" alt="Address Icon" class="contact-icon">
                <h3>Address</h3>
                <p>
                    <strong>Jl. Terandam III No.35, Sawahan, Kec. Padang Timur</strong>
                    Kota Padang, Sumatera Barat, Indonesia 25121
                </p>
            </div>

            <!-- Email -->
            <div class="contact-item">
                <img src="{{ asset('iconemail.png') }}" alt="Email Icon" class="contact-icon">
                <h3>Email Us</h3>
                <p>
                    <strong>Hubungi kami melalui email</strong>
                 niraku.pdg@gmail.com
                </p>
            </div>

            <!-- Phone -->
            <div class="contact-item">
                <img src="{{ asset('icontelpon.png') }}" alt="Phone Icon" class="contact-icon">
                <h3>Call Us</h3>
                <p>
                    <strong>Hubungi kami melalui telepon</strong>
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
@endsection
