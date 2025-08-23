<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Blog;
use App\Models\BlogTranslation;
use App\Services\GoogleTranslateService;

class UpdateBlogTranslations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'translate:blogs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update all existing blogs with English translations';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $translateService = new GoogleTranslateService();
        $blogs = Blog::all();
        
        $this->info("Starting translation for {$blogs->count()} blogs...");
        
        foreach ($blogs as $blog) {
            $this->info("Translating blog: {$blog->judul_blog}");
            
            // Translate judul blog
            $translatedTitle = $translateService->translate($blog->judul_blog, 'en', 'id');
            
            // Translate excerpt
            $translatedExcerpt = $translateService->translate($blog->excerpt, 'en', 'id');
            
            // Translate content
            $translatedContent = $translateService->translate($blog->content, 'en', 'id');

            // Simpan terjemahan
            BlogTranslation::updateOrCreate(
                [
                    'blog_id' => $blog->id,
                    'locale' => 'en'
                ],
                [
                    'judul_blog' => $translatedTitle,
                    'excerpt' => $translatedExcerpt,
                    'content' => $translatedContent
                ]
            );

            // Simpan data asli sebagai terjemahan Indonesia
            BlogTranslation::updateOrCreate(
                [
                    'blog_id' => $blog->id,
                    'locale' => 'id'
                ],
                [
                    'judul_blog' => $blog->judul_blog,
                    'excerpt' => $blog->excerpt,
                    'content' => $blog->content
                ]
            );
            
            $this->info("✓ Translated: {$blog->judul_blog} → {$translatedTitle}");
            
            // Small delay to avoid API rate limits
            sleep(1);
        }
        
        $this->info("All blog translations completed!");
        return 0;
    }
}
