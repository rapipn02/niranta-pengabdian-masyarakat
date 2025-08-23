<div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
    <div class="relative">
        <div class="aspect-square overflow-hidden rounded-lg bg-gray-100">
        <img src="{{ $product->image ? product_image($product->image) : product_image('placeholder-product.jpg') }}" 
             alt="{{ $product->getName() }}" 
             class="w-full h-48 object-cover">
        
        @if($product->is_featured)
            <div class="absolute top-4 left-4">
                <span class="bg-yellow-500 text-white px-2 py-1 rounded text-sm font-semibold">
                    {{ app()->getLocale() == 'id' ? 'Unggulan' : 'Featured' }}
                </span>
            </div>
        @endif
        
        @if($product->price)
            <div class="absolute top-4 right-4">
                <span class="bg-blue-600 text-white px-3 py-1 rounded-lg font-semibold">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </span>
            </div>
        @endif
    </div>
    
    <div class="p-6">
        <div class="mb-2">
            @if($product->getCategory())
                <span class="text-sm text-blue-600 font-medium">
                    {{ $product->getCategory() }}
                </span>
            @endif
        </div>
        
        <h3 class="text-xl font-bold text-gray-900 mb-2">
            {{ $product->getName() }}
        </h3>
        
        @if($product->getDescription())
            <p class="text-gray-600 mb-4 line-clamp-3">
                {{ Str::limit($product->getDescription(), 120) }}
            </p>
        @endif
        
        <div class="flex justify-between items-center">
            <a href="{{ route('products.show', $product->id) }}" 
               class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium">
                {{ __('frontend.learn_more') }}
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
            
            @if($product->specifications && count($product->specifications) > 0)
                <span class="text-sm text-gray-500">
                    {{ count($product->specifications) }} 
                    {{ app()->getLocale() == 'id' ? 'spesifikasi' : 'specs' }}
                </span>
            @endif
        </div>
    </div>
</div>
