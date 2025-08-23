@extends('admin.layouts.app')

@section('title', 'Edit Blog')
@section('page-title', 'Blogs')

@section('content')
<style>
    /* Import Google Fonts */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap');

    /* Add Blog Form Styles */
    .add-blog-form {
        max-width: 800px;
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

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
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
        font-family: 'Inter', sans-serif;
    }

    .form-textarea.content {
        min-height: 200px;
        font-family: 'Inter', sans-serif;
    }

    .form-checkbox {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 15px;
    }

    .checkbox-input {
        width: 18px;
        height: 18px;
        accent-color: #8B4513;
    }

    .checkbox-label {
        font-size: 14px;
        color: #2C1810;
        cursor: pointer;
        font-family: 'Poppins', sans-serif;
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

    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr;
            gap: 15px;
        }
        
        .add-blog-form {
            max-width: 100%;
            padding: 0 15px;
        }
    }
</style>

<div class="add-blog-form">
    <h2 style="color: #2C1810; margin-bottom: 30px; text-align: center;">Edit Blog</h2>
    
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

    <form action="{{ route('admin.blogs.update', $blog) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Blog Image Upload -->
        <div class="form-group">
            <label class="form-label">Blog Image <span class="form-required">*</span></label>
            <div class="upload-area" id="uploadArea">
                @if($blog->image)
                    <img src="{{ asset($blog->image) }}" alt="Current Blog Image" class="current-image">
                    <div style="position: absolute; top: 10px; right: 10px; background: rgba(0,0,0,0.5); color: white; padding: 5px 10px; border-radius: 5px; font-size: 12px;">
                        Click to change
                    </div>
                @else
                    <div class="upload-icon">📷</div>
                    <div class="upload-text">Click to upload blog image</div>
                @endif
            </div>
            <input type="file" id="imageInput" name="image" accept="image/*" style="display: none;">
            @error('image')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Blog Title and Upload Date -->
        <div class="form-row">
            <div class="form-group">
                <label for="judul_blog" class="form-label">Blog Title <span class="form-required">*</span></label>
                <input type="text" id="judul_blog" name="judul_blog" class="form-input" 
                       value="{{ old('judul_blog', $blog->judul_blog) }}" placeholder="Enter blog title" required>
                @error('judul_blog')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="tanggal_upload" class="form-label">Upload Date <span class="form-required">*</span></label>
                <input type="date" id="tanggal_upload" name="tanggal_upload" class="form-input" 
                       value="{{ old('tanggal_upload', $blog->tanggal_upload ? $blog->tanggal_upload->format('Y-m-d') : '') }}" required>
                @error('tanggal_upload')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Author -->
        <div class="form-group">
            <label for="author" class="form-label">Author</label>
            <input type="text" id="author" name="author" class="form-input" 
                   value="{{ old('author', $blog->author) }}" placeholder="Enter author name (optional)">
            @error('author')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Excerpt -->
        <div class="form-group">
            <label for="excerpt" class="form-label">Excerpt <span class="form-required">*</span></label>
            <textarea id="excerpt" name="excerpt" class="form-input form-textarea" 
                      placeholder="Enter blog excerpt (max 500 characters)" maxlength="500" required>{{ old('excerpt', $blog->excerpt) }}</textarea>
            @error('excerpt')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Content -->
        <div class="form-group">
            <label for="content" class="form-label">Content <span class="form-required">*</span></label>
            <textarea id="content" name="content" class="form-input form-textarea content" 
                      placeholder="Enter blog content" required>{{ old('content', $blog->content) }}</textarea>
            @error('content')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Status Checkboxes -->
        <div class="form-group">
            <label class="form-label">Status</label>
            
            <div class="form-checkbox">
                <input type="checkbox" id="is_published" name="is_published" class="checkbox-input" 
                       value="1" {{ old('is_published', $blog->is_published) ? 'checked' : '' }}>
                <label for="is_published" class="checkbox-label">Published</label>
            </div>

            <div class="form-checkbox">
                <input type="checkbox" id="is_featured" name="is_featured" class="checkbox-input" 
                       value="1" {{ old('is_featured', $blog->is_featured) ? 'checked' : '' }}>
                <label for="is_featured" class="checkbox-label">Featured</label>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="form-actions">
            <a href="{{ route('admin.blogs') }}" class="btn-cancel">Cancel</a>
            <button type="submit" class="btn-submit">Update Blog</button>
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

    // Character counter for excerpt
    const excerptTextarea = document.getElementById('excerpt');
    const maxLength = 500;
    
    function updateCharacterCount() {
        const currentLength = excerptTextarea.value.length;
        const remaining = maxLength - currentLength;
        
        // Create or update character counter
        let counter = document.getElementById('excerpt-counter');
        if (!counter) {
            counter = document.createElement('div');
            counter.id = 'excerpt-counter';
            counter.style.cssText = 'font-size: 12px; color: #666; text-align: right; margin-top: 5px;';
            excerptTextarea.parentNode.appendChild(counter);
        }
        
        counter.textContent = `${currentLength}/${maxLength} characters`;
        counter.style.color = remaining < 50 ? '#e74c3c' : '#666';
    }
    
    excerptTextarea.addEventListener('input', updateCharacterCount);
    updateCharacterCount(); // Initial count
});
</script>
@endsection
