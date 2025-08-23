@extends('admin.layouts.app')

@section('title', 'Edit Product')
@section('page-title', 'Products')

@section('content')
<style>
    /* Import Google Fonts */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap');

    /* Add Product Form Styles */
    .add-product-form {
        max-width: 600px;
        margin: 0 auto;
        font-family: 'Poppins', sans-serif;
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

    .form-label {
        font-size: 16px;
        font-weight: 600;
        color: #2C1810;
        margin-bottom: 8px;
        display: block;
        font-family: 'Poppins', sans-serif;
    }

    .form-input {
        width: 100%;
        padding: 12px 16px;
        border: 2px solid #E0D5C7;
        border-radius: 8px;
        font-size: 16px;
        color: #2C1810;
        background-color: white;
        transition: border-color 0.3s ease;
        font-family: 'Inter', sans-serif;
    }

    .form-input:focus {
        outline: none;
        border-color: #8B4513;
        box-shadow: 0 0 0 3px rgba(139, 69, 19, 0.1);
    }

    .form-textarea {
        resize: vertical;
        min-height: 100px;
    }

    .form-actions {
        display: flex;
        gap: 15px;
        margin-top: 40px;
    }

    .btn-submit {
        flex: 1;
        background: linear-gradient(135deg, #8B4513, #A0522D);
        color: white;
        padding: 14px 24px;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: 'Poppins', sans-serif;
    }

    .btn-submit:hover {
        background: linear-gradient(135deg, #A0522D, #8B4513);
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(139, 69, 19, 0.3);
    }

    .btn-cancel {
        flex: 1;
        background: #6c757d;
        color: white;
        padding: 14px 24px;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        text-align: center;
        display: inline-block;
        font-family: 'Poppins', sans-serif;
    }

    .btn-cancel:hover {
        background: #545b62;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
    }

    .form-required {
        color: #e74c3c;
    }

    .error-message {
        color: #e74c3c;
        font-size: 14px;
        margin-top: 5px;
    }

    .success-message {
        background-color: #d4edda;
        color: #155724;
        padding: 12px;
        border-radius: 8px;
        margin-bottom: 20px;
        border: 1px solid #c3e6cb;
    }
</style>

<div class="add-product-form">
    <h2 style="color: #2C1810; margin-bottom: 30px; text-align: center;">Edit Product</h2>
    
    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Product Image Upload -->
        <div class="form-group">
            <label class="form-label">Product Image <span class="form-required">*</span></label>
            <div class="upload-area" id="uploadArea">
                @if($product->image)
                    <img src="{{ asset($product->image) }}" alt="Current Product Image" class="current-image">
                    <div style="position: absolute; top: 10px; right: 10px; background: rgba(0,0,0,0.5); color: white; padding: 5px 10px; border-radius: 5px; font-size: 12px;">
                        Click to change
                    </div>
                @else
                    <div class="upload-icon">📷</div>
                    <div class="upload-text">Click to upload product image</div>
                @endif
            </div>
            <input type="file" id="imageInput" name="image" accept="image/*" style="display: none;">
            @error('image')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Product Name -->
        <div class="form-group">
            <label for="nama_produk" class="form-label">Product Name <span class="form-required">*</span></label>
            <input type="text" id="nama_produk" name="nama_produk" class="form-input" 
                   value="{{ old('nama_produk', $product->nama_produk) }}" placeholder="Enter product name" required>
            @error('nama_produk')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Product Price -->
        <div class="form-group">
            <label for="harga" class="form-label">Price (IDR) <span class="form-required">*</span></label>
            <input type="number" id="harga" name="harga" class="form-input" 
                   value="{{ old('harga', $product->harga) }}" placeholder="Enter product price" min="0" step="0.01" required>
            @error('harga')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Product Link -->
        <div class="form-group">
            <label for="link_produk" class="form-label">Product Link</label>
            <input type="url" id="link_produk" name="link_produk" class="form-input" 
                   value="{{ old('link_produk', $product->link_produk) }}" placeholder="Enter product link (optional)">
            @error('link_produk')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Form Actions -->
        <div class="form-actions">
            <a href="{{ route('admin.products') }}" class="btn-cancel">Cancel</a>
            <button type="submit" class="btn-submit">Update Product</button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const uploadArea = document.getElementById('uploadArea');
    const imageInput = document.getElementById('imageInput');

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
