<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') | Niranta</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            overflow: hidden;
        }

        .admin-container {
            display: flex;
            height: 100vh;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            background-color:rgba(226, 208, 186, 0.50);
            padding: 40px 50px;
            overflow-y: auto;
        }

        .content-header {
            margin-bottom: 40px;
        }

        .page-title {
            font-size: 36px;
            font-weight: 700;
            color: #2C1810;
            margin-bottom: 10px;
            font-family: 'Poppins', sans-serif;
        }

        /* Table Container */
        .table-container {
            background-color: rgba(226, 208, 186, 0.50);
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            position: relative;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .table-header {
            background-color: rgba(226, 208, 186, 0.50);
        }

        .table-header th {
            padding: 20px 25px;
            text-align: left;
            font-size: 16px;
            font-weight: 600;
            color: white;
            border-bottom: 2px solid rgba(226, 208, 186, 0.50);
            font-family: 'Poppins', sans-serif;
        }

        .table-header th:first-child {
            text-align: center;
            width: 80px;
        }

        .table-header th:nth-child(2) {
            width: 300px;
        }

        .table-header th:nth-child(3) {
            width: 150px;
        }

        .table-header th:nth-child(4) {
            width: 200px;
        }

        .table-header th:last-child {
            text-align: center;
            width: 200px;
        }

        .table-row {
            border-bottom: 1px solid #F0F0F0;
            transition: all 0.3s ease;
        }

        .table-row:hover {
            background-color: #FAFAFA;
        }

        .table-row td {
            padding: 18px 25px;
            font-size: 15px;
            color: #2C1810;
            vertical-align: middle;
            font-family: 'Inter', sans-serif;
        }

        .table-row td:first-child {
            text-align: center;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
        }

        .table-row td:last-child {
            text-align: center;
        }

        .product-name {
            font-weight: 500;
            font-family: 'Poppins', sans-serif;
        }

        .product-price {
            font-weight: 600;
            color: #8B4513;
            font-family: 'Poppins', sans-serif;
        }

        .product-link {
            font-size: 13px;
            color: #666;
            word-break: break-all;
            font-family: 'Inter', sans-serif;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 8px;
            justify-content: center;
        }

        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            font-family: 'Poppins', sans-serif;
        }

        .btn-edit {
            background-color: #F0F0F0;
            color: #2C1810;
        }

        .btn-edit:hover {
            background-color: #E5E5E5;
        }

        .btn-delete {
            background-color: #8B4513;
            color: white;
        }

        .btn-delete:hover {
            background-color: #A0522D;
        }

        /* Add Product Button */
        .add-product-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 25px;
        }

        .btn-add-product {
            display: flex;
            align-items: center;
            gap: 8px;
            background-color: #8B4513;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-add-product:hover {
            background-color: #A0522D;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(139, 69, 19, 0.3);
        }

        .add-icon {
            font-size: 18px;
            font-weight: bold;
        }

        /* Coming Soon Style */
        .coming-soon {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 60px 40px;
            text-align: center;
        }

        .coming-soon h2 {
            font-size: 28px;
            color: #8B4513;
            margin-bottom: 20px;
        }

        .coming-soon p {
            font-size: 16px;
            color: #666;
        }

        /* Mobile Navbar */
        .mobile-navbar {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 60px;
            background-color: #482500;
            z-index: 1000;
            padding: 0 50px;
            align-items: center;
            justify-content: flex-start;
            gap: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .mobile-navbar .hamburger-menu {
            display: flex;
            flex-direction: column;
            gap: 4px;
            background: none;
            border: none;
            cursor: pointer;
            padding: 8px;
        }

        .mobile-navbar .hamburger-menu span {
            width: 25px;
            height: 3px;
            background-color: white;
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        .mobile-navbar .hamburger-menu.open span:nth-child(1) {
            transform: rotate(45deg) translate(6px, 6px);
        }

        .mobile-navbar .hamburger-menu.open span:nth-child(2) {
            opacity: 0;
        }

        .mobile-navbar .hamburger-menu.open span:nth-child(3) {
            transform: rotate(-45deg) translate(6px, -6px);
        }

        .mobile-navbar .navbar-logo {
            flex: 0;
        }

        .mobile-navbar .navbar-logo-img {
            height: 45px;
            max-width: 160px;
            object-fit: contain;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .main-content {
                padding: 30px 30px;
            }

            .page-title {
                font-size: 28px;
            }
        }

        @media (max-width: 768px) {
            body {
                overflow: auto;
            }

            .mobile-navbar {
                display: flex;
            }

            .admin-container {
                flex-direction: column;
                padding-top: 60px;
                height: auto;
                min-height: 100vh;
            }

            .main-content {
                padding: 10px 15px;
                overflow-y: visible;
            }

            .table-container {
                overflow-x: auto;
            }

            .data-table {
                min-width: 700px;
            }
        }
    </style>
</head>
<body>
    <!-- Mobile Navbar -->
    <nav class="mobile-navbar">
        <button class="hamburger-menu" onclick="toggleSidebar()">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <div class="navbar-logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('logoputih.png') }}" alt="Niranta Logo" class="navbar-logo-img">
            </a>
        </div>
    </nav>

    <div class="admin-container">
        <!-- Sidebar -->
        @include('admin.partials.sidebar')

        <!-- Main Content -->
        <div class="main-content">
            <div class="content-header">
                <h1 class="page-title">@yield('page-title')</h1>
            </div>

            @yield('content')
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            const overlay = document.querySelector('.sidebar-overlay');
            const hamburgerInSidebar = document.querySelector('.sidebar .hamburger-menu');
            const hamburgerInNavbar = document.querySelector('.mobile-navbar .hamburger-menu');
            
            sidebar.classList.toggle('open');
            overlay.classList.toggle('active');
            
            // Animate both hamburger menus
            if (hamburgerInSidebar) {
                hamburgerInSidebar.classList.toggle('open');
            }
            hamburgerInNavbar.classList.toggle('open');
        }

        function closeSidebar() {
            const sidebar = document.querySelector('.sidebar');
            const overlay = document.querySelector('.sidebar-overlay');
            const hamburgerInSidebar = document.querySelector('.sidebar .hamburger-menu');
            const hamburgerInNavbar = document.querySelector('.mobile-navbar .hamburger-menu');
            
            sidebar.classList.remove('open');
            overlay.classList.remove('active');
            
            // Reset both hamburger menus
            if (hamburgerInSidebar) {
                hamburgerInSidebar.classList.remove('open');
            }
            hamburgerInNavbar.classList.remove('open');
        }

        // Close sidebar when clicking on a nav item (mobile)
        document.addEventListener('DOMContentLoaded', function() {
            const navItems = document.querySelectorAll('.nav-item');
            navItems.forEach(item => {
                item.addEventListener('click', function() {
                    if (window.innerWidth <= 768) {
                        closeSidebar();
                    }
                });
            });
        });
    </script>
</body>
</html>
