<div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
    <div class="relative">
        <img src="{{ $recipe->image ? recipe_image($recipe->image) : recipe_image('placeholder-recipe.jpg') }}" 
             alt="{{ $recipe->getTitle() }}" 
             class="w-full h-48 object-cover">
        
        @if($recipe->is_featured)
            <div class="absolute top-4 left-4">
                <span class="bg-green-500 text-white px-2 py-1 rounded text-sm font-semibold">
                    {{ app()->getLocale() == 'id' ? 'Unggulan' : 'Featured' }}
                </span>
            </div>
        @endif
        
        @if($recipe->difficulty)
            <div class="absolute top-4 right-4">
                <span class="bg-white bg-opacity-90 text-gray-800 px-2 py-1 rounded text-sm font-medium">
                    {{ __('frontend.' . $recipe->difficulty) }}
                </span>
            </div>
        @endif
    </div>
    
    <div class="p-6">
        <div class="mb-2">
            @if($recipe->getCategory())
                <span class="text-sm text-green-600 font-medium">
                    {{ $recipe->getCategory() }}
                </span>
            @endif
        </div>
        
        <h3 class="text-xl font-bold text-gray-900 mb-2">
            {{ $recipe->getTitle() }}
        </h3>
        
        @if($recipe->getDescription())
            <p class="text-gray-600 mb-4 line-clamp-3">
                {{ Str::limit($recipe->getDescription(), 120) }}
            </p>
        @endif
        
        <!-- Recipe Info -->
        <div class="flex flex-wrap gap-4 mb-4 text-sm text-gray-500">
            @if($recipe->prep_time)
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                    </svg>
                    {{ $recipe->prep_time }}m {{ __('frontend.prep_time') }}
                </div>
            @endif
            
            @if($recipe->cook_time)
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
                    </svg>
                    {{ $recipe->cook_time }}m {{ __('frontend.cook_time') }}
                </div>
            @endif
            
            @if($recipe->servings)
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    {{ $recipe->servings }} {{ __('frontend.servings') }}
                </div>
            @endif
        </div>
        
        <div class="flex justify-between items-center">
            <a href="{{ route('recipes.show', $recipe->id) }}" 
               class="inline-flex items-center text-green-600 hover:text-green-800 font-medium">
                {{ __('frontend.read_more') }}
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
            
            @if($recipe->getIngredients() && count($recipe->getIngredients()) > 0)
                <span class="text-sm text-gray-500">
                    {{ count($recipe->getIngredients()) }} 
                    {{ app()->getLocale() == 'id' ? 'bahan' : 'ingredients' }}
                </span>
            @endif
        </div>
    </div>
</div>
