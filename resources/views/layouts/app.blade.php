<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Test">
    <meta name="author" content="ColorlibHQ">
    <meta name="description" content="AdminLTE is a Free Bootstrap 5 Admin Dashboard.">
    <meta name="keywords" content="bootstrap 5, admin dashboard, etc.">
    <title>@yield('title', 'Dashboard')</title>

    <!-- Global styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/inter@5.0.16/index.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="../../dist/css/adminlte.css">

    @stack('styles')
    
    <style>
        :root {
            --primary-color: #FC4E00;
            --primary-dark: #e03d00;
            --primary-light: #ff6b24;
            --secondary-color: #2c3e50;
            --accent-color: #3498db;
            --success-color: #27ae60;
            --warning-color: #f39c12;
            --danger-color: #e74c3c;
            --light-bg: #f8fafc;
            --card-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --hover-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --border-radius: 12px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }

        body {
            background: white;
            min-height: 100vh;
        }

        /* Header amélioré */
        .app-header {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: var(--card-shadow);
            transition: var(--transition);
        }

        .app-header:hover {
            box-shadow: var(--hover-shadow);
        }

        /* Sidebar moderne avec glassmorphism */
        .app-sidebar {
            background: rgba(252, 78, 0, 0.95) !important;
            backdrop-filter: blur(20px);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 4px 0 20px rgba(252, 78, 0, 0.3);
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 4rem;
            padding: 1rem;
            overflow: hidden;
            font-size: 1.5rem;
            white-space: nowrap;
            transition: var(--transition);
            background: rgba(255, 255, 255, 0.1);
            margin: 1rem;
            border-radius: var(--border-radius);
            backdrop-filter: blur(10px);
        }

        .sidebar-brand img {
            filter: brightness(0) invert(1);
            transition: var(--transition);
        }

        /* Navigation améliorée */
        .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            border-radius: var(--border-radius);
            margin: 0.25rem 0.5rem;
            padding: 0.75rem 1rem !important;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
            opacity: 0;
            transition: var(--transition);
            z-index: -1;
        }

        .nav-link:hover {
            color: white !important;
            background: rgba(255, 255, 255, 0.15);
            transform: translateX(8px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .nav-link:hover::before {
            opacity: 1;
        }

        .nav-link.active {
            background: rgba(255, 255, 255, 0.2);
            color: white !important;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .nav-icon {
            width: 20px;
            margin-right: 12px;
            transition: var(--transition);
        }

        .nav-link:hover .nav-icon {
            transform: scale(1.1);
        }

        /* Main content area */
        .app-main {
            background: var(--light-bg) !important;
            border-radius: 24px 0 0 0;
            margin-left: 0;
            min-height: 100vh;
            position: relative;
            overflow: hidden;
        }

        .app-main::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
            pointer-events: none;
        }

        .app-content {
            padding: 2rem;
            position: relative;
            z-index: 1;
        }

        /* User dropdown amélioré */
        .user-menu .dropdown-toggle {
            background: rgba(252, 78, 0, 0.1);
            border-radius: 50%;
            padding: 0.5rem;
            transition: var(--transition);
        }

        .user-menu .dropdown-toggle:hover {
            background: rgba(252, 78, 0, 0.2);
            transform: scale(1.05);
        }

        .dropdown-menu {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: var(--border-radius);
            box-shadow: var(--hover-shadow);
            overflow: hidden;
        }

        .user-header {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)) !important;
            padding: 1.5rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .user-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.05)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }

        .user-footer {
            padding: 1rem;
            background: rgba(248, 250, 252, 0.5);
        }

        .btn {
            border-radius: var(--border-radius);
            font-weight: 600;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: var(--transition);
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--hover-shadow);
        }

        /* Animations */
        @keyframes slideInFromLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .nav-item {
            animation: slideInFromLeft 0.3s ease-out;
            animation-fill-mode: both;
        }

        .nav-item:nth-child(1) { animation-delay: 0.1s; }
        .nav-item:nth-child(2) { animation-delay: 0.2s; }
        .nav-item:nth-child(3) { animation-delay: 0.3s; }
        .nav-item:nth-child(4) { animation-delay: 0.4s; }
        .nav-item:nth-child(5) { animation-delay: 0.5s; }
        .nav-item:nth-child(6) { animation-delay: 0.6s; }
        .nav-item:nth-child(7) { animation-delay: 0.7s; }
        .nav-item:nth-child(8) { animation-delay: 0.8s; }

        .app-content {
            animation: fadeIn 0.5s ease-out;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .app-sidebar {
                transform: translateX(-100%);
                transition: var(--transition);
            }

            .app-sidebar.show {
                transform: translateX(0);
            }

            .app-main {
                border-radius: 0;
                margin-left: 0;
            }
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(252, 78, 0, 0.5);
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(252, 78, 0, 0.8);
        }

        /* Loading animation pour les futurs éléments */
        .loading {
            position: relative;
            overflow: hidden;
        }

        .loading::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            animation: shimmer 1.5s infinite;
        }

        @keyframes shimmer {
            to { left: 100%; }
        }

        /* Menu toggle amélioré */
        .navbar-toggler {
            border: none;
            padding: 0.5rem;
            background: rgba(252, 78, 0, 0.1);
            border-radius: var(--border-radius);
            transition: var(--transition);
        }

        .navbar-toggler:hover {
            background: rgba(252, 78, 0, 0.2);
            transform: scale(1.05);
        }
    </style>
</head>

<body class="layout-fixed sidebar-expand-lg">
    <div class="app-wrapper">
        <!-- Header amélioré -->
        <nav class="app-header navbar navbar-expand">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link navbar-toggler" data-lte-toggle="sidebar" href="#" role="button">
                            <i data-lte-icon="menu" class="bi bi-list" style="color: var(--primary-color); font-size: 1.2rem;"></i>
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                            <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen" style="color: var(--primary-color);"></i>
                            <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none; color: var(--primary-color);"></i>
                        </a>
                    </li>

                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle" style="font-size: 1.8rem; color: var(--primary-color);"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <li class="user-header">
                                <i class="bi bi-person-circle" style="font-size: 4rem; color: white;"></i>
                                <p style="color: white; margin-top: 1rem; position: relative; z-index: 1;">
                                    <strong>{{ auth()->user()->nom }}</strong>
                                    <br>
                                    <small style="opacity: 0.9;">{{ auth()->user()->role }}</small>
                                </p>
                            </li>
                            <li class="user-footer d-flex justify-content-between">
                                <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary">
                                    <i class="bi bi-person-gear me-1"></i> Profil
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <a href="#" class="btn btn-primary" 
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right me-1"></i> Déconnexion
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Sidebar moderne -->
        <aside class="app-sidebar" data-bs-theme="dark">
            <div class="sidebar-wrapper">
                <div class="sidebar-brand">
                    <img src="{{asset('Logo-SIR.svg')}}" alt="Logo SIR" style="width: 100px; height: auto;">
                </div>

                <nav class="mt-3">
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                        
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link">
                                <i class="nav-icon bi bi-speedometer2"></i>
                                <p>Tableau de bord</p>
                            </a>
                        </li>

                        @if(auth()->user()->role==='admin')
                        <li class="nav-item">
                            <a href="{{ route('services.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-building"></i>
                                <p>Directions</p>
                            </a>
                        </li>
                        @endif

                        @if(auth()->user()->role==='secretariat')
                        <li class="nav-item">
                            <a href="{{ route('courriers.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-envelope"></i>
                                <p>Courriers</p>
                            </a>
                        </li>
                        @endif

                        <li class="nav-item">
                            <a href="{{ route('documents.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-folder2-open"></i>
                                <p>Mes documents</p>
                            </a>
                        </li>

                        @if(auth()->user()->role==='admin')
                        <li class="nav-item">
                            <a href="{{ route('archives.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-archive"></i>
                                <p>Archivages</p>
                            </a>
                        </li>
                        @endif

                        <li class="nav-item">
                            <a href="{{ route('share_groups.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-people"></i>
                                <p>Groupe de partage</p>
                            </a>
                        </li>

                        @if(auth()->user()->role==='admin')
                        <li class="nav-item">
                            <a href="{{ route('histories.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-clock-history"></i>
                                <p>Historique</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-person-lines-fill"></i>
                                <p>Utilisateurs</p>
                            </a>
                        </li>
                        @endif

                        <li class="nav-item mt-auto">
                            <a href="{{ route('profile.edit') }}" class="nav-link">
                                <i class="nav-icon bi bi-gear"></i>
                                <p>Paramètres</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Main content area -->
        <main class="app-main">
            <div class="app-content-header"></div>
            <div class="app-content">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="../../dist/js/adminlte.js"></script>

    <!-- Script personnalisé pour les animations -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Amélioration des interactions sidebar
            const sidebarToggle = document.querySelector('[data-lte-toggle="sidebar"]');
            const sidebar = document.querySelector('.app-sidebar');
            
            if (sidebarToggle && sidebar) {
                sidebarToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    sidebar.classList.toggle('show');
                });
            }

            // Animation au scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            // Observer les éléments de contenu
            document.querySelectorAll('.app-content > *').forEach(el => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(20px)';
                el.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
                observer.observe(el);
            });

            // Effet de hover amélioré pour les nav-links
            document.querySelectorAll('.nav-link').forEach(link => {
                link.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateX(8px)';
                });
                
                link.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateX(0)';
                });
            });
        });
    </script>

    @stack('scripts')
</body>

</html>