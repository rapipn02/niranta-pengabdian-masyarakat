@extends('frontend.layouts.app')

@section('content')
<!-- Recipe Detail Section -->
<section style="
    background-color: #F2ECE0;
    padding: 120px 0 80px 0;
    min-height: 100vh;
">
    <div style="
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    ">
        <!-- Back Button -->
        <div style="margin-bottom: 40px;">
            <a href="{{ route('resep') }}" style="
                display: inline-flex;
                align-items: center;
                background: #D4A574;
                color: white;
                text-decoration: none;
                padding: 12px 20px;
                border-radius: 10px;
                font-family: 'Inter', sans-serif;
                font-size: 14px;
                font-weight: 500;
                transition: background 0.3s ease;
            " onmouseover="this.style.background='#C19A5F'" onmouseout="this.style.background='#D4A574'">
                ← Back to Recipes
            </a>
        </div>

        <!-- Recipe Header -->
        <div style="
            background: white;
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 40px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        ">
            <div style="
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 40px;
                align-items: center;
            " class="recipe-header">
                <!-- Recipe Info -->
                <div>
                    <!-- Recipe Type Badge -->
                    <div style="
                        display: inline-block;
                        background: {{ $recipe->jenis == 'drink' ? '#4A90E2' : '#E2A74A' }};
                        color: white;
                        padding: 8px 20px;
                        border-radius: 25px;
                        font-size: 14px;
                        font-weight: 500;
                        text-transform: capitalize;
                        margin-bottom: 20px;
                    ">
                        {{ $recipe->jenis == 'drink' ? 'Drink Recipe' : 'Dessert Recipe' }}
                    </div>

                    <h1 style="
                        font-family: 'Inter', sans-serif;
                        font-size: 2.5rem;
                        font-weight: bold;
                        color: #2C1810;
                        margin: 0 0 20px 0;
                        line-height: 1.2;
                    ">{{ $recipe->nama_resep }}</h1>
                    
                    <p style="
                        font-family: 'Inter', sans-serif;
                        font-size: 1.1rem;
                        color: #666;
                        line-height: 1.6;
                        margin: 0;
                    ">{{ $recipe->deskripsi }}</p>
                </div>

                <!-- Recipe Image -->
                <div>
                    <img src="@if($recipe->image && file_exists(public_path('storage/' . $recipe->image))){{ asset('storage/' . $recipe->image) }}@else{{ asset('makanan1.png') }}@endif" 
                         alt="{{ $recipe->nama_resep }}" style="
                        width: 100%;
                        height: 400px;
                        object-fit: cover;
                        border-radius: 15px;
                        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                    ">
                </div>
            </div>
        </div>

        <!-- Recipe Content -->
        <div style="
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
        " class="recipe-content">
            <!-- Ingredients -->
            <div style="
                background: white;
                border-radius: 20px;
                padding: 40px;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            ">
                <h2 style="
                    font-family: 'Inter', sans-serif;
                    font-size: 1.8rem;
                    font-weight: bold;
                    color: #2C1810;
                    margin: 0 0 30px 0;
                ">Bahan-bahan</h2>
                
                <ul style="
                    list-style: none;
                    padding: 0;
                    margin: 0;
                ">
                    @if(is_array($recipe->bahan))
                        @foreach($recipe->bahan as $bahan)
                            <li style="
                                padding: 12px 0;
                                border-bottom: 1px solid #f0f0f0;
                                font-family: 'Inter', sans-serif;
                                color: #555;
                                position: relative;
                                padding-left: 30px;
                            ">
                                <span style="
                                    position: absolute;
                                    left: 0;
                                    top: 50%;
                                    transform: translateY(-50%);
                                    width: 8px;
                                    height: 8px;
                                    background: #D4A574;
                                    border-radius: 50%;
                                "></span>
                                {{ $bahan }}
                            </li>
                        @endforeach
                    @else
                        @foreach(explode("\n", $recipe->bahan) as $bahan)
                            @if(trim($bahan))
                                <li style="
                                    padding: 12px 0;
                                    border-bottom: 1px solid #f0f0f0;
                                    font-family: 'Inter', sans-serif;
                                    color: #555;
                                    position: relative;
                                    padding-left: 30px;
                                ">
                                    <span style="
                                        position: absolute;
                                        left: 0;
                                        top: 50%;
                                        transform: translateY(-50%);
                                        width: 8px;
                                        height: 8px;
                                        background: #D4A574;
                                        border-radius: 50%;
                                    "></span>
                                    {{ trim($bahan) }}
                                </li>
                            @endif
                        @endforeach
                    @endif
                </ul>
            </div>

            <!-- Instructions -->
            <div style="
                background: white;
                border-radius: 20px;
                padding: 40px;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            ">
                <h2 style="
                    font-family: 'Inter', sans-serif;
                    font-size: 1.8rem;
                    font-weight: bold;
                    color: #2C1810;
                    margin: 0 0 30px 0;
                ">Cara Membuat</h2>
                
                <ol style="
                    padding: 0;
                    margin: 0;
                    counter-reset: step-counter;
                ">
                    @if(is_array($recipe->cara_membuat))
                        @foreach($recipe->cara_membuat as $step)
                            <li style="
                                padding: 20px 0 20px 60px;
                                border-bottom: 1px solid #f0f0f0;
                                font-family: 'Inter', sans-serif;
                                color: #555;
                                line-height: 1.6;
                                position: relative;
                                counter-increment: step-counter;
                            ">
                                <span style="
                                    position: absolute;
                                    left: 0;
                                    top: 20px;
                                    width: 35px;
                                    height: 35px;
                                    background: #D4A574;
                                    color: white;
                                    border-radius: 50%;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    font-weight: bold;
                                    font-size: 14px;
                                ">
                                    '" . "counter(step-counter)" . "'
                                </span>
                                {{ $step }}
                            </li>
                        @endforeach
                    @else
                        @foreach(explode("\n", $recipe->cara_membuat) as $step)
                            @if(trim($step))
                                <li style="
                                    padding: 20px 0 20px 60px;
                                    border-bottom: 1px solid #f0f0f0;
                                    font-family: 'Inter', sans-serif;
                                    color: #555;
                                    line-height: 1.6;
                                    position: relative;
                                    counter-increment: step-counter;
                                ">
                                    <span style="
                                        position: absolute;
                                        left: 0;
                                        top: 20px;
                                        width: 35px;
                                        height: 35px;
                                        background: #D4A574;
                                        color: white;
                                        border-radius: 50%;
                                        display: flex;
                                        align-items: center;
                                        justify-content: center;
                                        font-weight: bold;
                                        font-size: 14px;
                                    ">
                                        '" . "counter(step-counter)" . "'
                                    </span>
                                    {{ trim($step) }}
                                </li>
                            @endif
                        @endforeach
                    @endif
                </ol>
            </div>
        </div>

        <!-- Related Recipes -->
        @if($relatedRecipes->count() > 0)
        <div style="margin-top: 80px;">
            <h2 style="
                font-family: 'Inter', sans-serif;
                font-size: 2rem;
                font-weight: bold;
                color: #2C1810;
                margin: 0 0 40px 0;
                text-align: center;
            ">Resep Lainnya</h2>
            
            <div style="
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 30px;
            " class="related-recipes">
                @foreach($relatedRecipes as $related)
                    <div style="
                        background: white;
                        border-radius: 15px;
                        overflow: hidden;
                        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                        transition: transform 0.3s ease;
                        cursor: pointer;
                    " onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'"
                       onclick="window.location.href='{{ route('recipes.show', '') }}/' + {{ $related->id }}">
                        <div style="
                            height: 200px;
                            background-size: cover;
                            background-position: center;
                            @if($related->image && file_exists(public_path('storage/' . $related->image)))
                                background-image: url('{{ asset('storage/' . $related->image) }}');
                            @else
                                background-image: url('{{ asset('makanan1.png') }}');
                            @endif
                        "></div>
                        <div style="padding: 20px;">
                            <h3 style="
                                font-family: 'Inter', sans-serif;
                                font-size: 1.1rem;
                                font-weight: 600;
                                color: #2C1810;
                                margin: 0 0 10px 0;
                            ">{{ $related->nama_resep }}</h3>
                            <p style="
                                color: #666;
                                font-size: 0.9rem;
                                margin: 0;
                            ">{{ Str::limit($related->deskripsi, 80) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Responsive Styles -->
<style>
    @media (max-width: 1024px) {
        .recipe-header, .recipe-content {
            grid-template-columns: 1fr !important;
        }
        .related-recipes {
            grid-template-columns: repeat(2, 1fr) !important;
        }
    }
    
    @media (max-width: 768px) {
        .related-recipes {
            grid-template-columns: 1fr !important;
        }
    }
</style>
@endsection
