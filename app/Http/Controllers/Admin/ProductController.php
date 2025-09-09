<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductTranslation;
use App\Services\GoogleTranslateService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display admin products page
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.products', compact('products'));
    }

    /**
     * Show the form for creating a new product
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created product
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'link_produk' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Create directory if not exists
            $storageDir = storage_path('app/public/images/products');
            if (!file_exists($storageDir)) {
                mkdir($storageDir, 0755, true);
            }
            
            // Generate filename
            $image = $request->file('image');
            $imageName = 'product_' . time() . '.' . $image->getClientOriginalExtension();
            
            // Move file to storage with exact name
            $image->move($storageDir, $imageName);
            $validated['image'] = 'images/products/' . $imageName;
        }

        $product = Product::create($validated);

        // Auto translate ke bahasa Inggris
        $this->createTranslation($product);

        return redirect()->route('admin.products')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Create English translation for product
     */
    private function createTranslation(Product $product)
    {
        $translateService = new GoogleTranslateService();
        
        // Translate nama produk
        $translatedName = $translateService->translate($product->nama_produk, 'en', 'id');
        
        // Translate deskripsi jika ada
        $translatedDescription = '';
        if ($product->deskripsi) {
            $translatedDescription = $translateService->translate($product->deskripsi, 'en', 'id');
        }

        // Simpan terjemahan
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
    }

    /**
     * Show the form for editing the specified product
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified product
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'link_produk' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image from storage
            if ($product->image) {
                $oldImagePath = storage_path('app/public/' . $product->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            
            // Create directory if not exists
            $storageDir = storage_path('app/public/images/products');
            if (!file_exists($storageDir)) {
                mkdir($storageDir, 0755, true);
            }
            
            // Generate filename
            $image = $request->file('image');
            $imageName = 'product_' . time() . '.' . $image->getClientOriginalExtension();
            
            // Move file to storage with exact name
            $image->move($storageDir, $imageName);
            $validated['image'] = 'images/products/' . $imageName;
        }

        $product->update($validated);

        // Update translations
        $this->createTranslation($product);

        return redirect()->route('admin.products')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Remove the specified product
     */
    public function destroy(Product $product)
    {
        // Delete image file from storage
        if ($product->image) {
            $imagePath = storage_path('app/public/' . $product->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $product->delete();

        return redirect()->route('admin.products')
            ->with('success', 'Produk berhasil dihapus!');
    }

    /**
     * Toggle product active status
     */
    public function toggleStatus(Product $product)
    {
        $product->update(['is_active' => !$product->is_active]);

        $status = $product->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return response()->json([
            'success' => true,
            'message' => "Produk berhasil {$status}!"
        ]);
    }
}
