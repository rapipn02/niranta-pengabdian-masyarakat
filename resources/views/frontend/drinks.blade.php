@extends('frontend.layouts.app')

@section('content')
<!-- Hero Section with Background Image -->
<div style="
    background-image: url('{{ asset('latardrink.png') }}');
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
    
    <!-- Logo positioned in top left like in the image -->
    <div style="
        position: absolute;
        top: 80px;
        left: 60px;
        z-index: 20;
    ">
       
    </div>
    
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
        ">Drinks</h1>
    </div>
</div>

<!-- Include Scroll Indicator -->
@include('frontend.partials.scroll-indicator')

<!-- Drinks Content Section -->
<section style="
    background-color: #F2ECE0;
    padding: 80px 0;
    min-height: 50vh;
" class="content-section" data-content>
    <div style="
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    ">
        

                  {{-- filepath: resources/views/frontend/resep.blade.php --}}

<!-- Drinks Grid -->
<div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 40px; margin-bottom: 40px;" class="drinks-grid">
    @forelse($drinks as $drink)
        <div style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; cursor: pointer;"
             onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 8px 30px rgba(0, 0, 0, 0.15)'"
             onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 20px rgba(0, 0, 0, 0.1)'"
             onclick="window.location.href='{{ route('recipes.show', $drink) }}'">
                <div style="
                height: 320px;
                background-size: cover;
                background-position: center;
                position: relative;
                background-image: url('{{ recipe_image($drink->image) }}');
            ">
                <div style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(transparent, rgba(0, 0, 0, 0.8)); padding: 20px; color: white;">
                    <h3 style="font-family: 'Inter', sans-serif; font-size: 18px; font-weight: 600; margin: 0;">
                        {{ $drink->getTranslatedName() }}
                    </h3>
                </div>
            </div>
        </div>
    @empty
        <div style="grid-column: 1 / -1; text-align: center; padding: 40px 0;">
            <p style="color: #888; font-size: 1rem; font-family: 'Inter', sans-serif;">
                Belum ada resep minuman yang tersedia
            </p>
        </div>
    @endforelse
</div>

        <!-- Pagination -->
        @if($drinks->hasPages())
            <div style="margin: 40px 0; text-align: center;">
                {{ $drinks->links() }}
            </div>
        @endif

        <!-- Back to Recipes Button -->
        <div style="text-align: center;">
            <a href="{{ route('resep') }}" style="
                display: inline-block;
                background: #D4A574;
                color: white;
                text-decoration: none;
                padding: 15px 30px;
                border-radius: 10px;
                font-family: 'Inter', sans-serif;
                font-size: 16px;
                font-weight: 500;
                transition: background 0.3s ease, transform 0.3s ease;
            " onmouseover="this.style.background='#C19A5F'; this.style.transform='translateY(-2px)'" onmouseout="this.style.background='#D4A574'; this.style.transform='translateY(0)'">← Back to Recipes</a>
        </div>
    </div>
</section>

<!-- Responsive Styles -->
<style>
    /* Override navbar scroll effect - keep brown color always */
    nav {
        background: #482500 !important;
        backdrop-filter: none !important;
        -webkit-backdrop-filter: none !important;
    }
    
    @media (max-width: 1024px) {
        .drinks-grid {
            grid-template-columns: repeat(2, 1fr) !important;
        }
    }
    
    @media (max-width: 768px) {
        .drinks-grid {
            grid-template-columns: 1fr !important;
        }
    }
</style>
@endsection
