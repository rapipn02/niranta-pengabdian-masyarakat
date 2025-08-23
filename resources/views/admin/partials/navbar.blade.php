<!-- Admin Navbar/Sidebar Component -->
@auth
<style>
    /* Desktop Sidebar */
    .admin-sidebar {
        position: fixed;
        top: 0;
        left: 0;
        width: 250px;
        height: 100vh;
        background: #482500;
        box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        overflow-y: auto;
    }

    .admin-sidebar-header {
        padding: 25px 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .admin-logo {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .admin-logo img {
        height: 40px;
        width: auto;
    }

    .admin-logo-text {
        font-size: 20px;
        font-weight: 600;
        color: white;
        font-family: 'Poppins', sans-serif;
    }

    .admin-sidebar-menu {
        padding: 30px 0;
    }

    .admin-sidebar-item {
        margin-bottom: 5px;
    }

    .admin-sidebar-link {
        display: flex;
        align-items: center;
        gap: 12px;
        color: white;
        text-decoration: none;
        font-size: 16px;
        font-weight: 500;
        font-family: 'Poppins', sans-serif;
        padding: 15px 25px;
        transition: all 0.3s ease;
        border-left: 3px solid transparent;
    }

    .admin-sidebar-link:hover {
        background-color: rgba(255, 255, 255, 0.1);
        border-left-color: #F5F0E8;
    }

    .admin-sidebar-link.active {
        background-color: #F5F0E8;
        color: #482500;
        font-weight: 600;
        border-left-color: #482500;
    }

    .admin-sidebar-user {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 20px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        background: #482500;
    }

    .admin-user-info {
        display: flex;
        align-items: center;
        gap: 12px;
        color: white;
        margin-bottom: 15px;
    }

    .admin-user-avatar {
        width: 35px;
        height: 35px;
        background: #F5F0E8;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        color: #482500;
        font-size: 14px;
    }

    .admin-logout-btn {
        width: 100%;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: white;
        padding: 12px;
        border-radius: 8px;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: 'Poppins', sans-serif;
    }

    .admin-logout-btn:hover {
        background: rgba(255, 255, 255, 0.2);
    }

    /* Content margin for sidebar */
    .admin-content-wrapper {
        margin-left: 250px;
        min-height: 100vh;
    }

    /* Mobile Sidebar */
    .admin-mobile-sidebar {
        position: fixed;
        top: 0;
        left: -100%;
        width: 280px;
        height: 100vh;
        background: #482500;
        transition: left 0.3s ease;
        z-index: 1001;
        overflow-y: auto;
    }

    .admin-mobile-sidebar.active {
        left: 0;
    }

    .admin-mobile-toggle {
        display: none;
        position: fixed;
        top: 20px;
        left: 20px;
        background: #482500;
        border: none;
        color: white;
        font-size: 24px;
        cursor: pointer;
        padding: 10px;
        border-radius: 5px;
        z-index: 1002;
    }

    /* Overlay */
    .admin-mobile-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1000;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
    }

    .admin-mobile-overlay.active {
        opacity: 1;
        visibility: visible;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .admin-sidebar {
            display: none;
        }

        .admin-content-wrapper {
            margin-left: 0;
        }

        .admin-mobile-toggle {
            display: block;
        }
    }
</style>

<!-- Desktop Sidebar -->
<div class="admin-sidebar">
    <!-- Sidebar Header -->
    <div class="admin-sidebar-header">
        <div class="admin-logo">
            <img src="{{ asset('logoputih.png') }}" alt="Niranta Logo">
            <span class="admin-logo-text">Admin Panel</span>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="admin-sidebar-menu">
        <div class="admin-sidebar-item">
            <a href="{{ route('admin.products') }}" class="admin-sidebar-link {{ request()->routeIs('admin.products*') ? 'active' : '' }}">
                Products
            </a>
        </div>
        <div class="admin-sidebar-item">
            <a href="{{ route('admin.recipes') }}" class="admin-sidebar-link {{ request()->routeIs('admin.recipes*') ? 'active' : '' }}">
                Recipes
            </a>
        </div>
        <div class="admin-sidebar-item">
            <a href="{{ route('admin.blogs') }}" class="admin-sidebar-link {{ request()->routeIs('admin.blogs*') ? 'active' : '' }}">
                Blogs
            </a>
        </div>
        <div class="admin-sidebar-item">
            <a href="{{ route('home') }}" class="admin-sidebar-link">
                Back to Site
            </a>
        </div>
    </nav>

    <!-- Sidebar User Section -->
    <div class="admin-sidebar-user">
        <div class="admin-user-info">
            <div class="admin-user-avatar">
                {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
            </div>
            <span>{{ Auth::user()->name ?? 'Admin' }}</span>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="admin-logout-btn">
                Logout
            </button>
        </form>
    </div>
</div>

<!-- Mobile Toggle Button -->
<button class="admin-mobile-toggle" onclick="toggleMobileSidebar()">
    ☰
</button>

<!-- Mobile Sidebar -->
<div class="admin-mobile-sidebar" id="adminMobileSidebar">
    <!-- Mobile Sidebar Header -->
    <div class="admin-sidebar-header">
        <div class="admin-logo">
            <img src="{{ asset('logoputih.png') }}" alt="Niranta Logo">
            <span class="admin-logo-text">Admin Panel</span>
        </div>
    </div>

    <!-- Mobile Sidebar Menu -->
    <nav class="admin-sidebar-menu">
        <div class="admin-sidebar-item">
            <a href="{{ route('admin.products') }}" class="admin-sidebar-link {{ request()->routeIs('admin.products*') ? 'active' : '' }}">
                Products
            </a>
        </div>
        <div class="admin-sidebar-item">
            <a href="{{ route('admin.recipes') }}" class="admin-sidebar-link {{ request()->routeIs('admin.recipes*') ? 'active' : '' }}">
                Recipes
            </a>
        </div>
        <div class="admin-sidebar-item">
            <a href="{{ route('admin.blogs') }}" class="admin-sidebar-link {{ request()->routeIs('admin.blogs*') ? 'active' : '' }}">
                Blogs
            </a>
        </div>
        <div class="admin-sidebar-item">
            <a href="{{ route('home') }}" class="admin-sidebar-link">
                Back to Site
            </a>
        </div>
    </nav>

    <!-- Mobile Sidebar User Section -->
    <div class="admin-sidebar-user">
        <div class="admin-user-info">
            <div class="admin-user-avatar">
                {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
            </div>
            <span>{{ Auth::user()->name ?? 'Admin' }}</span>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="admin-logout-btn">
                Logout
            </button>
        </form>
    </div>
</div>

<!-- Mobile Overlay -->
<div class="admin-mobile-overlay" id="adminMobileOverlay" onclick="closeMobileSidebar()"></div>

<script>
function toggleMobileSidebar() {
    const sidebar = document.getElementById('adminMobileSidebar');
    const overlay = document.getElementById('adminMobileOverlay');
    
    sidebar.classList.toggle('active');
    overlay.classList.toggle('active');
}

function closeMobileSidebar() {
    const sidebar = document.getElementById('adminMobileSidebar');
    const overlay = document.getElementById('adminMobileOverlay');
    
    sidebar.classList.remove('active');
    overlay.classList.remove('active');
}

// Close sidebar when clicking on a link (mobile)
document.addEventListener('DOMContentLoaded', function() {
    const mobileLinks = document.querySelectorAll('.admin-mobile-sidebar .admin-sidebar-link');
    mobileLinks.forEach(link => {
        link.addEventListener('click', closeMobileSidebar);
    });
});
</script>
@endauth
