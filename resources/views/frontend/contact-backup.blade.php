@extends('frontend.layouts.app')

@section('content')
<!-- Hero Section with Background Image -->
<div style="
    background-image: url('{{ asset('latarresep.png') }}');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
    width: 100%;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
">
    <!-- Overlay for better text readability -->
    <div style="
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.4);
    "></div>
    
    <!-- Content -->
    <div style="
        position: relative;
        z-index: 10;
        text-align: center;
    ">
        <h1 style="
            color: white;
            font-size: clamp(4rem, 10vw, 8rem);
            font-weight: bold;
            font-family: 'Inter', sans-serif;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            margin: 0;
            letter-spacing: 0.02em;
        ">Contact Us</h1>
    </div>
</div>

<!-- Include Scroll Indicator -->
@include('frontend.partials.scroll-indicator')

<!-- Contact Content Section -->
<section style="
    background-color: #F2ECE0;
    padding: 80px 0;
    min-height: 60vh;
" class="content-section" data-content>
    <div style="
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 40px;
    ">
        <!-- Section Title -->
        <div style="
            text-align: center;
            margin-bottom: 60px;
        ">
            <h2 style="
                color: #482500;
                font-family: 'Inter', sans-serif;
                font-size: 2.2rem;
                font-weight: 700;
                margin-bottom: 20px;
                letter-spacing: -0.02em;
            ">Butuh Bantuan?</h2>
            
            <p style="
                color: #666;
                font-family: 'Inter', sans-serif;
                font-size: 1rem;
                line-height: 1.6;
                max-width: 600px;
                margin: 0 auto;
                text-align: center;
            ">Dengan senang hati tim kami akan membantu menyelesaikan kendala anda,<br>hubungi kami melalui informasi kontak dibawah ini!</p>
        </div>

        <!-- Contact Cards Grid -->
        <div style="
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
            margin-bottom: 80px;
        " class="contact-grid">
            <!-- Visit Us Card -->
            <div style="
                background: white;
                border-radius: 16px;
                padding: 40px 30px;
                text-align: center;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                border: 1px solid rgba(72, 37, 0, 0.1);
            " class="contact-card" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 30px rgba(0, 0, 0, 0.12)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 20px rgba(0, 0, 0, 0.08)'">
                <!-- Icon -->
                <div style="
                    width: 80px;
                    height: 80px;
                    margin: 0 auto 25px auto;
                    background-image: url('{{ asset('iconhome.png') }}');
                    background-size: contain;
                    background-repeat: no-repeat;
                    background-position: center;
                "></div>
                
                <!-- Title -->
                <h3 style="
                    color: #482500;
                    font-family: 'Inter', sans-serif;
                    font-size: 1.3rem;
                    font-weight: 600;
                    margin-bottom: 15px;
                ">Visit Us</h3>
                
                <!-- Content -->
                <p style="
                    color: #666;
                    font-family: 'Inter', sans-serif;
                    font-size: 0.9rem;
                    line-height: 1.5;
                    margin: 0;
                ">Jl. Terandam III no.35, Koto Padang,<br>Sumatera Barat, Indonesia 25121</p>
            </div>

            <!-- Email Us Card -->
            <div style="
                background: white;
                border-radius: 16px;
                padding: 40px 30px;
                text-align: center;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                border: 1px solid rgba(72, 37, 0, 0.1);
            " class="contact-card" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 30px rgba(0, 0, 0, 0.12)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 20px rgba(0, 0, 0, 0.08)'">
                <!-- Icon -->
                <div style="
                    width: 80px;
                    height: 80px;
                    margin: 0 auto 25px auto;
                    background-image: url('{{ asset('iconemail.png') }}');
                    background-size: contain;
                    background-repeat: no-repeat;
                    background-position: center;
                "></div>
                
                <!-- Title -->
                <h3 style="
                    color: #482500;
                    font-family: 'Inter', sans-serif;
                    font-size: 1.3rem;
                    font-weight: 600;
                    margin-bottom: 15px;
                ">Email Us</h3>
                
                <!-- Content -->
                <p style="
                    color: #666;
                    font-family: 'Inter', sans-serif;
                    font-size: 0.9rem;
                    line-height: 1.5;
                    margin: 0;
                ">Hubungi kami melalui email<br><a href="mailto:niranta.gp@gmail.com" style="color: #482500; text-decoration: none; font-weight: 500;">niranta.gp@gmail.com</a></p>
            </div>

            <!-- Call Us Card -->
            <div style="
                background: white;
                border-radius: 16px;
                padding: 40px 30px;
                text-align: center;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                border: 1px solid rgba(72, 37, 0, 0.1);
            " class="contact-card" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 30px rgba(0, 0, 0, 0.12)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 20px rgba(0, 0, 0, 0.08)'">
                <!-- Icon -->
                <div style="
                    width: 80px;
                    height: 80px;
                    margin: 0 auto 25px auto;
                    background-image: url('{{ asset('icontelpon.png') }}');
                    background-size: contain;
                    background-repeat: no-repeat;
                    background-position: center;
                "></div>
                
                <!-- Title -->
                <h3 style="
                    color: #482500;
                    font-family: 'Inter', sans-serif;
                    font-size: 1.3rem;
                    font-weight: 600;
                    margin-bottom: 15px;
                ">Call Us</h3>
                
                <!-- Content -->
                <p style="
                    color: #666;
                    font-family: 'Inter', sans-serif;
                    font-size: 0.9rem;
                    line-height: 1.5;
                    margin: 0;
                ">Hubungi kami melalui kontak<br><a href="tel:+628126788106" style="color: #482500; text-decoration: none; font-weight: 500;">+62 812 6788 106</a></p>
            </div>
        </div>

        <!-- Google Maps Section -->
        <div style="
            background: white;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(72, 37, 0, 0.1);
        ">
            <!-- Google Maps Embed -->
            <div style="
                width: 100%;
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            ">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3989.2718270738665!2d100.3630092!3d-0.9483277!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b90c01406991%3A0xc0ba0ebd4f3936ae!2sNiranta%20Gula%20Aren%20Asli!5e0!3m2!1sid!2sid!4v1753177383319!5m2!1sid!2sid"
                    width="100%"
                    height="450"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            <!-- Optional: Link ke Google Maps -->
            <div style="
                margin-top: 25px;
                text-align: center;
            ">
                <a href="https://www.google.com/maps/place/Niranta+Gula+Aren+Asli/@-0.9483277,100.3630092,17z"
                   target="_blank"
                   style="
                       display: inline-block;
                       padding: 12px 24px;
                       background-color: #482500;
                       color: white;
                       border-radius: 8px;
                       text-decoration: none;
                       font-family: 'Inter', sans-serif;
                       font-size: 0.9rem;
                       font-weight: 500;
                       box-shadow: 0 4px 12px rgba(72, 37, 0, 0.3);
                       transition: all 0.3s ease;
                   "
                   onmouseover="this.style.backgroundColor='#5d2f00'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 16px rgba(72, 37, 0, 0.4)'"
                   onmouseout="this.style.backgroundColor='#482500'; this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(72, 37, 0, 0.3)'">
                    Buka di Google Maps
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('head')
<meta name="description" content="Hubungi Niranta - Informasi kontak, alamat, email, dan nomor telepon untuk bantuan dan pertanyaan seputar gula aren">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    /* Custom styles for responsive design */
    @media (max-width: 1024px) {
        /* 2 columns on tablet */
        .contact-grid {
            grid-template-columns: repeat(2, 1fr) !important;
            gap: 30px !important;
        }
        
        /* Make the first card span 2 columns */
        .contact-grid .contact-card:first-child {
            grid-column: span 2 !important;
            max-width: 400px !important;
            margin: 0 auto !important;
        }
    }
    
    @media (max-width: 768px) {
        /* Single column on mobile */
        .contact-grid {
            grid-template-columns: 1fr !important;
            gap: 25px !important;
        }
        
        .contact-grid .contact-card:first-child {
            grid-column: span 1 !important;
            max-width: none !important;
        }
        
        .contact-card {
            padding: 30px 20px !important;
        }
        
        .contact-card div:first-child {
            width: 60px !important;
            height: 60px !important;
            margin-bottom: 20px !important;
        }
        
        .contact-card h3 {
            font-size: 1.1rem !important;
            margin-bottom: 12px !important;
        }
        
        .contact-card p {
            font-size: 0.85rem !important;
        }
        
        .content-section {
            padding: 40px 0 !important;
        }
        
        .content-section > div {
            padding: 0 20px !important;
        }
        
        .content-section h2 {
            font-size: 1.8rem !important;
        }
        
        .content-section p {
            font-size: 0.9rem !important;
        }
    }
    
    @media (max-width: 480px) {
        .contact-card {
            padding: 25px 15px !important;
        }
        
        .contact-card div:first-child {
            width: 50px !important;
            height: 50px !important;
            margin-bottom: 15px !important;
        }
        
        .contact-card h3 {
            font-size: 1rem !important;
        }
        
        .contact-card p {
            font-size: 0.8rem !important;
        }
        
        .content-section {
            padding: 30px 0 !important;
        }
        
        .content-section > div {
            padding: 0 15px !important;
        }
        
        .content-section h2 {
            font-size: 1.6rem !important;
            margin-bottom: 15px !important;
        }
        
        .content-section p {
            font-size: 0.85rem !important;
        }
        
        .contact-grid {
            margin-bottom: 50px !important;
        }
    }
    
    /* Ensure contact cards have equal height */
    .contact-grid {
        align-items: stretch;
    }
    
    .contact-card {
        height: 100%;
    }
</style>
@endpush
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('frontend.your_name') }} *
                        </label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               value="{{ old('name') }}"
                               required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-500 @enderror">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('frontend.your_email') }} *
                        </label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               value="{{ old('email') }}"
                               required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('email') border-red-500 @enderror">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('frontend.subject') }} *
                        </label>
                        <input type="text" 
                               id="subject" 
                               name="subject" 
                               value="{{ old('subject') }}"
                               required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('subject') border-red-500 @enderror">
                        @error('subject')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                            {{ __('frontend.message') }} *
                        </label>
                        <textarea id="message" 
                                  name="message" 
                                  rows="6"
                                  required
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <button type="submit" 
                            class="w-full bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors duration-300 flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>
                        {{ __('frontend.send_message') }}
                    </button>
                </form>
            </div>
            
            <!-- Contact Information -->
            <div class="space-y-8">
                <div class="bg-white rounded-lg shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">
                        {{ __('frontend.contact_info') }}
                    </h2>
                    
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="bg-blue-100 p-3 rounded-lg">
                                    <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-900">{{ __('frontend.address') }}</h3>
                                <p class="text-gray-600 mt-1">
                                    {{ app()->getLocale() == 'id' ? 
                                        'Jl. Contoh No. 123, Jakarta Pusat, DKI Jakarta 10110, Indonesia' :
                                        '123 Example Street, Central Jakarta, DKI Jakarta 10110, Indonesia'
                                    }}
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="bg-green-100 p-3 rounded-lg">
                                    <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-900">{{ __('frontend.phone') }}</h3>
                                <p class="text-gray-600 mt-1">+62 123 456 789</p>
                                <p class="text-gray-600">+62 987 654 321</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="bg-purple-100 p-3 rounded-lg">
                                    <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-900">{{ __('frontend.email') }}</h3>
                                <p class="text-gray-600 mt-1">info@example.com</p>
                                <p class="text-gray-600">support@example.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Business Hours -->
                <div class="bg-white rounded-lg shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">
                        {{ app()->getLocale() == 'id' ? 'Jam Operasional' : 'Business Hours' }}
                    </h2>
                    
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-gray-600">{{ app()->getLocale() == 'id' ? 'Senin - Jumat' : 'Monday - Friday' }}</span>
                            <span class="text-gray-900 font-medium">09:00 - 18:00</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">{{ app()->getLocale() == 'id' ? 'Sabtu' : 'Saturday' }}</span>
                            <span class="text-gray-900 font-medium">09:00 - 15:00</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">{{ app()->getLocale() == 'id' ? 'Minggu' : 'Sunday' }}</span>
                            <span class="text-red-600 font-medium">{{ app()->getLocale() == 'id' ? 'Tutup' : 'Closed' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section (Optional) -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">
                {{ app()->getLocale() == 'id' ? 'Lokasi Kami' : 'Our Location' }}
            </h2>
            <p class="text-lg text-gray-600">
                {{ app()->getLocale() == 'id' ? 
                    'Kunjungi kantor kami untuk konsultasi langsung.' :
                    'Visit our office for direct consultation.'
                }}
            </p>
        </div>
        
        <!-- Placeholder for Google Maps -->
        <div class="bg-gray-200 rounded-lg h-96 flex items-center justify-center">
            <div class="text-center">
                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <p class="text-gray-500">
                    {{ app()->getLocale() == 'id' ? 'Peta akan ditampilkan di sini' : 'Map will be displayed here' }}
                </p>
            </div>
        </div>
    </div>
</section>
@endsection

@push('head')
<meta name="description" content="{{ app()->getLocale() == 'id' ? 'Hubungi kami untuk pertanyaan atau konsultasi' : 'Contact us for questions or consultation' }}">
@endpush
