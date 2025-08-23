@extends('admin.layouts.app')

@section('title', 'Edit Recipe')
@section('page-title', 'Recipes')

@section('content')
<style>
    /* Add Recipe Form Styles */
    .add-recipe-form {
        max-width: 600px;
        margin: 0 auto;
    }

    .upload-area {
        width: 100%;
        height: 180px;
        border: 2px dashed #C4B5A0;
        border-radius: 12px;
        background-color: #F5F0E8;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-bottom: 30px;
        position: relative;
    }

    .upload-area:hover {
        border-color: #8B4513;
        background-color: #F0EBE3;
    }

    .upload-area.dragover {
        border-color: #8B4513;
        background-color: #EAE5DD;
    }

    .upload-text {
        font-size: 16px;
        color: #666;
        font-weight: 500;
        margin-top: 10px;
    }

    .upload-icon {
        font-size: 32px;
        color: #999;
        margin-bottom: 8px;
    }

    .current-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-input, .form-select, .form-textarea {
        width: 100%;
        padding: 15px 20px;
        border: 2px solid #E8DDD4;
        border-radius: 12px;
        font-size: 16px;
        font-family: 'Inter', sans-serif;
        background-color: #FEFCFA;
        transition: border-color 0.3s ease;
    }

    .form-input:focus, .form-select:focus, .form-textarea:focus {
        outline: none;
        border-color: #D4A574;
        background-color: #FFF;
    }

    .form-textarea {
        resize: vertical;
        min-height: 120px;
    }

    .submit-container {
        display: flex;
        gap: 15px;
        justify-content: center;
        margin-top: 40px;
    }

    .btn-submit {
        background: linear-gradient(135deg, #D4A574 0%, #C19A5F 100%);
        color: white;
        border: none;
        padding: 15px 40px;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: 'Inter', sans-serif;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(212, 165, 116, 0.3);
    }

    .btn-cancel {
        background: #E8DDD4;
        color: #8B4513;
        border: none;
        padding: 15px 40px;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: 'Inter', sans-serif;
        text-decoration: none;
        display: inline-block;
        text-align: center;
    }

    .btn-cancel:hover {
        background: #DDD0C4;
        transform: translateY(-2px);
    }

    .page-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .page-title {
        color: #8B4513;
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 10px;
        font-family: 'Inter', sans-serif;
    }

    .page-subtitle {
        color: #666;
        font-size: 1.1rem;
        font-family: 'Inter', sans-serif;
    }

    .error-message {
        color: #dc3545;
        font-size: 14px;
        margin-top: 5px;
        font-family: 'Inter', sans-serif;
    }
</style>

<div class="page-header">
    <h1 class="page-title">Edit Recipe</h1>
    <p class="page-subtitle">Update recipe information</p>
</div>

<div class="add-recipe-form">
    <form action="{{ route('admin.recipes.update', $recipe) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <!-- Image Upload -->
        <div class="form-group">
            <div class="upload-area" id="upload-area">
                @if($recipe->image && file_exists(public_path($recipe->image)))
                    <img src="{{ asset($recipe->image) }}" alt="Current Image" class="current-image" id="current-image">
                    <div style="position: absolute; top: 10px; right: 10px; background: rgba(0,0,0,0.5); color: white; padding: 5px 10px; border-radius: 5px; font-size: 12px;">
                        Click to change
                    </div>
                @else
                    <div class="upload-icon">📷</div>
                    <div class="upload-text">Click to upload image or drag and drop</div>
                    <div style="font-size: 12px; color: #999; margin-top: 5px;">PNG, JPG up to 2MB</div>
                @endif
            </div>
            <input type="file" name="image" id="image-input" accept="image/*" style="display: none;">
            @error('image')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Nama Resep -->
        <div class="form-group">
            <input type="text" name="nama_resep" class="form-input" placeholder="Nama Resep" value="{{ old('nama_resep', $recipe->nama_resep) }}" required>
            @error('nama_resep')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Jenis -->
        <div class="form-group">
            <select name="jenis" class="form-select" required>
                <option value="">Pilih Jenis</option>
                <option value="drink" {{ old('jenis', $recipe->jenis) == 'drink' ? 'selected' : '' }}>Drinks</option>
                <option value="dessert" {{ old('jenis', $recipe->jenis) == 'dessert' ? 'selected' : '' }}>Dessert</option>
            </select>
            @error('jenis')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Deskripsi -->
        <div class="form-group">
            <textarea name="deskripsi" class="form-textarea" placeholder="Deskripsi resep (akan muncul di card user)" required style="min-height: 80px;">{{ old('deskripsi', $recipe->deskripsi) }}</textarea>
            @error('deskripsi')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Bahan-bahan -->
        <div class="form-group">
            <textarea name="bahan" class="form-textarea" placeholder="Bahan-bahan (pisahkan dengan enter)" required>{{ old('bahan', is_array($recipe->bahan) ? implode("\n", $recipe->bahan) : $recipe->bahan) }}</textarea>
            @error('bahan')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Cara Membuat -->
        <div class="form-group">
            <textarea name="cara_membuat" class="form-textarea" placeholder="Cara Membuat (pisahkan langkah dengan enter)" required>{{ old('cara_membuat', $recipe->cara_membuat) }}</textarea>
            @error('cara_membuat')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="submit-container">
            <a href="{{ route('admin.recipes') }}" class="btn-cancel">Cancel</a>
            <button type="submit" class="btn-submit">Update Recipe</button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const uploadArea = document.getElementById('upload-area');
    const imageInput = document.getElementById('image-input');
    const currentImage = document.getElementById('current-image');

    // Click to upload
    uploadArea.addEventListener('click', function() {
        imageInput.click();
    });

    // Handle file selection
    imageInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            displayPreview(file);
        }
    });

    // Drag and drop functionality
    uploadArea.addEventListener('dragover', function(e) {
        e.preventDefault();
        uploadArea.classList.add('dragover');
    });

    uploadArea.addEventListener('dragleave', function(e) {
        e.preventDefault();
        uploadArea.classList.remove('dragover');
    });

    uploadArea.addEventListener('drop', function(e) {
        e.preventDefault();
        uploadArea.classList.remove('dragover');
        
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            const file = files[0];
            if (file.type.startsWith('image/')) {
                // Create a new FileList-like object
                const dt = new DataTransfer();
                dt.items.add(file);
                imageInput.files = dt.files;
                
                displayPreview(file);
            }
        }
    });

    function displayPreview(file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            uploadArea.innerHTML = `
                <img src="${e.target.result}" alt="Preview" class="current-image">
                <div style="position: absolute; top: 10px; right: 10px; background: rgba(0,0,0,0.5); color: white; padding: 5px 10px; border-radius: 5px; font-size: 12px;">
                    Click to change
                </div>
            `;
        };
        reader.readAsDataURL(file);
    }
});
</script>
@endsection
