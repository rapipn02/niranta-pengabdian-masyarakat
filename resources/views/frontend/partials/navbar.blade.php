<!-- Navbar Niranta Style -->
<nav id="navbar" class="fixed top-0 left-0 right-0 z-50 w-full transition-all duration-300" style="background: #482500; backdrop-filter: blur(2px); -webkit-backdrop-filter: blur(2px); height: 60px; flex-shrink: 0; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
    <div class="w-full h-full flex justify-between items-center px-8 lg:px-16">
        <!-- Logo -->
        <div class="flex-shrink-0">
            <a href="{{ route('home') }}" class="flex items-center">
                <img src="{{ asset('logoputih.png') }}" alt="Niranta Logo" class="h-16 w-auto" style="height: 64px;">
            </a>
        </div>

        <!-- Desktop Navigation - Very compact spacing like in image -->
        <div class="flex items-center space-x-8" id="desktop-menu">
            <a href="{{ route('home') }}" class="text-white hover:text-amber-300 text-xs font-medium tracking-wide uppercase transition-colors duration-200 drop-shadow-lg" style="font-family: 'Poppins', sans-serif;">{{ __('messages.nav.home') }}</a>
            
            <a href="{{ route('product') }}" class="text-white hover:text-amber-300 text-xs font-medium tracking-wide uppercase transition-colors duration-200 drop-shadow-lg" style="font-family: 'Poppins', sans-serif;">{{ __('messages.nav.product') }}</a>
            <a href="{{ route('resep') }}" class="text-white hover:text-amber-300 text-xs font-medium tracking-wide uppercase transition-colors duration-200 drop-shadow-lg" style="font-family: 'Poppins', sans-serif;">{{ __('messages.nav.recipe') }}</a>
            <a href="{{ route('blogs') }}" class="text-white hover:text-amber-300 text-xs font-medium tracking-wide uppercase transition-colors duration-200 drop-shadow-lg" style="font-family: 'Poppins', sans-serif;">{{ __('messages.nav.blogs') }}</a>
            <a href="{{ route('about') }}" class="text-white hover:text-amber-300 text-xs font-medium tracking-wide uppercase transition-colors duration-200 drop-shadow-lg" style="font-family: 'Poppins', sans-serif;">{{ __('messages.nav.about') }}</a>
            <a href="{{ route('contact') }}" class="text-white hover:text-amber-300 text-xs font-medium tracking-wide uppercase transition-colors duration-200 drop-shadow-lg" style="font-family: 'Poppins', sans-serif;">{{ __('messages.nav.contact') }}</a>
            
            @auth
            <!-- Admin Panel Access -->
            <a href="{{ route('admin.products') }}" class="text-amber-300 hover:text-amber-100 text-xs font-medium tracking-wide uppercase transition-colors duration-200 drop-shadow-lg border border-amber-300 px-2 py-1 rounded" style="font-family: 'Poppins', sans-serif;">Admin Panel</a>
            @endauth
        </div>

        <!-- Mobile Menu Button -->
        <div class="mobile-menu-button" id="mobile-menu-button" style="
            display: none;
            flex-direction: column;
            cursor: pointer;
            padding: 10px;
            border-radius: 6px;
            transition: background-color 0.3s ease;
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        " onclick="toggleMobileMenu()">
            <span style="
                width: 22px;
                height: 2.5px;
                background-color: white;
                margin: 2.5px 0;
                transition: 0.3s;
                border-radius: 2px;
                box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            " class="bar1"></span>
            <span style="
                width: 22px;
                height: 2.5px;
                background-color: white;
                margin: 2.5px 0;
                transition: 0.3s;
                border-radius: 2px;
                box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            " class="bar2"></span>
            <span style="
                width: 22px;
                height: 2.5px;
                background-color: white;
                margin: 2.5px 0;
                transition: 0.3s;
                border-radius: 2px;
                box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            " class="bar3"></span>
        </div>
    </div>

    <!-- Mobile Menu Overlay & Backdrop -->
    <div class="mobile-menu-backdrop" id="mobile-menu-backdrop" style="
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 998;
        display: none;
        opacity: 0;
        transition: opacity 0.3s ease;
    " onclick="toggleMobileMenu()"></div>

    <!-- Side Drawer Menu -->
    <div class="mobile-menu" id="mobile-menu" style="
        position: fixed;
        top: 0;
        right: -100%;
        width: 280px;
        height: 100vh;
        background: linear-gradient(180deg, #482500 0%, #5C3317 100%);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        z-index: 999;
        transition: right 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        box-shadow: -5px 0 20px rgba(0, 0, 0, 0.3);
        display: flex;
        flex-direction: column;
        overflow-y: auto;
    ">
        <!-- Header Section -->
        <div style="
            padding: 25px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255, 255, 255, 0.05);
        ">
            <!-- Logo in Drawer -->
            <div style="flex: 1;">
                <img src="{{ asset('logoputih.png') }}" alt="Niranta Logo" style="height: 40px; width: auto;">
            </div>
            
            <!-- Close Button -->
            <div style="
                cursor: pointer;
                padding: 8px;
                background-color: rgba(255, 255, 255, 0.1);
                border-radius: 50%;
                transition: all 0.3s ease;
                width: 36px;
                height: 36px;
                display: flex;
                align-items: center;
                justify-content: center;
            " onclick="toggleMobileMenu()" 
               onmouseover="this.style.backgroundColor='rgba(255, 255, 255, 0.2)'; this.style.transform='scale(1.1)'" 
               onmouseout="this.style.backgroundColor='rgba(255, 255, 255, 0.1)'; this.style.transform='scale(1)'">
                <span style="
                    color: white;
                    font-size: 18px;
                    font-weight: bold;
                    line-height: 1;
                ">✕</span>
            </div>
        </div>

        <!-- Menu Items Section -->
        <div style="
            flex: 1;
            padding: 30px 0;
            display: flex;
            flex-direction: column;
            gap: 8px;
        ">

        <!-- Mobile Menu Items -->
        <a href="{{ route('home') }}" class="mobile-menu-item" style="
            color: white;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            font-weight: 500;
            text-decoration: none;
            padding: 18px 25px;
            margin: 0 15px;
            border-radius: 12px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
        " onclick="toggleMobileMenu()" 
           onmouseover="this.style.backgroundColor='rgba(255, 255, 255, 0.15)'; this.style.transform='translateX(5px)'; this.style.borderColor='rgba(255, 255, 255, 0.3)'" 
           onmouseout="this.style.backgroundColor='rgba(255, 255, 255, 0.05)'; this.style.transform='translateX(0)'; this.style.borderColor='rgba(255, 255, 255, 0.1)'">
            <span>{{ __('messages.nav.home') }}</span>
        </a>
        
        <a href="{{ route('product') }}" class="mobile-menu-item" style="
            color: white;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            font-weight: 500;
            text-decoration: none;
            padding: 18px 25px;
            margin: 0 15px;
            border-radius: 12px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
        " onclick="toggleMobileMenu()" 
           onmouseover="this.style.backgroundColor='rgba(255, 255, 255, 0.15)'; this.style.transform='translateX(5px)'; this.style.borderColor='rgba(255, 255, 255, 0.3)'" 
           onmouseout="this.style.backgroundColor='rgba(255, 255, 255, 0.05)'; this.style.transform='translateX(0)'; this.style.borderColor='rgba(255, 255, 255, 0.1)'">
            <span>{{ __('messages.nav.product') }}</span>
        </a>
        
        <a href="{{ route('resep') }}" class="mobile-menu-item" style="
            color: white;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            font-weight: 500;
            text-decoration: none;
            padding: 18px 25px;
            margin: 0 15px;
            border-radius: 12px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
        " onclick="toggleMobileMenu()" 
           onmouseover="this.style.backgroundColor='rgba(255, 255, 255, 0.15)'; this.style.transform='translateX(5px)'; this.style.borderColor='rgba(255, 255, 255, 0.3)'" 
           onmouseout="this.style.backgroundColor='rgba(255, 255, 255, 0.05)'; this.style.transform='translateX(0)'; this.style.borderColor='rgba(255, 255, 255, 0.1)'">
            <span>{{ __('messages.nav.recipe') }}</span>
        </a>
        
        <a href="{{ route('blogs') }}" class="mobile-menu-item" style="
            color: white;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            font-weight: 500;
            text-decoration: none;
            padding: 18px 25px;
            margin: 0 15px;
            border-radius: 12px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
        " onclick="toggleMobileMenu()" 
           onmouseover="this.style.backgroundColor='rgba(255, 255, 255, 0.15)'; this.style.transform='translateX(5px)'; this.style.borderColor='rgba(255, 255, 255, 0.3)'" 
           onmouseout="this.style.backgroundColor='rgba(255, 255, 255, 0.05)'; this.style.transform='translateX(0)'; this.style.borderColor='rgba(255, 255, 255, 0.1)'">
            <span>{{ __('messages.nav.blogs') }}</span>
        </a>
        
        <a href="{{ route('about') }}" class="mobile-menu-item" style="
            color: white;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            font-weight: 500;
            text-decoration: none;
            padding: 18px 25px;
            margin: 0 15px;
            border-radius: 12px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
        " onclick="toggleMobileMenu()" 
           onmouseover="this.style.backgroundColor='rgba(255, 255, 255, 0.15)'; this.style.transform='translateX(5px)'; this.style.borderColor='rgba(255, 255, 255, 0.3)'" 
           onmouseout="this.style.backgroundColor='rgba(255, 255, 255, 0.05)'; this.style.transform='translateX(0)'; this.style.borderColor='rgba(255, 255, 255, 0.1)'">
            <span>{{ __('messages.nav.about') }}</span>
        </a>
        
        <a href="{{ route('contact') }}" class="mobile-menu-item" style="
            color: white;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            font-weight: 500;
            text-decoration: none;
            padding: 18px 25px;
            margin: 0 15px;
            border-radius: 12px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
        " onclick="toggleMobileMenu()" 
           onmouseover="this.style.backgroundColor='rgba(255, 255, 255, 0.15)'; this.style.transform='translateX(5px)'; this.style.borderColor='rgba(255, 255, 255, 0.3)'" 
           onmouseout="this.style.backgroundColor='rgba(255, 255, 255, 0.05)'; this.style.transform='translateX(0)'; this.style.borderColor='rgba(255, 255, 255, 0.1)'">
            <span>{{ __('messages.nav.contact') }}</span>
        </a>
        
        @auth
        <!-- Admin Panel Access for Mobile -->
        <div style="
            margin: 15px;
            padding: 15px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        ">
            <a href="{{ route('admin.products') }}" class="mobile-menu-item" style="
                color: #FFD700;
                font-family: 'Poppins', sans-serif;
                font-size: 16px;
                font-weight: 600;
                text-decoration: none;
                padding: 18px 25px;
                margin: 0;
                border-radius: 12px;
                transition: all 0.3s ease;
                display: flex;
                align-items: center;
                background: rgba(255, 215, 0, 0.1);
                border: 1px solid rgba(255, 215, 0, 0.3);
            " onclick="toggleMobileMenu()" 
               onmouseover="this.style.backgroundColor='rgba(255, 215, 0, 0.2)'; this.style.transform='translateX(5px)'; this.style.borderColor='rgba(255, 215, 0, 0.5)'" 
               onmouseout="this.style.backgroundColor='rgba(255, 215, 0, 0.1)'; this.style.transform='translateX(0)'; this.style.borderColor='rgba(255, 215, 0, 0.3)'">
                <span>Admin Panel</span>
            </a>
        </div>
        @endauth
        </div>

        <!-- Footer Section -->
        <div style="
            padding: 20px 25px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(255, 255, 255, 0.05);
        ">
            <p style="
                color: rgba(255, 255, 255, 0.7);
                font-family: 'Poppins', sans-serif;
                font-size: 12px;
                text-align: center;
                margin: 0;
                line-height: 1.4;
            ">© 2025 Niranta<br>Premium Palm Sugar</p>
        </div>
    </div>
</nav>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

<!-- Custom Navbar Styles -->
<style>
    /* Navbar full width styling */
    nav {
        width: 100vw !important;
        left: 0 !important;
        right: 0 !important;
        margin: 0 !important;
        padding: 0 !important;
    }
    
    /* Logo styling - medium size like in image */
    nav img {
        height: 64px !important;
        width: auto;
        object-fit: contain;
    }
    
    /* Menu items styling - very small and compact to match image exactly */
    nav a:not(img) {
        font-family: 'Inter', sans-serif !important;
        font-weight: 500;
        letter-spacing: 0.8px;
        font-size: 11px; /* Very small like in the image */
        color: white !important;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }
    
    /* Hover effects */
    nav a {
        transition: all 0.3s ease;
    }
    
    nav a:hover {
        color: #fcd34d !important;
        text-shadow: 0 2px 8px rgba(252, 211, 77, 0.4);
    }
    
    /* Menu spacing adjustments to match image */
    nav .space-x-8 > * + * {
        margin-left: 2rem; /* 32px spacing between menu items */
    }
    
    /* Responsive adjustments */
    @media (max-width: 1400px) {
        nav .w-full.h-full.flex {
            padding-left: 4rem;
            padding-right: 4rem;
        }
        
        nav .space-x-8 > * + * {
            margin-left: 1.75rem; /* 28px */
        }
    }
    
    @media (max-width: 1024px) {
        nav {
            height: 70px !important;
            padding: 0 2rem !important;
        }
        
        nav .w-full.h-full.flex {
            padding-left: 2rem !important;
            padding-right: 2rem !important;
        }
        
        nav img {
            height: 45px !important;
        }
        
        nav a:not(img) {
            font-size: 10px;
            letter-spacing: 0.5px;
        }
        
        nav .space-x-8 > * + * {
            margin-left: 1.2rem; /* 20px */
        }
    }
    
    @media (max-width: 768px) {
        nav {
            height: 65px !important;
            padding: 0 1.5rem !important;
        }
        
        nav .w-full.h-full.flex {
            padding-left: 1.5rem !important;
            padding-right: 1.5rem !important;
        }
        
        nav img {
            height: 40px !important;
        }
        
        #desktop-menu {
            display: none !important;
        }
        
        .mobile-menu-button {
            display: flex !important;
        }
    }
    
    @media (max-width: 640px) {
        nav {
            height: 60px !important;
            padding: 0 1rem !important;
        }
        
        nav .w-full.h-full.flex {
            padding-left: 1rem !important;
            padding-right: 1rem !important;
        }
        
        nav img {
            height: 35px !important;
        }
        
        #desktop-menu {
            display: none !important;
        }
        
        .mobile-menu-button {
            display: flex !important;
        }
        
        /* Mobile menu item hover effects */
        .mobile-menu-item:hover {
            background-color: rgba(255, 255, 255, 0.15) !important;
            transform: translateX(5px) !important;
            border-color: rgba(255, 255, 255, 0.3) !important;
        }
        
        /* Hamburger animation */
        .mobile-menu-button:hover {
            background-color: rgba(255, 255, 255, 0.2) !important;
            transform: scale(1.05);
        }
        
        /* Hamburger to X animation */
        .mobile-menu-button.active .bar1 {
            transform: rotate(-45deg) translate(-7px, 6px);
        }
        
        .mobile-menu-button.active .bar2 {
            opacity: 0;
        }
        
        .mobile-menu-button.active .bar3 {
            transform: rotate(45deg) translate(-7px, -6px);
        }
        
        /* Side drawer animations */
        .mobile-menu.open {
            right: 0 !important;
        }
        
        .mobile-menu-backdrop.open {
            display: block !important;
            opacity: 1 !important;
        }
        
        /* Responsive drawer width */
        @media (max-width: 320px) {
            .mobile-menu {
                width: 260px !important;
            }
        }
    }
</style>

<!-- Navbar Scroll Effect JavaScript - Fixed Brown Color -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const navbar = document.getElementById('navbar');
    
    // Always keep navbar with brown background - no scroll effect
    navbar.style.background = '#482500';
    navbar.style.backdropFilter = 'blur(2px)';
    navbar.style.webkitBackdropFilter = 'blur(2px)';
});

// Mobile Menu Toggle Function
function toggleMobileMenu() {
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const backdrop = document.getElementById('mobile-menu-backdrop');
    
    if (mobileMenu.classList.contains('open')) {
        // Close menu
        mobileMenu.classList.remove('open');
        backdrop.classList.remove('open');
        mobileMenuButton.classList.remove('active');
        document.body.style.overflow = 'auto';
        
        // Delay hiding backdrop to allow animation to complete
        setTimeout(() => {
            if (!mobileMenu.classList.contains('open')) {
                backdrop.style.display = 'none';
            }
        }, 300);
    } else {
        // Open menu
        backdrop.style.display = 'block';
        setTimeout(() => {
            mobileMenu.classList.add('open');
            backdrop.classList.add('open');
            mobileMenuButton.classList.add('active');
            document.body.style.overflow = 'hidden';
        }, 10);
    }
}

// Close mobile menu when clicking outside
document.addEventListener('click', function(event) {
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const backdrop = document.getElementById('mobile-menu-backdrop');
    
    if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
        if (mobileMenu.classList.contains('open')) {
            toggleMobileMenu();
        }
    }
});

// Handle escape key to close menu
document.addEventListener('keydown', function(event) {
    const mobileMenu = document.getElementById('mobile-menu');
    if (event.key === 'Escape' && mobileMenu.classList.contains('open')) {
        toggleMobileMenu();
    }
});
</script>
