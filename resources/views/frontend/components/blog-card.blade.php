<div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
    <div class="relative">
        <img src="{{ $blog->featured_image ? blog_image($blog->featured_image) : blog_image('placeholder-blog.jpg') }}" 
             alt="{{ $blog->getTitle() }}" 
             class="w-full h-48 object-cover">
        
        @if($blog->is_featured)
            <div class="absolute top-4 left-4">
                <span class="bg-purple-500 text-white px-2 py-1 rounded text-sm font-semibold">
                    {{ app()->getLocale() == 'id' ? 'Unggulan' : 'Featured' }}
                </span>
            </div>
        @endif
        
        <div class="absolute bottom-4 left-4">
            <span class="bg-black bg-opacity-70 text-white px-2 py-1 rounded text-sm">
                {{ $blog->published_at ? $blog->published_at->format('M d, Y') : $blog->created_at->format('M d, Y') }}
            </span>
        </div>
    </div>
    
    <div class="p-6">
        <div class="mb-2">
            @if($blog->getCategory())
                <span class="text-sm text-purple-600 font-medium">
                    {{ $blog->getCategory() }}
                </span>
            @endif
        </div>
        
        <h3 class="text-xl font-bold text-gray-900 mb-2">
            {{ $blog->getTitle() }}
        </h3>
        
        @if($blog->getExcerpt())
            <p class="text-gray-600 mb-4 line-clamp-3">
                {{ Str::limit($blog->getExcerpt(), 120) }}
            </p>
        @elseif($blog->getContent())
            <p class="text-gray-600 mb-4 line-clamp-3">
                {{ Str::limit(strip_tags($blog->getContent()), 120) }}
            </p>
        @endif
        
        <!-- Blog Meta -->
        <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
            @if($blog->author)
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                    </svg>
                    {{ __('frontend.by_author') }} {{ $blog->author }}
                </div>
            @endif
            
            @if($blog->views > 0)
                <div class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                    </svg>
                    {{ $blog->views }} {{ app()->getLocale() == 'id' ? 'views' : 'views' }}
                </div>
            @endif
        </div>
        
        <!-- Tags -->
        @if($blog->getTags() && count($blog->getTags()) > 0)
            <div class="flex flex-wrap gap-2 mb-4">
                @foreach(array_slice($blog->getTags(), 0, 3) as $tag)
                    <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded text-xs">
                        #{{ $tag }}
                    </span>
                @endforeach
                @if(count($blog->getTags()) > 3)
                    <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded text-xs">
                        +{{ count($blog->getTags()) - 3 }}
                    </span>
                @endif
            </div>
        @endif
        
        <div class="flex justify-between items-center">
            <a href="{{ route('blogs.show', ['blog' => $blog->id, 'slug' => $blog->getSlug()]) }}" 
               class="inline-flex items-center text-purple-600 hover:text-purple-800 font-medium">
                {{ __('frontend.read_more') }}
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
            
            <span class="text-sm text-gray-500">
                {{ $blog->published_at ? __('frontend.published_on') . ' ' . $blog->published_at->format('M d') : $blog->created_at->format('M d') }}
            </span>
        </div>
    </div>
</div>
