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
            font-size: clamp(3rem, 8vw, 8rem);
            font-weight: bold;
            font-family: 'Inter', sans-serif;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            margin: 0;
            letter-spacing: 0.02em;
        ">Recipe</h1>
    </div>
</div>

<!-- Include Scroll Indicator -->
@include('frontend.partials.scroll-indicator')

<!-- Recipes Content Section -->
<section style="
    background-color: #F2ECE0;
    padding: 60px 0;
" class="content-section" data-content>
    <div style="
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 40px;
    ">
        <!-- Drinks Section -->
        <div style="margin-bottom: 60px;">
            <!-- Section Header -->
            <div style="
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 30px;
            ">
                <h2 style="
                    color: #482500;
                    font-size: 1.8rem;
                    font-weight: bold;
                    font-family: 'Inter', sans-serif;
                    margin: 0;
                ">Drinks</h2>
                <a href="{{ route('drinks') }}" style="
                    color: #482500;
                    font-size: 0.9rem;
                    text-decoration: none;
                    font-family: 'Inter', sans-serif;
                ">Show all ></a>
            </div>
            
            <!-- Drinks Slider -->
            <div style="position: relative; overflow: hidden;">
                <!-- Slider Container -->
                <div id="drinksSlider" style="
                    display: flex;
                    gap: 30px;
                    transition: transform 0.3s ease;
                    transform: translateX(0);
                ">
                    @forelse($drinks as $drink)
                        <!-- Drink {{ $loop->iteration }} -->
                        <div style="
                            position: relative;
                            border-radius: 12px;
                            overflow: hidden;
                            height: 280px;
                            cursor: pointer;
                            transition: transform 0.3s ease;
                            flex: 0 0 calc((100% - 60px) / 3);
                        " onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'"
                           onclick="window.location.href='{{ route('recipes.show', $drink) }}'">
                            @if($drink->image && file_exists(public_path('storage/' . $drink->image)))
                                <img src="{{ asset('storage/' . $drink->image) }}" alt="{{ $drink->nama_resep }}"
                                     style="width: 100%; height: 100%; object-fit: cover;">
                            @else
                                <img src="{{ asset('minuman1.png') }}" alt="{{ $drink->nama_resep }}"
                                     style="width: 100%; height: 100%; object-fit: cover;">
                            @endif
                            <div style="
                                position: absolute;
                                bottom: 0;
                                left: 0;
                                right: 0;
                                background: linear-gradient(transparent, rgba(0,0,0,0.7));
                                padding: 40px 20px 20px;
                            ">
                                <h3 style="
                                    color: white;
                                    font-size: 1.2rem;
                                    font-weight: 600;
                                    margin: 0;
                                    font-family: 'Inter', sans-serif;
                                    text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
                                ">{{ $drink->nama_resep }}</h3>
                            </div>
                        </div>
                    @empty
                        <!-- Default drinks when no data -->
                        <div style="
                            position: relative;
                            border-radius: 12px;
                            overflow: hidden;
                            height: 280px;
                            cursor: pointer;
                            transition: transform 0.3s ease;
                            flex: 0 0 calc((100% - 60px) / 3);
                        " onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
                            <img src="{{ asset('minuman1.png') }}" alt="Es Cendol Gula Aren"
                                 style="width: 100%; height: 100%; object-fit: cover;">
                            <div style="
                                position: absolute;
                                bottom: 0;
                                left: 0;
                                right: 0;
                                background: linear-gradient(transparent, rgba(0,0,0,0.7));
                                padding: 40px 20px 20px;
                            ">
                                <h3 style="
                                    color: white;
                                    font-size: 1.2rem;
                                    font-weight: 600;
                                    margin: 0;
                                    font-family: 'Inter', sans-serif;
                                    text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
                                ">Es Cendol Gula Aren</h3>
                            </div>
                        </div>
                    @endforelse
                            background: linear-gradient(transparent, rgba(0,0,0,0.7));
                            padding: 40px 20px 20px;
                        ">
                            <h3 style="
                                color: white;
                                font-size: 1.2rem;
                                font-weight: 600;
                                margin: 0;
                                font-family: 'Inter', sans-serif;
                                text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
                            ">Es Dawet Gula Aren</h3>
                        </div>
                    </div>

                    <!-- Drink 5 (Additional) -->
                    <div style="
                        position: relative;
                        border-radius: 12px;
                        overflow: hidden;
                        height: 280px;
                        cursor: pointer;
                        transition: transform 0.3s ease;
                        flex: 0 0 calc((100% - 60px) / 3);
                    " onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
                        <img src="{{ asset('minuman2.png') }}" alt="Kopi Gula Aren"
                             style="width: 100%; height: 100%; object-fit: cover;">
                        <div style="
                            position: absolute;
                            bottom: 0;
                            left: 0;
                            right: 0;
                            background: linear-gradient(transparent, rgba(0,0,0,0.7));
                            padding: 40px 20px 20px;
                        ">
                            <h3 style="
                                color: white;
                                font-size: 1.2rem;
                                font-weight: 600;
                                margin: 0;
                                font-family: 'Inter', sans-serif;
                                text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
                            ">Kopi Gula Aren</h3>
                        </div>
                    </div>

                    <!-- Drink 6 (Additional) -->
                    <div style="
                        position: relative;
                        border-radius: 12px;
                        overflow: hidden;
                        height: 280px;
                        cursor: pointer;
                        transition: transform 0.3s ease;
                        flex: 0 0 calc((100% - 60px) / 3);
                    " onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
                        <img src="{{ asset('minuman3.png') }}" alt="Teh Manis Gula Aren"
                             style="width: 100%; height: 100%; object-fit: cover;">
                        <div style="
                            position: absolute;
                            bottom: 0;
                            left: 0;
                            right: 0;
                            background: linear-gradient(transparent, rgba(0,0,0,0.7));
                            padding: 40px 20px 20px;
                        ">
                            <h3 style="
                                color: white;
                                font-size: 1.2rem;
                                font-weight: 600;
                                margin: 0;
                                font-family: 'Inter', sans-serif;
                                text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
                            ">Teh Manis Gula Aren</h3>
                        </div>
                    </div>
                </div>

                <!-- Navigation Arrows -->
                <button id="drinksPrev" style="
                    position: absolute;
                    left: -15px;
                    top: 50%;
                    transform: translateY(-50%);
                    background: transparent;
                    border: none;
                    cursor: pointer;
                    z-index: 10;
                    padding: 10px;
                ">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M15 18L9 12L15 6" stroke="#333" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>

                <button id="drinksNext" style="
                    position: absolute;
                    right: -15px;
                    top: 50%;
                    transform: translateY(-50%);
                    background: transparent;
                    border: none;
                    cursor: pointer;
                    z-index: 10;
                    padding: 10px;
                ">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M9 18L15 12L9 6" stroke="#333" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>

                <!-- Dots Indicator -->
                <div style="
                    display: flex;
                    justify-content: center;
                    gap: 8px;
                    margin-top: 20px;
                ">
                    <span class="drinks-dot" data-slide="0" style="
                        width: 12px;
                        height: 12px;
                        border-radius: 50%;
                        background: #D4A574;
                        cursor: pointer;
                        transition: background 0.3s ease;
                    "></span>
                    <span class="drinks-dot" data-slide="1" style="
                        width: 12px;
                        height: 12px;
                        border-radius: 50%;
                        background: #ccc;
                        cursor: pointer;
                        transition: background 0.3s ease;
                    "></span>
                </div>
            </div>
        </div>

        <!-- Dessert Section -->
        <div>
            <!-- Section Header -->
            <div style="
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 30px;
            ">
                <h2 style="
                    color: #482500;
                    font-size: 1.8rem;
                    font-weight: bold;
                    font-family: 'Inter', sans-serif;
                    margin: 0;
                ">Dessert</h2>
                <a href="{{ route('desserts') }}" style="
                    color: #482500;
                    font-size: 0.9rem;
                    text-decoration: none;
                    font-family: 'Inter', sans-serif;
                ">Show all ></a>
            </div>
            
            <!-- Desserts Slider -->
            <div style="position: relative; overflow: hidden;">
                <!-- Slider Container -->
                <div id="dessertsSlider" style="
                    display: flex;
                    gap: 30px;
                    transition: transform 0.3s ease;
                    transform: translateX(0);
                ">
                    @forelse($desserts as $dessert)
                        <!-- Dessert {{ $loop->iteration }} -->
                        <a href="{{ route('recipes.show', $dessert) }}" style="
                            position: relative;
                            border-radius: 12px;
                            overflow: hidden;
                            height: 280px;
                            cursor: pointer;
                            transition: transform 0.3s ease;
                            flex: 0 0 calc((100% - 60px) / 3);
                            display: block;
                            text-decoration: none;
                        " onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
                            @if($dessert->image && file_exists(public_path('storage/' . $dessert->image)))
                                <img src="{{ asset('storage/' . $dessert->image) }}" alt="{{ $dessert->nama_resep }}"
                                     style="width: 100%; height: 100%; object-fit: cover;">
                            @else
                                <img src="{{ asset('makanan1.png') }}" alt="{{ $dessert->nama_resep }}"
                                     style="width: 100%; height: 100%; object-fit: cover;">
                            @endif
                            <div style="
                                position: absolute;
                                bottom: 0;
                                left: 0;
                                right: 0;
                                background: linear-gradient(transparent, rgba(0,0,0,0.7));
                                padding: 40px 20px 20px;
                            ">
                                <h3 style="
                                    color: white;
                                    font-size: 1.2rem;
                                    font-weight: 600;
                                    margin: 0;
                                    font-family: 'Inter', sans-serif;
                                    text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
                                ">{{ $dessert->nama_resep }}</h3>
                            </div>
                        </a>
                    @empty
                        <!-- Default desserts when no data -->
                        <a href="{{ route('recipe.detail') }}" style="
                            position: relative;
                            border-radius: 12px;
                            overflow: hidden;
                            height: 280px;
                            cursor: pointer;
                            transition: transform 0.3s ease;
                            flex: 0 0 calc((100% - 60px) / 3);
                            display: block;
                            text-decoration: none;
                        " onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
                            <img src="{{ asset('makanan1.png') }}" alt="Klepon"
                                 style="width: 100%; height: 100%; object-fit: cover;">
                            <div style="
                                position: absolute;
                                bottom: 0;
                                left: 0;
                                right: 0;
                                background: linear-gradient(transparent, rgba(0,0,0,0.7));
                                padding: 40px 20px 20px;
                            ">
                                <h3 style="
                                    color: white;
                                    font-size: 1.2rem;
                                    font-weight: 600;
                                    margin: 0;
                                    font-family: 'Inter', sans-serif;
                                    text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
                                ">Klepon</h3>
                            </div>
                        </a>
                    @endforelse
                                margin: 0;
                                font-family: 'Inter', sans-serif;
                                text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
                            ">Palm Sugar Cake</h3>
                        </div>
                    </a>

                    <!-- Dessert 5 (Additional) -->
                    <div style="
                        position: relative;
                        border-radius: 12px;
                        overflow: hidden;
                        height: 280px;
                        cursor: pointer;
                        transition: transform 0.3s ease;
                        flex: 0 0 calc((100% - 60px) / 3);
                    " onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
                        <img src="{{ asset('makanan2.png') }}" alt="Puding Gula Aren"
                             style="width: 100%; height: 100%; object-fit: cover;">
                        <div style="
                            position: absolute;
                            bottom: 0;
                            left: 0;
                            right: 0;
                            background: linear-gradient(transparent, rgba(0,0,0,0.7));
                            padding: 40px 20px 20px;
                        ">
                            <h3 style="
                                color: white;
                                font-size: 1.2rem;
                                font-weight: 600;
                                margin: 0;
                                font-family: 'Inter', sans-serif;
                                text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
                            ">Puding Gula Aren</h3>
                        </div>
                    </div>

                    <!-- Dessert 6 (Additional) -->
                    <div style="
                        position: relative;
                        border-radius: 12px;
                        overflow: hidden;
                        height: 280px;
                        cursor: pointer;
                        transition: transform 0.3s ease;
                        flex: 0 0 calc((100% - 60px) / 3);
                    " onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
                        <img src="{{ asset('makanan3.png') }}" alt="Kue Lumpur Gula Aren"
                             style="width: 100%; height: 100%; object-fit: cover;">
                        <div style="
                            position: absolute;
                            bottom: 0;
                            left: 0;
                            right: 0;
                            background: linear-gradient(transparent, rgba(0,0,0,0.7));
                            padding: 40px 20px 20px;
                        ">
                            <h3 style="
                                color: white;
                                font-size: 1.2rem;
                                font-weight: 600;
                                margin: 0;
                                font-family: 'Inter', sans-serif;
                                text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
                            ">Kue Lumpur Gula Aren</h3>
                        </div>
                    </div>
                </div>

                <!-- Navigation Arrows -->
                <button id="dessertsPrev" style="
                    position: absolute;
                    left: -15px;
                    top: 50%;
                    transform: translateY(-50%);
                    background: transparent;
                    border: none;
                    cursor: pointer;
                    z-index: 10;
                    padding: 10px;
                ">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M15 18L9 12L15 6" stroke="#333" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>

                <button id="dessertsNext" style="
                    position: absolute;
                    right: -15px;
                    top: 50%;
                    transform: translateY(-50%);
                    background: transparent;
                    border: none;
                    cursor: pointer;
                    z-index: 10;
                    padding: 10px;
                ">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M9 18L15 12L9 6" stroke="#333" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>

                <!-- Dots Indicator -->
                <div style="
                    display: flex;
                    justify-content: center;
                    gap: 8px;
                    margin-top: 20px;
                ">
                    <span class="desserts-dot" data-slide="0" style="
                        width: 12px;
                        height: 12px;
                        border-radius: 50%;
                        background: #D4A574;
                        cursor: pointer;
                        transition: background 0.3s ease;
                    "></span>
                    <span class="desserts-dot" data-slide="1" style="
                        width: 12px;
                        height: 12px;
                        border-radius: 50%;
                        background: #ccc;
                        cursor: pointer;
                        transition: background 0.3s ease;
                    "></span>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('head')
<meta name="description" content="Jelajahi koleksi resep lezat menggunakan gula kelapa berkualitas tinggi kami untuk berbagai hidangan dan minuman">

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
    @media (max-width: 1024px) {
        /* Tablet adjustments */
        .drinks-grid, .dessert-grid {
            grid-template-columns: repeat(2, 1fr) !important;
            gap: 25px !important;
        }
        
        .recipe-card {
            height: 240px !important;
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
        
        .recipes-section {
            padding: 40px 20px !important;
        }
        
        .drinks-grid, .dessert-grid {
            grid-template-columns: 1fr !important;
            gap: 20px !important;
        }
        
        .recipe-card {
            height: 220px !important;
        }
        
        .section-header {
            flex-direction: column !important;
            align-items: flex-start !important;
            gap: 10px !important;
        }
    }
    
    @media (max-width: 480px) {
        .hero-section {
            height: 70vh !important;
        }
        
        .recipes-section {
            padding: 30px 15px !important;
        }
        
        .recipe-card {
            height: 200px !important;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Drinks Slider
    let drinksCurrentSlide = 0;
    const drinksSlider = document.getElementById('drinksSlider');
    const drinksDots = document.querySelectorAll('.drinks-dot');
    const drinksTotal = 2; // Total slides (0-1)
    
    function updateDrinksSlider() {
        const translateX = -drinksCurrentSlide * 100;
        drinksSlider.style.transform = `translateX(${translateX}%)`;
        
        // Update dots
        drinksDots.forEach((dot, index) => {
            dot.style.background = index === drinksCurrentSlide ? '#D4A574' : '#ccc';
        });
    }
    
    // Drinks Previous Button
    document.getElementById('drinksPrev').addEventListener('click', function() {
        drinksCurrentSlide = drinksCurrentSlide > 0 ? drinksCurrentSlide - 1 : drinksTotal - 1;
        updateDrinksSlider();
    });
    
    // Drinks Next Button
    document.getElementById('drinksNext').addEventListener('click', function() {
        drinksCurrentSlide = drinksCurrentSlide < drinksTotal - 1 ? drinksCurrentSlide + 1 : 0;
        updateDrinksSlider();
    });
    
    // Drinks Dot Navigation
    drinksDots.forEach((dot, index) => {
        dot.addEventListener('click', function() {
            drinksCurrentSlide = index;
            updateDrinksSlider();
        });
    });
    
    // Desserts Slider
    let dessertsCurrentSlide = 0;
    const dessertsSlider = document.getElementById('dessertsSlider');
    const dessertsDots = document.querySelectorAll('.desserts-dot');
    const dessertsTotal = 2; // Total slides (0-1)
    
    function updateDessertsSlider() {
        const translateX = -dessertsCurrentSlide * 100;
        dessertsSlider.style.transform = `translateX(${translateX}%)`;
        
        // Update dots
        dessertsDots.forEach((dot, index) => {
            dot.style.background = index === dessertsCurrentSlide ? '#D4A574' : '#ccc';
        });
    }
    
    // Desserts Previous Button
    document.getElementById('dessertsPrev').addEventListener('click', function() {
        dessertsCurrentSlide = dessertsCurrentSlide > 0 ? dessertsCurrentSlide - 1 : dessertsTotal - 1;
        updateDessertsSlider();
    });
    
    // Desserts Next Button
    document.getElementById('dessertsNext').addEventListener('click', function() {
        dessertsCurrentSlide = dessertsCurrentSlide < dessertsTotal - 1 ? dessertsCurrentSlide + 1 : 0;
        updateDessertsSlider();
    });
    
    // Desserts Dot Navigation
    dessertsDots.forEach((dot, index) => {
        dot.addEventListener('click', function() {
            dessertsCurrentSlide = index;
            updateDessertsSlider();
        });
    });
    
    // Auto slide every 5 seconds (optional)
    setInterval(function() {
        // Auto slide drinks
        drinksCurrentSlide = drinksCurrentSlide < drinksTotal - 1 ? drinksCurrentSlide + 1 : 0;
        updateDrinksSlider();
        
        // Auto slide desserts
        dessertsCurrentSlide = dessertsCurrentSlide < dessertsTotal - 1 ? dessertsCurrentSlide + 1 : 0;
        updateDessertsSlider();
    }, 5000);
});
</script>
@endpush
