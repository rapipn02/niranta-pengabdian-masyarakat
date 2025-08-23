<style>
/* Import Google Fonts */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap');

/* Sidebar Styles */
.sidebar {
    width: 230px;
    background-color: #482500;
    color: white;
    display: flex;
    flex-direction: column;
    position: relative;
    min-height: 100vh;
    font-family: 'Poppins', sans-serif;
}

/* Desktop Logo Container */
.desktop-logo {
    padding: 30px 20px;
    text-align: center;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

/* Hide sidebar header pada desktop */
.sidebar-header {
    display: none;
}

/* Hide hamburger menu dan overlay pada desktop */
.hamburger-menu, .sidebar-overlay {
    display: none;
}

.logo-container {
    padding: 30px 20px;
    text-align: center;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.logo-link {
    display: inline-block;
    transition: all 0.3s ease;
    text-decoration: none;
}

.logo-link:hover {
    transform: scale(1.05);
    opacity: 0.9;
}

.logo-image {
    height: 45px;
    margin-bottom: 8px;
    transition: all 0.3s ease;
}

.logo-text {
    font-size: 28px;
    font-weight: 400;
    font-style: italic;
    color: white;
    text-decoration: none;
    font-family: 'Poppins', sans-serif;
    display: block;
    margin-bottom: 8px;
}

.logo-underline {
    width: 80%;
    height: 2px;
    background-color: white;
    margin: 0 auto;
}

.nav-menu {
    flex: 1;
    padding: 40px 0;
}

.nav-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 18px 30px;
    color: white;
    text-decoration: none;
    font-size: 16px;
    font-weight: 500;
    font-family: 'Poppins', sans-serif;
    transition: all 0.3s ease;
    border: none;
    background: none;
    cursor: pointer;
    width: 100%;
    text-align: left;
    position: relative;
    margin-bottom: 8px;
    justify-content: center;
}

.nav-item:hover {
    background-color: rgba(255, 255, 255, 0.1);
}

.nav-item.active {
    background-color: #F5F0E8;
    color: #8B4513;
    font-weight: 600;
    border-radius: 25px 0 0 25px;
    margin-right: 15px;
}

.nav-item.active::before {
    content: '';
    position: absolute;
    left: 15px;
    top: 50%;
    transform: translateY(-50%);
    width: 8px;
    height: 8px;
    background-color: #8B4513;
    border-radius: 50%;
}

.nav-text {
    margin-left: 0;
}

.logout-container {
    padding: 20px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.logout-form {
    width: 100%;
}

.logout-btn {
    display: flex;
    align-items: center;
    gap: 10px;
    color: white;
    text-decoration: none;
    font-size: 16px;
    font-weight: 500;
    font-family: 'Poppins', sans-serif;
    padding: 12px 15px;
    border-radius: 8px;
    transition: all 0.3s ease;
    border: none;
    background: none;
    cursor: pointer;
    width: 100%;
    justify-content: center;
}

.logout-btn:hover {
    background-color: rgba(255, 255, 255, 0.1);
}

/* Responsive Design */
@media (max-width: 1024px) {
    .sidebar {
        width: 200px;
    }
}

@media (max-width: 768px) {
    .sidebar {
        width: 280px;
        height: 100vh;
        position: fixed;
        left: -280px;
        top: 0;
        z-index: 1000;
        flex-direction: column;
        background-color: #482500;
        transition: left 0.3s ease;
        overflow-y: auto;
    }

    .sidebar.open {
        left: 0;
    }

    /* Show sidebar header pada mobile */
    .sidebar-header {
        display: flex !important;
        padding: 30px 20px 20px 20px;
        justify-content: space-between;
        align-items: flex-start;
        border: none;
    }

    /* Hide desktop logo pada mobile */
    .desktop-logo {
        display: none;
    }

    .close-btn {
        background: none;
        border: none;
        color: white;
        font-size: 28px;
        cursor: pointer;
        padding: 0;
        border-radius: 4px;
        transition: background-color 0.3s ease;
        line-height: 1;
        font-weight: 300;
    }

    .close-btn:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .logo-container {
        padding: 0;
        border: none;
        margin-right: 0;
        flex-shrink: 0;
        text-align: left;
        flex: 1;
    }

    .logo-image {
        display: block !important;
        height: 45px;
        max-width: 140px;
        object-fit: contain;
    }

    .logo-text {
        display: none;
    }

    .logo-underline {
        display: none;
    }

    .nav-menu {
        display: flex;
        flex-direction: column;
        gap: 12px;
        padding: 30px 20px 20px 20px;
        flex: 1;
    }

    .nav-item {
        display: flex;
        align-items: center;
        gap: 0px;
        padding: 15px 20px;
        border-radius: 25px;
        margin: 0;
        text-decoration: none;
        color: white;
        font-size: 16px;
        font-weight: 500;
        font-family: 'Poppins', sans-serif;
        transition: all 0.3s ease;
        position: relative;
        min-height: 50px;
    }

    .nav-item:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }

    /* Icons untuk setiap menu item */
    .nav-item:before {
        content: '';
        width: 20px;
        height: 20px;
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        opacity: 1;
        position: absolute;
        left: 32px;
    }

    .nav-item[href*="dashboard"]:before {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='white' viewBox='0 0 24 24'%3E%3Cpath d='M10,20V14H14V20H19V12H22L12,3L2,12H5V20H10Z'/%3E%3C/svg%3E");
    }

    .nav-item[href*="products"]:before {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='white' viewBox='0 0 24 24'%3E%3Cpath d='M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5'/%3E%3C/svg%3E");
    }

    .nav-item[href*="recipes"]:before {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='white' viewBox='0 0 24 24'%3E%3Cpath d='M11.5,1L9.5,9H14.5L12.5,1H11.5M12,14A3,3 0 0,1 15,17A3,3 0 0,1 12,20A3,3 0 0,1 9,17A3,3 0 0,1 12,14M12,2.5L13.3,8H10.7L12,2.5Z'/%3E%3C/svg%3E");
    }

    .nav-item[href*="blogs"]:before {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='white' viewBox='0 0 24 24'%3E%3Cpath d='M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z'/%3E%3C/svg%3E");
    }

    /* Active state styling */
    .nav-item.active {
        background-color: #F5F0E8;
        color: #482500;
        border-radius: 25px;
        font-weight: 600;
        position: relative;
    }

    .nav-item.active::after {
        content: '';
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        width: 8px;
        height: 8px;
        background-color: #D17E47;
        border-radius: 50%;
    }

    .nav-item.active:before {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23482500' viewBox='0 0 24 24'%3E%3Cpath d='M10,20V14H14V20H19V12H22L12,3L2,12H5V20H10Z'/%3E%3C/svg%3E");
    }

    .nav-item.active[href*="products"]:before {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23482500' viewBox='0 0 24 24'%3E%3Cpath d='M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5'/%3E%3C/svg%3E");
    }

    .nav-item.active[href*="recipes"]:before {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23482500' viewBox='0 0 24 24'%3E%3Cpath d='M11.5,1L9.5,9H14.5L12.5,1H11.5M12,14A3,3 0 0,1 15,17A3,3 0 0,1 12,20A3,3 0 0,1 9,17A3,3 0 0,1 12,14M12,2.5L13.3,8H10.7L12,2.5Z'/%3E%3C/svg%3E");
    }

    .nav-item.active[href*="blogs"]:before {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23482500' viewBox='0 0 24 24'%3E%3Cpath d='M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z'/%3E%3C/svg%3E");
    }

    .nav-item.active .nav-text {
        color: #482500;
        font-weight: 600;
        margin-left: 60px;
    }

    .nav-text {
        font-size: 16px;
        font-weight: 500;
        margin-left: 60px;
    }

    .logout-container {
        padding: 20px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        margin-top: auto;
    }

    .logout-btn {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 15px 20px;
        font-size: 16px;
        color: white;
        background: none;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        width: 100%;
        text-align: left;
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .logout-btn:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .logout-btn:before {
        content: '';
        width: 20px;
        height: 20px;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='white' viewBox='0 0 24 24'%3E%3Cpath d='M16,17V14H9V10H16V7L21,12L16,17M14,2A2,2 0 0,1 16,4V6H14V4H5V20H14V18H16V20A2,2 0 0,1 14,22H5A2,2 0 0,1 3,20V4A2,2 0 0,1 5,2H14Z'/%3E%3C/svg%3E");
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
    }

    /* Overlay for sidebar */
    .sidebar-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 999;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
    }

    .sidebar-overlay.active {
        opacity: 1;
        visibility: visible;
    }

    /* Hamburger Menu Button */
    .hamburger-menu {
        display: flex !important;
        position: fixed;
        top: 20px;
        left: 20px;
        z-index: 1001;
        background-color: #482500;
        border: none;
        border-radius: 8px;
        padding: 10px;
        cursor: pointer;
        flex-direction: column;
        gap: 3px;
        transition: all 0.3s ease;
    }

    /* Show overlay pada mobile */
    .sidebar-overlay {
        display: block !important;
    }

    .hamburger-menu span {
        width: 25px;
        height: 3px;
        background-color: white;
        border-radius: 2px;
        transition: all 0.3s ease;
    }

    .hamburger-menu.open span:nth-child(1) {
        transform: rotate(45deg) translate(6px, 6px);
    }

    .hamburger-menu.open span:nth-child(2) {
        opacity: 0;
    }

    .hamburger-menu.open span:nth-child(3) {
        transform: rotate(-45deg) translate(6px, -6px);
    }

    /* Adjust main content for mobile */
    .admin-container {
        flex-direction: column;
    }

    .main-content {
        padding-top: 80px;
        padding-left: 20px;
        padding-right: 20px;
    }
}
</style>

<div class="sidebar">
    <!-- Sidebar Header untuk Mobile -->
    <div class="sidebar-header">
        <div class="logo-container">
            <a href="{{ route('home') }}" class="logo-link">
                <img src="{{ asset('logoputih.png') }}" alt="Niranta Logo" class="logo-image">
            </a>
        </div>
        <button class="close-btn" onclick="closeSidebar()">×</button>
    </div>

    <!-- Logo Container untuk Desktop -->
    <div class="logo-container desktop-logo">
        <a href="{{ route('home') }}" class="logo-link">
            <img src="{{ asset('logoputih.png') }}" alt="Niranta Logo" class="logo-image">
        </a>
    </div>

    <nav class="nav-menu">
        <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <span class="nav-text">Dashboard</span>
        </a>
        <a href="{{ route('admin.products') }}" class="nav-item {{ request()->routeIs('admin.products') ? 'active' : '' }}">
            <span class="nav-text">Products</span>
        </a>
        <a href="{{ route('admin.recipes') }}" class="nav-item {{ request()->routeIs('admin.recipes') ? 'active' : '' }}">
            <span class="nav-text">Recipes</span>
        </a>
        <a href="{{ route('admin.blogs') }}" class="nav-item {{ request()->routeIs('admin.blogs') ? 'active' : '' }}">
            <span class="nav-text">Blogs</span>
        </a>
    </nav>

    <div class="logout-container">
        <form method="POST" action="{{ route('logout') }}" class="logout-form">
            @csrf
            <button type="submit" class="logout-btn">
                Log Out
            </button>
        </form>
    </div>
</div>

<!-- Hamburger Menu Button untuk Mobile (Hidden, karena sekarang ada di navbar) -->
<!-- <button class="hamburger-menu" onclick="toggleSidebar()">
    <span></span>
    <span></span>
    <span></span>
</button> -->

<!-- Overlay untuk Mobile -->
<div class="sidebar-overlay" onclick="closeSidebar()"></div>

<!-- JavaScript functions sudah dipindah ke admin layout -->
