@extends('admin.layouts.app')

@section('title', 'Add Blog')
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

    .upload-input {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }

    .preview-image {
        max-width: 100%;
        max-height: 100%;
        border-radius: 8px;
        object-fit: cover;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-input {
        width: 100%;
        padding: 18px 24px;
        border: 2px solid #D4C4B0;
        border-radius: 12px;
        background-color: rgba(226, 208, 186, 0.30);
        font-size: 16px;
        color: #2C1810;
        outline: none;
        transition: all 0.3s ease;
        font-family: 'Arial', sans-serif;
    }

    .form-input:focus {
        border-color: #8B4513;
        background-color: rgba(226, 208, 186, 0.50);
        box-shadow: 0 0 10px rgba(139, 69, 19, 0.1);
    }

    .form-input::placeholder {
        color: #8B7355;
        opacity: 0.8;
    }

    .form-textarea {
        width: 100%;
        padding: 18px 24px;
        border: 2px solid #D4C4B0;
        border-radius: 12px;
        background-color: rgba(226, 208, 186, 0.30);
        font-size: 16px;
        color: #2C1810;
        outline: none;
        transition: all 0.3s ease;
        font-family: 'Arial', sans-serif;
        min-height: 120px;
        resize: vertical;
    }

    .form-textarea:focus {
        border-color: #8B4513;
        background-color: rgba(226, 208, 186, 0.50);
        box-shadow: 0 0 10px rgba(139, 69, 19, 0.1);
    }

    .form-textarea::placeholder {
        color: #8B7355;
        opacity: 0.8;
    }

    .form-textarea.content {
        min-height: 200px;
    }

    .submit-container {
        display: flex;
        justify-content: flex-end;
        margin-top: 40px;
    }

    .btn-submit {
        background-color: #8B4513;
        color: white;
        padding: 15px 40px;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-transform: none;
        letter-spacing: 0.5px;
    }

    .btn-submit:hover {
        background-color: #A0522D;
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(139, 69, 19, 0.3);
    }

    .btn-submit:active {
        transform: translateY(0);
    }

    /* Remove file info */
    .file-info {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: rgba(0, 0, 0, 0.7);
        color: white;
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 12px;
        z-index: 10;
    }

    .remove-file {
        position: absolute;
        top: 10px;
        left: 10px;
        background-color: #dc3545;
        color: white;
        border: none;
        border-radius: 50%;
        width: 25px;
        height: 25px;
        font-size: 12px;
        cursor: pointer;
        z-index: 10;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Date input styling */
    .form-input[type="date"] {
        cursor: pointer;
    }

    .form-input[type="date"]::-webkit-calendar-picker-indicator {
        background-color: #8B4513;
        border-radius: 3px;
        cursor: pointer;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .add-blog-form {
            max-width: 100%;
        }

        .upload-area {
            height: 150px;
        }

        .form-input, .form-textarea {
            padding: 15px 20px;
        }

        .btn-submit {
            width: 100%;
            justify-content: center;
        }

        .submit-container {
            justify-content: stretch;
        }
    }
</style>

<div class="add-blog-form">
    <!-- Success Message -->
    @if(session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 20px; border-radius: 8px; border: 1px solid #c3e6cb;">
            {{ session('success') }}
        </div>
    @endif

    <!-- Error Messages -->
    @if($errors->any())
        <div style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 20px; border-radius: 8px; border: 1px solid #f5c6cb;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data">
        @csrf
        
        <!-- Upload Photo Area -->
        <div class="upload-area" id="uploadArea">
            <input type="file" name="image" id="blogImage" class="upload-input" accept="image/*">
            <div class="upload-icon">📷</div>
            <div class="upload-text">Upload Foto</div>
        </div>

        <!-- Judul Blog -->
        <div class="form-group">
            <input type="text" name="judul_blog" class="form-input" placeholder="Judul Blog" required>
        </div>

        <!-- Tanggal Upload -->
        <div class="form-group">
            <input type="date" name="tanggal_upload" class="form-input" value="{{ date('Y-m-d') }}" required>
        </div>

        <!-- Excerpt/Ringkasan -->
        <div class="form-group">
            <textarea name="excerpt" class="form-textarea" placeholder="Ringkasan blog (preview untuk card)" required></textarea>
        </div>

        <!-- Konten Blog -->
        <div class="form-group">
            <textarea name="content" class="form-textarea content" placeholder="Konten lengkap blog..." required></textarea>
        </div>

        <!-- Status Checkboxes -->
        <div class="form-group" style="margin-bottom: 30px;">
            <label style="font-size: 16px; font-weight: 600; color: #2C1810; margin-bottom: 15px; display: block;">Status</label>
            
            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 15px;">
                <input type="checkbox" id="is_published" name="is_published" value="1" checked 
                       style="width: 18px; height: 18px; accent-color: #8B4513;">
                <label for="is_published" style="font-size: 14px; color: #2C1810; cursor: pointer;">Published (Dipublikasikan)</label>
            </div>

            <div style="display: flex; align-items: center; gap: 10px;">
                <input type="checkbox" id="is_featured" name="is_featured" value="1" 
                       style="width: 18px; height: 18px; accent-color: #8B4513;">
                <label for="is_featured" style="font-size: 14px; color: #2C1810; cursor: pointer;">Featured (Unggulan)</label>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="submit-container">
            <button type="submit" class="btn-submit">Submit</button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const uploadArea = document.getElementById('uploadArea');
    let uploadInput = document.getElementById('blogImage');

    // Handle file selection
    function handleFileSelection(e) {
        const file = e.target.files[0];
        if (file) {
            displayImage(file);
        }
    }

    uploadInput.addEventListener('change', handleFileSelection);

    // Handle drag and drop
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
                // Update the input files properly
                const dt = new DataTransfer();
                dt.items.add(file);
                uploadInput.files = dt.files;
                displayImage(file);
            }
        }
    });

    function displayImage(file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            // Store current input reference before changing innerHTML
            const currentFiles = uploadInput.files;
            
            uploadArea.innerHTML = `
                <button type="button" class="remove-file" onclick="removeImage()">×</button>
                <div class="file-info">${file.name}</div>
                <img src="${e.target.result}" alt="Preview" class="preview-image">
                <input type="file" name="image" id="blogImage" class="upload-input" accept="image/*" style="opacity: 0;">
            `;
            
            // Get new input and restore files
            uploadInput = document.getElementById('blogImage');
            uploadInput.files = currentFiles;
            uploadInput.addEventListener('change', handleFileSelection);
        };
        reader.readAsDataURL(file);
    }

    // Remove image function
    window.removeImage = function() {
        uploadArea.innerHTML = `
            <input type="file" name="image" id="blogImage" class="upload-input" accept="image/*">
            <div class="upload-icon">📷</div>
            <div class="upload-text">Upload Foto</div>
        `;
        
        // Re-attach event listeners
        uploadInput = document.getElementById('blogImage');
        uploadInput.addEventListener('change', handleFileSelection);
    };

    // Auto-format date to Indonesian format for display
    const dateInput = document.querySelector('input[name="tanggal_upload"]');
    if (dateInput) {
        dateInput.addEventListener('change', function(e) {
            const date = new Date(e.target.value);
            const options = { 
                day: 'numeric', 
                month: 'long', 
                year: 'numeric' 
            };
            console.log('Formatted date:', date.toLocaleDateString('id-ID', options));
        });
    }
});
</script>
@endsection
