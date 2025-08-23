<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use App\Models\ProductTranslation;
use App\Services\GoogleTranslateService;

class UpdateProductTranslations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'translate:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update English translations for all existing products';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $translateService = new GoogleTranslateService();
        $products = Product::all();
        
        $this->info('Updating translations for ' . $products->count() . ' products...');
        
        foreach ($products as $product) {
            $this->info("Processing product: {$product->nama_produk}");
            
            // Translate nama produk
            $translatedName = $translateService->translate($product->nama_produk, 'en', 'id');
            
            // Translate deskripsi jika ada
            $translatedDescription = '';
            if ($product->deskripsi) {
                $translatedDescription = $translateService->translate($product->deskripsi, 'en', 'id');
            }

            // Simpan terjemahan English
            ProductTranslation::updateOrCreate(
                [
                    'product_id' => $product->id,
                    'locale' => 'en'
                ],
                [
                    'nama_produk' => $translatedName,
                    'deskripsi' => $translatedDescription
                ]
            );

            // Simpan data asli sebagai terjemahan Indonesia
            ProductTranslation::updateOrCreate(
                [
                    'product_id' => $product->id,
                    'locale' => 'id'
                ],
                [
                    'nama_produk' => $product->nama_produk,
                    'deskripsi' => $product->deskripsi ?? ''
                ]
            );
            
            $this->info("✓ Translated: {$product->nama_produk} → {$translatedName}");
        }
        
        $this->info('All product translations updated successfully!');
    }
}
