@extends('frontend.layouts.app')

@section('content')
<!-- Recipe Detail Section -->
<section style="
    background: linear-gradient(135deg, #F2ECE0 0%, #E8DCC8 100%);
    padding: 120px 0 80px 0;
    min-height: 100vh;
">
    <div style="
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 30px;
    ">
        <!-- Back Button -->
        <div style="margin-bottom: 50px;">
            <a href="{{ route('resep') }}" style="
                display: inline-flex;
                align-items: center;
                background: linear-gradient(135deg, #D4A574 0%, #C19A5F 100%);
                color: white;
                text-decoration: none;
                padding: 15px 25px;
                border-radius: 50px;
                font-family: 'Inter', sans-serif;
                font-size: 15px;
                font-weight: 600;
                transition: all 0.3s ease;
                box-shadow: 0 8px 25px rgba(212, 165, 116, 0.3);
            " onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 12px 35px rgba(212, 165, 116, 0.4)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 8px 25px rgba(212, 165, 116, 0.3)'">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" style="margin-right: 8px;">
                    <path d="M19 12H5M12 19L5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Back to Recipes
            </a>
        </div>

        <!-- Recipe Hero Card -->
        <div style="
            background: white;
            border-radius: 30px;
            overflow: hidden;
            margin-bottom: 50px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.8);
        ">
            <div style="
                display: grid;
                grid-template-columns: 1fr 500px;
                min-height: 600px;
            " class="recipe-header">
                <!-- Recipe Info -->
                <div style="
                    padding: 60px;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    background: linear-gradient(135deg, rgba(255,255,255,0.9) 0%, rgba(248,245,240,0.9) 100%);
                ">
                    <!-- Recipe Type Badge -->
                    <div style="
                        display: inline-block;
                        background: {{ $recipe->jenis == 'drink' ? 'linear-gradient(135deg, #4A90E2 0%, #357ABD 100%)' : 'linear-gradient(135deg, #E2A74A 0%, #CC9A42 100%)' }};
                        color: white;
                        padding: 12px 24px;
                        border-radius: 50px;
                        font-size: 14px;
                        font-weight: 600;
                        text-transform: uppercase;
                        letter-spacing: 1px;
                        margin-bottom: 25px;
                        width: fit-content;
                        box-shadow: 0 8px 20px {{ $recipe->jenis == 'drink' ? 'rgba(74, 144, 226, 0.3)' : 'rgba(226, 167, 74, 0.3)' }};
                    ">
                        {{ $recipe->jenis == 'drink' ? '🥤 Drink Recipe' : '🍰 Dessert Recipe' }}
                    </div>

                    <h1 style="
                        font-family: 'Inter', sans-serif;
                        font-size: 3.2rem;
                        font-weight: 800;
                        color: #2C1810;
                        margin: 0 0 25px 0;
                        line-height: 1.1;
                        background: linear-gradient(135deg, #2C1810 0%, #5D4037 100%);
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;
                        background-clip: text;
                    ">{{ $recipe->getTranslatedName() }}</h1>
                    
                    <p style="
                        font-family: 'Inter', sans-serif;
                        font-size: 1.2rem;
                        color: #666;
                        line-height: 1.7;
                        margin: 0;
                        opacity: 0.9;
                    ">{{ $recipe->getTranslatedDescription() }}</p>
                </div>

                <!-- Recipe Media (Video or Image) -->
                <div style="
                    position: relative;
                    @if(!$recipe->video)
                        background-size: cover;
                        background-position: center;
                        background-repeat: no-repeat;
                        @if($recipe->image)
                            background-image: url('{{ recipe_image($recipe->image) }}');
                        @else
                            background-image: url('{{ recipe_image('placeholder-recipe.jpg') }}');
                        @endif
                    @endif
                ">
                    @if($recipe->video && recipe_video($recipe->video))
                        <!-- Video Display -->
                        <video 
                            style="
                                width: 100%;
                                height: 100%;
                                object-fit: cover;
                                border-radius: 0;
                            "
                            controls
                            preload="metadata"
                            poster="@if($recipe->image){{ recipe_image($recipe->image) }}@else{{ recipe_image('placeholder-recipe.jpg') }}@endif"
                        >
                            <source src="{{ recipe_video($recipe->video) }}" type="video/mp4">
                            <source src="{{ recipe_video($recipe->video) }}" type="video/mov">
                            <source src="{{ recipe_video($recipe->video) }}" type="video/avi">
                            Your browser does not support the video tag.
                            <!-- Fallback to image if video fails -->
                            <img src="@if($recipe->image){{ recipe_image($recipe->image) }}@else{{ recipe_image('placeholder-recipe.jpg') }}@endif" 
                                 alt="{{ $recipe->getTranslatedName() }}" 
                                 style="width: 100%; height: 100%; object-fit: cover;">
                        </video>
                        
                        <!-- Video Overlay for Better UI -->
                        <div style="
                            position: absolute;
                            bottom: 20px;
                            right: 20px;
                            background: rgba(0, 0, 0, 0.7);
                            color: white;
                            padding: 8px 15px;
                            border-radius: 20px;
                            font-size: 12px;
                            font-weight: 500;
                            backdrop-filter: blur(10px);
                        ">
                            🎥 Recipe Video
                        </div>
                    @else
                        <!-- Image Display (Fallback) -->
                        <!-- Overlay with pattern -->
                        <div style="
                            position: absolute;
                            top: 0;
                            right: 0;
                            bottom: 0;
                            left: 0;
                            background: linear-gradient(135deg, rgba(212, 165, 116, 0.1) 0%, rgba(193, 154, 95, 0.2) 100%);
                        "></div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Recipe Content -->
        <div style="
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            margin-bottom: 60px;
        " class="recipe-content">
            <!-- Ingredients Card -->
            <div style="
                background: white;
                border-radius: 25px;
                padding: 50px;
                box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
                border: 1px solid rgba(255, 255, 255, 0.8);
                position: relative;
                overflow: hidden;
            ">
                <!-- Background Pattern -->
                <div style="
                    position: absolute;
                    top: -50px;
                    right: -50px;
                    width: 150px;
                    height: 150px;
                    background: linear-gradient(135deg, rgba(212, 165, 116, 0.1) 0%, rgba(193, 154, 95, 0.05) 100%);
                    border-radius: 50%;
                    z-index: 1;
                "></div>
                
                <div style="position: relative; z-index: 2;">
                    <!-- Icon and Title -->
                    <div style="
                        display: flex;
                        align-items: center;
                        margin-bottom: 35px;
                    ">
                        <div style="
                            background: linear-gradient(135deg, #FF6B6B 0%, #EE5A52 100%);
                            width: 60px;
                            height: 60px;
                            border-radius: 50%;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            margin-right: 20px;
                            box-shadow: 0 10px 25px rgba(255, 107, 107, 0.3);
                        ">
                            <span style="color: white; font-size: 24px;">🥄</span>
                        </div>
                        <h2 style="
                            font-family: 'Inter', sans-serif;
                            font-size: 2rem;
                            font-weight: 800;
                            color: #2C1810;
                            margin: 0;
                        ">{{ __('frontend.ingredients') }}</h2>
                    </div>
                    
                    <ul style="
                        list-style: none;
                        padding: 0;
                        margin: 0;
                    ">
                        @if(is_array($recipe->getTranslatedIngredients()))
                            @foreach($recipe->getTranslatedIngredients() as $index => $bahan)
                                <li style="
                                    padding: 25px 0 25px 80px;
                                    border-bottom: 1px solid rgba(240, 240, 240, 0.8);
                                    font-family: 'Inter', sans-serif;
                                    color: #555;
                                    line-height: 1.7;
                                    position: relative;
                                    font-size: 16px;
                                    transition: all 0.3s ease;
                                " onmouseover="this.style.backgroundColor='rgba(212, 165, 116, 0.05)'; this.style.paddingLeft='85px'" onmouseout="this.style.backgroundColor='transparent'; this.style.paddingLeft='80px'">
                                    <span style="
                                        position: absolute;
                                        left: 0;
                                        top: 25px;
                                        width: 50px;
                                        height: 50px;
                                        background: linear-gradient(135deg, #D4A574 0%, #C19A5F 100%);
                                        color: white;
                                        border-radius: 50%;
                                        display: flex;
                                        align-items: center;
                                        justify-content: center;
                                        font-weight: bold;
                                        font-size: 18px;
                                        box-shadow: 0 8px 20px rgba(212, 165, 116, 0.3);
                                    ">{{ $index + 1 }}</span>
                                    {{ $bahan }}
                                </li>
                            @endforeach
                        @else
                            @foreach(explode("\n", $recipe->getTranslatedIngredients()) as $index => $bahan)
                                @if(trim($bahan))
                                    <li style="
                                        padding: 25px 0 25px 80px;
                                        border-bottom: 1px solid rgba(240, 240, 240, 0.8);
                                        font-family: 'Inter', sans-serif;
                                        color: #555;
                                        line-height: 1.7;
                                        position: relative;
                                        font-size: 16px;
                                        transition: all 0.3s ease;
                                    " onmouseover="this.style.backgroundColor='rgba(212, 165, 116, 0.05)'; this.style.paddingLeft='85px'" onmouseout="this.style.backgroundColor='transparent'; this.style.paddingLeft='80px'">
                                        <span style="
                                            position: absolute;
                                            left: 0;
                                            top: 25px;
                                            width: 50px;
                                            height: 50px;
                                            background: linear-gradient(135deg, #D4A574 0%, #C19A5F 100%);
                                            color: white;
                                            border-radius: 50%;
                                            display: flex;
                                            align-items: center;
                                            justify-content: center;
                                            font-weight: bold;
                                            font-size: 18px;
                                            box-shadow: 0 8px 20px rgba(212, 165, 116, 0.3);
                                        ">{{ $index + 1 }}</span>
                                        {{ trim($bahan) }}
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>

            <!-- Instructions Card -->
            <div style="
                background: white;
                border-radius: 25px;
                padding: 50px;
                box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
                border: 1px solid rgba(255, 255, 255, 0.8);
                position: relative;
                overflow: hidden;
            ">
                <!-- Background Pattern -->
                <div style="
                    position: absolute;
                    top: -50px;
                    left: -50px;
                    width: 150px;
                    height: 150px;
                    background: linear-gradient(135deg, rgba(78, 205, 196, 0.1) 0%, rgba(68, 160, 141, 0.05) 100%);
                    border-radius: 50%;
                    z-index: 1;
                "></div>
                
                <div style="position: relative; z-index: 2;">
                    <!-- Icon and Title -->
                    <div style="
                        display: flex;
                        align-items: center;
                        margin-bottom: 35px;
                    ">
                        <div style="
                            background: linear-gradient(135deg, #4ECDC4 0%, #44A08D 100%);
                            width: 60px;
                            height: 60px;
                            border-radius: 50%;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            margin-right: 20px;
                            box-shadow: 0 10px 25px rgba(78, 205, 196, 0.3);
                        ">
                            <span style="color: white; font-size: 24px;">👩‍🍳</span>
                        </div>
                        <h2 style="
                            font-family: 'Inter', sans-serif;
                            font-size: 2rem;
                            font-weight: 800;
                            color: #2C1810;
                            margin: 0;
                        ">{{ __('frontend.instructions') }}</h2>
                    </div>
                    
                    <ol style="
                        padding: 0;
                        margin: 0;
                        counter-reset: step-counter;
                        list-style: none;
                    ">
                        @if(is_array($recipe->getTranslatedInstructions()))
                            @foreach($recipe->getTranslatedInstructions() as $index => $step)
                                <li style="
                                    padding: 25px 0 25px 80px;
                                    border-bottom: 1px solid rgba(240, 240, 240, 0.8);
                                    font-family: 'Inter', sans-serif;
                                    color: #555;
                                    line-height: 1.7;
                                    position: relative;
                                    font-size: 16px;
                                    transition: all 0.3s ease;
                                " onmouseover="this.style.backgroundColor='rgba(78, 205, 196, 0.05)'; this.style.paddingLeft='85px'" onmouseout="this.style.backgroundColor='transparent'; this.style.paddingLeft='80px'">
                                    <span style="
                                        position: absolute;
                                        left: 0;
                                        top: 25px;
                                        width: 50px;
                                        height: 50px;
                                        background: linear-gradient(135deg, #4ECDC4 0%, #44A08D 100%);
                                        color: white;
                                        border-radius: 50%;
                                        display: flex;
                                        align-items: center;
                                        justify-content: center;
                                        font-weight: bold;
                                        font-size: 18px;
                                        box-shadow: 0 8px 20px rgba(78, 205, 196, 0.3);
                                    ">{{ $index + 1 }}</span>
                                    {{ $step }}
                                </li>
                            @endforeach
                        @else
                            @foreach(explode("\n", $recipe->getTranslatedInstructions()) as $index => $step)
                                @if(trim($step))
                                    <li style="
                                        padding: 25px 0 25px 80px;
                                        border-bottom: 1px solid rgba(240, 240, 240, 0.8);
                                        font-family: 'Inter', sans-serif;
                                        color: #555;
                                        line-height: 1.7;
                                        position: relative;
                                        font-size: 16px;
                                        transition: all 0.3s ease;
                                    " onmouseover="this.style.backgroundColor='rgba(78, 205, 196, 0.05)'; this.style.paddingLeft='85px'" onmouseout="this.style.backgroundColor='transparent'; this.style.paddingLeft='80px'">
                                        <span style="
                                            position: absolute;
                                            left: 0;
                                            top: 25px;
                                            width: 50px;
                                            height: 50px;
                                            background: linear-gradient(135deg, #4ECDC4 0%, #44A08D 100%);
                                            color: white;
                                            border-radius: 50%;
                                            display: flex;
                                            align-items: center;
                                            justify-content: center;
                                            font-weight: bold;
                                            font-size: 18px;
                                            box-shadow: 0 8px 20px rgba(78, 205, 196, 0.3);
                                        ">{{ $index + 1 }}</span>
                                        {{ trim($step) }}
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    </ol>
                </div>
            </div>
        </div>

        <!-- Related Recipes Section -->
        @if($relatedRecipes->count() > 0)
        <div style="
            background: white;
            border-radius: 30px;
            padding: 60px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.8);
            position: relative;
            overflow: hidden;
        ">
            <!-- Background Decoration -->
            <div style="
                position: absolute;
                top: -100px;
                right: -100px;
                width: 300px;
                height: 300px;
                background: linear-gradient(135deg, rgba(168, 230, 207, 0.1) 0%, rgba(127, 205, 205, 0.05) 100%);
                border-radius: 50%;
                z-index: 1;
            "></div>
            
            <div style="position: relative; z-index: 2;">
                <!-- Section Header -->
                <div style="
                    text-align: center;
                    margin-bottom: 50px;
                ">
                    <div style="
                        background: linear-gradient(135deg, #A8E6CF 0%, #7FCDCD 100%);
                        width: 80px;
                        height: 80px;
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin: 0 auto 20px auto;
                        box-shadow: 0 15px 35px rgba(168, 230, 207, 0.3);
                    ">
                        <span style="color: white; font-size: 32px;">🍴</span>
                    </div>
                    <h2 style="
                        font-family: 'Inter', sans-serif;
                        font-size: 2.5rem;
                        font-weight: 800;
                        color: #2C1810;
                        margin: 0 0 15px 0;
                        background: linear-gradient(135deg, #2C1810 0%, #5D4037 100%);
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;
                        background-clip: text;
                    ">Resep Lainnya</h2>
                    <p style="
                        font-family: 'Inter', sans-serif;
                        font-size: 1.1rem;
                        color: #666;
                        margin: 0;
                        max-width: 500px;
                        margin: 0 auto;
                    ">Jelajahi resep {{ $recipe->jenis == 'drink' ? 'minuman' : 'dessert' }} lainnya yang tak kalah lezat</p>
                </div>
                
                <!-- Related Recipes Grid -->
                <div style="
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
                    gap: 40px;
                " class="related-recipes">
                    @foreach($relatedRecipes as $related)
                        <div style="
                            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(248, 245, 240, 0.9) 100%);
                            border-radius: 20px;
                            overflow: hidden;
                            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
                            transition: all 0.4s ease;
                            cursor: pointer;
                            border: 1px solid rgba(255, 255, 255, 0.8);
                            position: relative;
                        " onmouseover="this.style.transform='translateY(-10px) scale(1.02)'; this.style.boxShadow='0 25px 60px rgba(0, 0, 0, 0.15)'" onmouseout="this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 15px 40px rgba(0, 0, 0, 0.08)'"
                           onclick="window.location.href='{{ route('recipes.show', $related) }}'">
                            
                            <!-- Recipe Image -->
                            <div style="
                                height: 220px;
                                background-size: cover;
                                background-position: center;
                                position: relative;
                                @if($related->image)
                                    background-image: url('{{ recipe_image($related->image) }}');
                                @else
                                    background-image: url('{{ recipe_image('placeholder-recipe.jpg') }}');
                                @endif
                            ">
                                <!-- Recipe Type Badge -->
                                <div style="
                                    position: absolute;
                                    top: 15px;
                                    left: 15px;
                                    background: {{ $related->jenis == 'drink' ? 'linear-gradient(135deg, #4A90E2 0%, #357ABD 100%)' : 'linear-gradient(135deg, #E2A74A 0%, #CC9A42 100%)' }};
                                    color: white;
                                    padding: 8px 16px;
                                    border-radius: 50px;
                                    font-size: 12px;
                                    font-weight: 600;
                                    text-transform: uppercase;
                                    letter-spacing: 0.5px;
                                    box-shadow: 0 4px 15px {{ $related->jenis == 'drink' ? 'rgba(74, 144, 226, 0.4)' : 'rgba(226, 167, 74, 0.4)' }};
                                ">
                                    {{ $related->jenis == 'drink' ? '🥤 Drink' : '🍰 Dessert' }}
                                </div>
                                
                                <!-- Overlay -->
                                <div style="
                                    position: absolute;
                                    bottom: 0;
                                    left: 0;
                                    right: 0;
                                    height: 80px;
                                    background: linear-gradient(transparent, rgba(0, 0, 0, 0.6));
                                "></div>
                            </div>
                            
                            <!-- Recipe Content -->
                            <div style="padding: 30px;">
                                <h3 style="
                                    font-family: 'Inter', sans-serif;
                                    font-size: 1.3rem;
                                    font-weight: 700;
                                    color: #2C1810;
                                    margin: 0 0 15px 0;
                                    line-height: 1.3;
                                    display: -webkit-box;
                                    -webkit-line-clamp: 2;
                                    -webkit-box-orient: vertical;
                                    overflow: hidden;
                                ">{{ $related->getTranslatedName() }}</h3>
                                
                                <p style="
                                    color: #666;
                                    font-size: 0.95rem;
                                    margin: 0;
                                    line-height: 1.6;
                                    display: -webkit-box;
                                    -webkit-line-clamp: 3;
                                    -webkit-box-orient: vertical;
                                    overflow: hidden;
                                ">{{ Str::limit($related->getTranslatedDescription(), 120) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Enhanced Responsive Styles -->
<style>
    /* Modern animations and transitions */
    * {
        box-sizing: border-box;
    }
    
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');
    
    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }
    
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    
    ::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, #D4A574 0%, #C19A5F 100%);
        border-radius: 10px;
    }
    
    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, #C19A5F 0%, #B08A4F 100%);
    }
    
    /* Large Desktop - 1440px and above */
    @media (min-width: 1440px) {
        section > div {
            max-width: 1600px !important;
        }
    }
    
    /* Desktop - 1200px to 1439px */
    @media (max-width: 1439px) {
        section > div {
            max-width: 1200px !important;
            padding: 0 25px !important;
        }
        
        .recipe-header {
            grid-template-columns: 1fr 450px !important;
        }
    }
    
    /* Large Tablet - 1024px to 1199px */
    @media (max-width: 1199px) {
        section > div {
            padding: 0 20px !important;
        }
        
        .recipe-header {
            grid-template-columns: 1fr 400px !important;
            min-height: 500px !important;
        }
        
        .recipe-header > div:first-child {
            padding: 50px !important;
        }
        
        .recipe-content {
            gap: 40px !important;
        }
        
        .recipe-content > div {
            padding: 40px !important;
        }
    }
    
    /* Tablet - 768px to 1023px */
    @media (max-width: 1023px) {
        section {
            padding: 100px 0 60px 0 !important;
        }
        
        .recipe-header {
            grid-template-columns: 1fr !important;
            min-height: auto !important;
        }
        
        /* Show recipe image on mobile */
        .recipe-header > div:last-child {
            order: -1;
            height: 300px !important;
            margin-bottom: 0 !important;
            border-radius: 0 0 30px 30px !important;
        }
        
        .recipe-header > div:first-child {
            padding: 40px !important;
            text-align: center;
        }
        
        .recipe-header > div:first-child h1 {
            font-size: 2.5rem !important;
        }
        
        .recipe-content {
            grid-template-columns: 1fr !important;
            gap: 30px !important;
        }
        
        .related-recipes {
            grid-template-columns: repeat(2, 1fr) !important;
            gap: 30px !important;
        }
        
        /* Hide some decorative elements on tablet */
        .recipe-header > div:first-child > div:last-child {
            justify-content: center !important;
        }
    }
    
    /* Large Mobile - 481px to 767px */
    @media (max-width: 767px) {
        section {
            padding: 80px 0 40px 0 !important;
        }
        
        section > div {
            padding: 0 15px !important;
        }
        
        /* Back button adjustments */
        section > div > div:first-child {
            margin-bottom: 30px !important;
        }
        
        section > div > div:first-child a {
            padding: 12px 20px !important;
            font-size: 14px !important;
        }
        
        /* Hero card adjustments */
        .recipe-header > div:first-child {
            padding: 30px !important;
        }
        
        /* Make sure image is visible and properly sized on mobile */
        .recipe-header > div:last-child {
            height: 350px !important; /* Increased height for portrait video */
            margin-bottom: 0 !important;
        }
        
        /* Video specific styling for mobile portrait */
        .recipe-header > div:last-child video {
            height: 100% !important;
            width: auto !important;
            max-width: 100% !important;
            object-fit: contain !important; /* Changed from cover to contain for portrait */
            object-position: center !important;
            border-radius: 0 !important;
        }
        
        /* Video overlay positioning for mobile */
        .recipe-header > div:last-child > div:last-child {
            bottom: 10px !important;
            right: 10px !important;
            padding: 6px 12px !important;
            font-size: 10px !important;
            border-radius: 15px !important;
        }
        
        .recipe-header > div:first-child h1 {
            font-size: 2rem !important;
        }
        
        .recipe-header > div:first-child p {
            font-size: 1rem !important;
        }
        
        /* Content cards */
        .recipe-content > div {
            padding: 30px !important;
            border-radius: 20px !important;
        }
        
        .recipe-content > div h2 {
            font-size: 1.5rem !important;
        }
        
        /* Related recipes */
        .related-recipes {
            grid-template-columns: 1fr !important;
            gap: 25px !important;
        }
        
        /* Related recipes section */
        .related-recipes ~ div ~ div {
            padding: 40px !important;
        }
    }
    
    /* Small Mobile - 320px to 480px */
    @media (max-width: 480px) {
        section > div {
            padding: 0 10px !important;
        }
        
        .recipe-header > div:first-child {
            padding: 20px !important;
        }
        
        /* Ensure image/video is visible on small mobile too */
        .recipe-header > div:last-child {
            height: 300px !important; /* Increased for portrait video */
        }
        
        /* Video specific styling for small mobile */
        .recipe-header > div:last-child video {
            height: 100% !important;
            width: auto !important;
            max-width: 100% !important;
            object-fit: contain !important;
            object-position: center !important;
        }
        
        /* Smaller video overlay for small mobile */
        .recipe-header > div:last-child > div:last-child {
            bottom: 8px !important;
            right: 8px !important;
            padding: 4px 8px !important;
            font-size: 9px !important;
            border-radius: 10px !important;
        }
        
        .recipe-header > div:first-child h1 {
            font-size: 1.8rem !important;
            line-height: 1.2 !important;
        }
        
        .recipe-header > div:first-child p {
            font-size: 0.9rem !important;
        }
        
        /* Badge adjustments */
        .recipe-header > div:first-child > div:first-child {
            padding: 10px 20px !important;
            font-size: 12px !important;
        }
        
        /* Content cards */
        .recipe-content > div {
            padding: 25px !important;
        }
        
        .recipe-content > div h2 {
            font-size: 1.3rem !important;
        }
        
        /* Icon and title adjustments */
        .recipe-content > div > div > div:first-child {
            flex-direction: column !important;
            text-align: center !important;
            margin-bottom: 25px !important;
        }
        
        .recipe-content > div > div > div:first-child > div:first-child {
            margin-right: 0 !important;
            margin-bottom: 15px !important;
        }
        
        /* List items */
        .recipe-content li {
            padding-left: 40px !important;
            font-size: 14px !important;
        }
        
        .recipe-content li span {
            width: 25px !important;
            height: 25px !important;
            font-size: 11px !important;
        }
        
        /* Step instructions */
        .recipe-content ol li {
            padding: 20px 0 20px 60px !important;
        }
        
        .recipe-content ol li span {
            width: 40px !important;
            height: 40px !important;
            font-size: 16px !important;
        }
        
        /* Related section */
        .related-recipes ~ div ~ div {
            padding: 30px !important;
        }
        
        .related-recipes ~ div ~ div h2 {
            font-size: 2rem !important;
        }
    }
    
    /* Ultra small screens - below 320px */
    @media (max-width: 319px) {
        .recipe-header > div:first-child h1 {
            font-size: 1.5rem !important;
        }
        
        .recipe-content > div {
            padding: 20px !important;
        }
        
        .recipe-content > div h2 {
            font-size: 1.2rem !important;
        }
    }
    
    /* Landscape orientation adjustments */
    @media (max-height: 600px) and (orientation: landscape) {
        section {
            padding: 60px 0 40px 0 !important;
        }
        
        .recipe-header {
            min-height: 400px !important;
        }
    }
    
    /* Print styles */
    @media print {
        section {
            background: white !important;
            padding: 20px 0 !important;
        }
        
        .recipe-header,
        .recipe-content > div {
            box-shadow: none !important;
            border: 1px solid #ddd !important;
        }
        
        /* Hide interactive elements */
        section > div > div:first-child,
        .related-recipes ~ div {
            display: none !important;
        }
    }
    
    /* High contrast mode support */
    @media (prefers-contrast: high) {
        .recipe-header,
        .recipe-content > div {
            border: 2px solid #000 !important;
        }
    }
    
    /* Reduced motion support */
    @media (prefers-reduced-motion: reduce) {
        * {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            transition-duration: 0.01ms !important;
        }
    }
    
    /* Portrait Orientation Specific Styles for Mobile */
    @media (max-width: 767px) and (orientation: portrait) {
        /* Optimize video container for portrait */
        .recipe-header > div:last-child {
            height: 400px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            background-color: #000 !important;
        }
        
        .recipe-header > div:last-child video {
            height: 100% !important;
            width: auto !important;
            max-width: 100% !important;
            object-fit: contain !important;
            object-position: center !important;
            background: #000 !important;
        }
    }
    
    /* Landscape Orientation for Mobile - Keep video wider */
    @media (max-width: 767px) and (orientation: landscape) {
        .recipe-header > div:last-child {
            height: 250px !important;
        }
        
        .recipe-header > div:last-child video {
            height: 100% !important;
            width: 100% !important;
            object-fit: cover !important;
            object-position: center !important;
        }
    }
    
    /* Very small screens - ensure good video experience */
    @media (max-width: 480px) and (orientation: portrait) {
        .recipe-header > div:last-child {
            height: 350px !important;
        }
        
        .recipe-header > div:last-child video {
            border-radius: 0 !important;
        }
    }
</style>
@endsection
