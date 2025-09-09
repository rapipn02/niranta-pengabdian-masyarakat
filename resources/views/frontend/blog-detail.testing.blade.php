@extends('frontend.layouts.app')

@section('content')
<!-- Custom Navbar for Recipe Detail -->
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
                color: #D4A574;
                font-family: 'Inter', sans-serif;
                font-size: 11px;
                font-weight: 500;
                letter-spacing: 0.8px;
                text-transform: uppercase;
                text-decoration: none;
                text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
                transition: color 0.2s ease;
            ">RECIPE</a>
            <a href="#" style="
                color: white;
                font-family: 'Inter', sans-serif;
                font-size: 11px;
                font-weight: 500;
                letter-spacing: 0.8px;
                text-transform: uppercase;
                text-decoration: none;
                text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
                transition: color 0.2s ease;
            " onmouseover="this.style.color='#D4A574'" onmouseout="this.style.color='white'">BLOGS</a>
            <a href="#" style="
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

<!-- Recipe Detail Section -->
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
        ">Recipes</h1>

        <!-- Horizontal Line -->
        <div style="
            width: 100%;
            height: 2px;
            background-color: #482500;
            margin: 0 auto 40px auto;
        "></div>

        <!-- Recipe Title -->
        <h2 style="
            text-align: center;
            color: #482500;
            font-size: 1.5rem;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            margin-bottom: 40px;
        ">Palm Sugar Cake</h2>

        <!-- Content Grid -->
        <div style="
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 50px;
            align-items: flex-start;
        ">
            <!-- Recipe Image -->
            <div style="
                border: 1px solid #C0C0C0;
                padding: 0;
            ">
                <img src="{{ asset('makanan4.png') }}" alt="Palm Sugar Cake" style="
                    width: 100%;
                    height: auto;
                    display: block;
                ">
            </div>

            <!-- Recipe Details -->
            <div>
                <!-- Ingredients Section -->
                <div style="margin-bottom: 30px;">
                    <h3 style="
                        color: #482500;
                        font-size: 1rem;
                        font-weight: 600;
                        font-family: 'Inter', sans-serif;
                        margin-bottom: 10px;
                    ">Bahan - bahan:</h3>
                    
                    <ol style="
                        color: #333;
                        font-family: 'Inter', sans-serif;
                        font-size: 0.9rem;
                        line-height: 1.5;
                        margin: 0;
                        padding-left: 20px;
                    ">
                        <li style="margin-bottom: 3px;">200 gram tepung terigu</li>
                        <li style="margin-bottom: 3px;">150 gram gula aren Niranta</li>
                        <li style="margin-bottom: 3px;">3 butir telur</li>
                        <li style="margin-bottom: 3px;">100 ml minyak kelapa</li>
                        <li style="margin-bottom: 3px;">200 ml santan kental</li>
                        <li style="margin-bottom: 3px;">1 sdt baking powder</li>
                        <li style="margin-bottom: 3px;">1/2 sdt garam</li>
                        <li style="margin-bottom: 3px;">daun pandan secukupnya</li>
                    </ol>
                </div>

                <!-- Instructions Section -->
                <div>
                    <h3 style="
                        color: #482500;
                        font-size: 1rem;
                        font-weight: 600;
                        font-family: 'Inter', sans-serif;
                        margin-bottom: 10px;
                    ">Cara pembuatan:</h3>
                    
                    <ol style="
                        color: #333;
                        font-family: 'Inter', sans-serif;
                        font-size: 0.9rem;
                        line-height: 1.5;
                        margin: 0;
                        padding-left: 20px;
                    ">
                        <li style="margin-bottom: 5px;">Kocok telur dan gula aren hingga mengembang dan pucat.</li>
                        <li style="margin-bottom: 5px;">Tambahkan minyak kelapa dan santan, aduk rata.</li>
                        <li style="margin-bottom: 5px;">Ayak tepung terigu, baking powder, dan garam. Masukkan secara bertahap.</li>
                        <li style="margin-bottom: 5px;">Tambahkan ekstrak daun pandan untuk aroma dan warna alami.</li>
                        <li style="margin-bottom: 5px;">Tuang adonan ke dalam loyang yang sudah diolesi mentega.</li>
                        <li style="margin-bottom: 5px;">Panggang dalam oven 180°C selama 30-35 menit hingga matang.</li>
                        <li style="margin-bottom: 5px;">Sajikan hangat atau dingin sesuai selera.</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Bottom Note -->
        <div style="
            margin-top: 40px;
            text-align: left;
        ">
            <p style="
                color: #333;
                font-family: 'Inter', sans-serif;
                font-size: 0.9rem;
                margin: 0;
            ">Menggunakan Gula Aren Niranta memberikan rasa manis alami dan aroma khas yang tak terlupakan!</p>
        </div>

        <!-- Back Button -->
        <div style="text-align: center; margin-top: 50px;">
            <a href="{{ route('resep') }}" style="
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
            " onmouseover="this.style.background='#C19A5F'" onmouseout="this.style.background='#D4A574'">← Kembali ke Resep</a>
        </div>
    </div>
</section>
@endsection

@push('head')
<meta name="description" content="Resep Palm Sugar Cake dengan Gula Aren Niranta - kue lembut dengan rasa tradisional yang autentik">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    /* Custom styles for responsive design */
    @media (max-width: 768px) {
        .content-grid {
            grid-template-columns: 1fr !important;
            gap: 30px !important;
        }
        
        .recipe-image {
            max-width: 250px;
            margin: 0 auto;
        }
        
        .page-title {
            font-size: 2.5rem !important;
        }
        
        .recipe-container {
            padding: 30px 20px !important;
        }
    }
    
    @media (max-width: 480px) {
        .page-title {
            font-size: 2rem !important;
        }
        
        .recipe-container {
            padding: 25px 15px !important;
        }
        
        .content-grid {
            gap: 25px !important;
        }
    }
</style>
@endpush
