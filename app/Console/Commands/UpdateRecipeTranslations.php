<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Recipe;
use App\Models\RecipeTranslation;
use App\Services\GoogleTranslateService;

class UpdateRecipeTranslations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'translate:recipes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update all existing recipes with English translations';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $translateService = new GoogleTranslateService();
        $recipes = Recipe::all();
        
        $this->info("Starting translation for {$recipes->count()} recipes...");
        
        foreach ($recipes as $recipe) {
            $this->info("Translating recipe: {$recipe->nama_resep}");
            
            try {
                // Translate nama resep
                $translatedName = $translateService->translate($recipe->nama_resep, 'en', 'id');
                
                // Translate deskripsi
                $translatedDescription = $translateService->translate($recipe->deskripsi, 'en', 'id');
                
                // Translate cara membuat
                $translatedCaraMembuat = $translateService->translate($recipe->cara_membuat, 'en', 'id');
                
                // Translate bahan (array)
                $translatedBahan = $translateService->translateArray($recipe->bahan, 'en', 'id');

                // Simpan terjemahan
                $translation = RecipeTranslation::where('recipe_id', $recipe->id)->where('locale', 'en')->first();
                if ($translation) {
                    $translation->update([
                        'nama_resep' => $translatedName,
                        'deskripsi' => $translatedDescription,
                        'bahan' => $translatedBahan,
                        'cara_membuat' => $translatedCaraMembuat
                    ]);
                } else {
                    RecipeTranslation::create([
                        'recipe_id' => $recipe->id,
                        'locale' => 'en',
                        'nama_resep' => $translatedName,
                        'deskripsi' => $translatedDescription,
                        'bahan' => $translatedBahan,
                        'cara_membuat' => $translatedCaraMembuat
                    ]);
                }

                // Simpan data asli sebagai terjemahan Indonesia
                $translationId = RecipeTranslation::where('recipe_id', $recipe->id)->where('locale', 'id')->first();
                if ($translationId) {
                    $translationId->update([
                        'nama_resep' => $recipe->nama_resep,
                        'deskripsi' => $recipe->deskripsi,
                        'bahan' => $recipe->bahan,
                        'cara_membuat' => $recipe->cara_membuat
                    ]);
                } else {
                    RecipeTranslation::create([
                        'recipe_id' => $recipe->id,
                        'locale' => 'id',
                        'nama_resep' => $recipe->nama_resep,
                        'deskripsi' => $recipe->deskripsi,
                        'bahan' => $recipe->bahan,
                        'cara_membuat' => $recipe->cara_membuat
                    ]);
                }
                
                $this->info("✓ Translated: {$recipe->nama_resep} → {$translatedName}");
                
            } catch (\Exception $e) {
                $this->error("Error translating {$recipe->nama_resep}: " . $e->getMessage());
                $this->error("Recipe data: " . json_encode($recipe->toArray()));
            }
            
            // Small delay to avoid API rate limits
            sleep(1);
        }
        
        $this->info("All recipe translations completed!");
        return 0;
    }
}
