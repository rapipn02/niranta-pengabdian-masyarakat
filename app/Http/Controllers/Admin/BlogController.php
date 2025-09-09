<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Services\GoogleTranslateService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display admin blogs page
     */
    public function index()
    {
        $blogs = Blog::latest('tanggal_upload')->paginate(10);
        return view('admin.blogs', compact('blogs'));
    }

    /**
     * Show the form for creating a new blog
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created blog
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul_blog' => 'required|string|max:255',
            'tanggal_upload' => 'required|date',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'author' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_published' => 'boolean',
            'is_featured' => 'boolean',
        ]);

        // Set default author if not provided
        if (empty($validated['author'])) {
            $validated['author'] = 'Admin';
        }

        // Handle checkbox values (checkboxes don't send value if unchecked)
        $validated['is_published'] = $request->has('is_published') ? true : false;
        $validated['is_featured'] = $request->has('is_featured') ? true : false;

        if ($request->hasFile('image')) {
            // Create directory if not exists
            $storageDir = storage_path('app/public/images/blogs');
            if (!file_exists($storageDir)) {
                mkdir($storageDir, 0755, true);
            }
            
            // Generate filename
            $image = $request->file('image');
            $imageName = 'blog_' . time() . '.' . $image->getClientOriginalExtension();
            
            // Move file to storage with exact name
            $image->move($storageDir, $imageName);
            $validated['image'] = 'images/blogs/' . $imageName;
        }

        Blog::create($validated);

        $blog = Blog::latest()->first();

        // Auto translate ke bahasa Inggris
        $this->createTranslation($blog);

        return redirect()->route('admin.blogs')
            ->with('success', 'Blog berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified blog
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified blog
     */
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'judul_blog' => 'required|string|max:255',
            'tanggal_upload' => 'required|date',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'author' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_published' => 'boolean',
            'is_featured' => 'boolean',
        ]);

        // Set default author if not provided
        if (empty($validated['author'])) {
            $validated['author'] = 'Admin';
        }

        // Handle checkbox values (checkboxes don't send value if unchecked)
        $validated['is_published'] = $request->has('is_published') ? true : false;
        $validated['is_featured'] = $request->has('is_featured') ? true : false;

        if ($request->hasFile('image')) {
            // Delete old image from storage
            if ($blog->image) {
                $oldImagePath = storage_path('app/public/' . $blog->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            
            // Create directory if not exists
            $storageDir = storage_path('app/public/images/blogs');
            if (!file_exists($storageDir)) {
                mkdir($storageDir, 0755, true);
            }
            
            // Generate filename
            $image = $request->file('image');
            $imageName = 'blog_' . time() . '.' . $image->getClientOriginalExtension();
            
            // Move file to storage with exact name
            $image->move($storageDir, $imageName);
            $validated['image'] = 'images/blogs/' . $imageName;
        }

        $blog->update($validated);

        // Update translations
        $this->createTranslation($blog);

        return redirect()->route('admin.blogs')
            ->with('success', 'Blog berhasil diperbarui!');
    }

    /**
     * Create English translation for blog
     */
    private function createTranslation(Blog $blog)
    {
        $translateService = new GoogleTranslateService();
        
        try {
            // Translate judul blog
            $translatedTitle = $translateService->translate($blog->judul_blog, 'en', 'id');
            
            // Translate excerpt
            $translatedExcerpt = $translateService->translate($blog->excerpt, 'en', 'id');
            
            // Translate content
            $translatedContent = $translateService->translate($blog->content, 'en', 'id');
            
            // Check if translation actually worked (not same as original)
            $translationWorked = ($translatedTitle !== $blog->judul_blog) || 
                               ($translatedExcerpt !== $blog->excerpt) || 
                               ($translatedContent !== $blog->content);
            
            if (!$translationWorked) {
                \Log::warning('Google Translate may have failed - using fallback translations for blog: ' . $blog->id);
                // Use fallback English translations
                $translatedTitle = $this->getFallbackTitle($blog->judul_blog);
                $translatedExcerpt = $this->getFallbackExcerpt($blog->excerpt);
                $translatedContent = $this->getFallbackContent($blog->content);
            }
        } catch (\Exception $e) {
            \Log::error('Translation failed for blog ' . $blog->id . ': ' . $e->getMessage());
            // Use fallback English translations
            $translatedTitle = $this->getFallbackTitle($blog->judul_blog);
            $translatedExcerpt = $this->getFallbackExcerpt($blog->excerpt);
            $translatedContent = $this->getFallbackContent($blog->content);
        }

        // Use DB query instead of model for now
        DB::table('blog_translations')->updateOrInsert(
            [
                'blog_id' => $blog->id,
                'locale' => 'en'
            ],
            [
                'judul_blog' => $translatedTitle,
                'excerpt' => $translatedExcerpt,
                'content' => $translatedContent,
                'updated_at' => now(),
                'created_at' => now()
            ]
        );

        // Simpan data asli sebagai terjemahan Indonesia
        DB::table('blog_translations')->updateOrInsert(
            [
                'blog_id' => $blog->id,
                'locale' => 'id'
            ],
            [
                'judul_blog' => $blog->judul_blog,
                'excerpt' => $blog->excerpt,
                'content' => $blog->content,
                'updated_at' => now(),
                'created_at' => now()
            ]
        );
    }

    /**
     * Fallback English translations when Google Translate fails
     */
    private function getFallbackTitle($indonesianTitle)
    {
        // Simple fallback - you can expand this with more mappings
        $fallbacks = [
            'Perbedaan Antara Gula Aren dan Gula Merah' => 'The Difference Between Palm Sugar and Brown Sugar',
            'niranta sangat bagus' => 'Niranta is Very Good',
            // Add more common translations here
        ];
        
        return $fallbacks[$indonesianTitle] ?? $indonesianTitle . ' (Indonesian)';
    }
    
    private function getFallbackExcerpt($indonesianExcerpt)
    {
        // Simple fallback
        if (strlen($indonesianExcerpt) > 100) {
            return 'Find out more about this topic in our detailed article. ' . substr($indonesianExcerpt, 0, 50) . '...';
        }
        return 'Discover more about: ' . $indonesianExcerpt;
    }
    
    private function getFallbackContent($indonesianContent)
    {
        // Simple fallback
        return "This article is originally written in Indonesian. Here's the content:\n\n" . $indonesianContent . "\n\n(English translation will be available soon)";
    }

    /**
     * Remove the specified blog
     */
    public function destroy(Blog $blog)
    {
        // Delete image file from public folder
        if ($blog->image && file_exists(public_path($blog->image))) {
            unlink(public_path($blog->image));
        }

        $blog->delete();

        return redirect()->route('admin.blogs')
            ->with('success', 'Blog berhasil dihapus!');
    }

    /**
     * Toggle blog published status
     */
    public function togglePublished(Blog $blog)
    {
        $blog->update(['is_published' => !$blog->is_published]);

        $status = $blog->is_published ? 'dipublikasikan' : 'disembunyikan';
        return response()->json([
            'success' => true,
            'message' => "Blog berhasil {$status}!"
        ]);
    }

    /**
     * Toggle blog featured status
     */
    public function toggleFeatured(Blog $blog)
    {
        $blog->update(['is_featured' => !$blog->is_featured]);

        $status = $blog->is_featured ? 'dijadikan unggulan' : 'dihapus dari unggulan';
        return response()->json([
            'success' => true,
            'message' => "Blog berhasil {$status}!"
        ]);
    }
}
