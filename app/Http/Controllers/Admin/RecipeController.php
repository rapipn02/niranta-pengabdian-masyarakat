<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use App\Services\GoogleTranslateService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class RecipeController extends Controller
{
    /**
     * Display admin recipes page
     */
    public function index()
    {
        $recipes = Recipe::latest()->paginate(10);
        return view('admin.recipes', compact('recipes'));
    }

    /**
     * Show the form for creating a new recipe
     */
    public function create()
    {
        $jenisOptions = Recipe::getJenisOptions();
        return view('admin.recipes.create', compact('jenisOptions'));
    }

    /**
     * Store a newly created recipe
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_resep' => 'required|string|max:255',
            'jenis' => 'required|in:drink,dessert',
            'deskripsi' => 'required|string',
            'bahan' => 'required|string',
            'cara_membuat' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Convert textarea to array (split by new lines)
        $bahanArray = array_filter(array_map('trim', explode("\n", $validated['bahan'])));
        $validated['bahan'] = $bahanArray;

        if ($request->hasFile('image')) {
            // Store directly in public folder
            $image = $request->file('image');
            $imageName = 'recipe_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/recipes'), $imageName);
            $validated['image'] = 'images/recipes/' . $imageName;
        }

        Recipe::create($validated);

        $recipe = Recipe::latest()->first();

        // Auto translate ke bahasa Inggris
        $this->createTranslation($recipe);

        return redirect()->route('admin.recipes')
            ->with('success', 'Resep berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified recipe
     */
    public function edit(Recipe $recipe)
    {
        $jenisOptions = Recipe::getJenisOptions();
        return view('admin.recipes.edit', compact('recipe', 'jenisOptions'));
    }

    /**
     * Update the specified recipe
     */
    public function update(Request $request, Recipe $recipe)
    {
        $validated = $request->validate([
            'nama_resep' => 'required|string|max:255',
            'jenis' => 'required|in:drink,dessert',
            'deskripsi' => 'required|string',
            'bahan' => 'required|string',
            'cara_membuat' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Convert textarea to array (split by new lines)
        $bahanArray = array_filter(array_map('trim', explode("\n", $validated['bahan'])));
        $validated['bahan'] = $bahanArray;

        if ($request->hasFile('image')) {
            // Delete old image from public folder
            if ($recipe->image && file_exists(public_path($recipe->image))) {
                unlink(public_path($recipe->image));
            }
            
            // Store new image directly in public folder
            $image = $request->file('image');
            $imageName = 'recipe_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/recipes'), $imageName);
            $validated['image'] = 'images/recipes/' . $imageName;
        }

        $recipe->update($validated);

        // Update translations
        $this->createTranslation($recipe);

        return redirect()->route('admin.recipes')
            ->with('success', 'Resep berhasil diperbarui!');
    }

    /**
     * Create English translation for recipe
     */
    private function createTranslation(Recipe $recipe)
    {
        $translateService = new GoogleTranslateService();
        
        // Translate nama resep
        $translatedName = $translateService->translate($recipe->nama_resep, 'en', 'id');
        
        // Translate deskripsi
        $translatedDescription = $translateService->translate($recipe->deskripsi, 'en', 'id');
        
        // Translate cara membuat (convert string to array first)
        $caraMembuatArray = array_filter(array_map('trim', explode("\n", $recipe->cara_membuat)));
        $translatedCaraMembuat = $translateService->translateArray($caraMembuatArray, 'en', 'id');
        
        // Translate bahan (array)
        $translatedBahan = $translateService->translateArray($recipe->bahan, 'en', 'id');

        // Use DB query instead of model for now
        DB::table('recipe_translations')->updateOrInsert(
            [
                'recipe_id' => $recipe->id,
                'locale' => 'en'
            ],
            [
                'nama_resep' => $translatedName,
                'deskripsi' => $translatedDescription,
                'bahan' => json_encode($translatedBahan),
                'cara_membuat' => json_encode($translatedCaraMembuat),
                'updated_at' => now(),
                'created_at' => now()
            ]
        );

        // Simpan data asli sebagai terjemahan Indonesia
        $originalCaraMembuatArray = array_filter(array_map('trim', explode("\n", $recipe->cara_membuat)));
        DB::table('recipe_translations')->updateOrInsert(
            [
                'recipe_id' => $recipe->id,
                'locale' => 'id'
            ],
            [
                'nama_resep' => $recipe->nama_resep,
                'deskripsi' => $recipe->deskripsi,
                'bahan' => json_encode($recipe->bahan),
                'cara_membuat' => json_encode($originalCaraMembuatArray),
                'updated_at' => now(),
                'created_at' => now()
            ]
        );
    }

    /**
     * Remove the specified recipe
     */
    public function destroy(Recipe $recipe)
    {
        // Delete image file from public folder
        if ($recipe->image && file_exists(public_path($recipe->image))) {
            unlink(public_path($recipe->image));
        }

        $recipe->delete();

        return redirect()->route('admin.recipes')
            ->with('success', 'Resep berhasil dihapus!');
    }

    /**
     * Toggle recipe active status
     */
    public function toggleStatus(Recipe $recipe)
    {
        $recipe->update(['is_active' => !$recipe->is_active]);

        $status = $recipe->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return response()->json([
            'success' => true,
            'message' => "Resep berhasil {$status}!"
        ]);
    }
}
