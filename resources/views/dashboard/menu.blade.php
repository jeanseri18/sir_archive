<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sélection de Session</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/inter@5.0.16/index.css" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    
    <style>
        :root {
            --primary-color: #FC4E00;
            --primary-dark: #e03d00;
            --primary-light: #ff6b24;
            --success-color: #27ae60;
            --dark-color: #2c3e50;
            --light-bg: #f8fafc;
            --white: #ffffff;
            --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.08);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --border-radius: 16px;
            --border-radius-lg: 24px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }

        body {
            background-color: var(--white) !important;
            min-height: 100vh;
            overflow-x: hidden;
        }

        .container-fluid {
            background-color: var(--white);
            position: relative;
        }

        /* Colonne gauche améliorée */
        .left-column {
            background-color: var(--primary-color) !important;
            position: relative;
            overflow: hidden;
            min-height: 100vh;
        }

        .left-column::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                radial-circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-circle at 80% 20%, rgba(255, 255, 255, 0.08) 0%, transparent 50%),
                radial-circle at 40% 80%, rgba(255, 255, 255, 0.05) 0%, transparent 50%);
            pointer-events: none;
        }

        .logo-container {
            position: relative;
            z-index: 2;
            padding: 3rem 2rem;
            text-align: center;
        }

        .logo-container img {
            filter: brightness(0) invert(1);
            transition: var(--transition);
            max-width: 280px;
            height: auto;
        }

        .logo-container img:hover {
            transform: scale(1.02);
        }

        .logout-container {
            position: absolute;
            bottom: 3rem;
            left: 2rem;
            right: 2rem;
            z-index: 2;
        }

        /* Colonne droite améliorée */
        .right-column {
            background-color: var(--white);
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            min-height: 100vh;
            position: relative;
        }

        .right-column::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 200px;
            height: 200px;
            background: rgba(252, 78, 0, 0.03);
            border-radius: 50%;
            transform: translate(50%, -50%);
            pointer-events: none;
        }

        .right-column::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 150px;
            height: 150px;
            background: rgba(252, 78, 0, 0.02);
            border-radius: 50%;
            transform: translate(-50%, 50%);
            pointer-events: none;
        }

        /* Titre principal */
        .main-title {
            color: var(--dark-color);
            font-weight: 700;
            font-size: 2rem;
            margin-bottom: 3rem;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .main-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background-color: var(--primary-color);
            border-radius: 2px;
        }

        /* Cards améliorées */
        .session-card {
            background: var(--white);
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-md);
            border: 1px solid rgba(252, 78, 0, 0.1);
            transition: var(--transition);
            overflow: hidden;
            position: relative;
        }

        .session-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--success-color);
            transform: scaleX(0);
            transition: var(--transition);
            transform-origin: left;
        }

        .session-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
            border-color: rgba(252, 78, 0, 0.2);
        }

        .session-card:hover::before {
            transform: scaleX(1);
        }

        .session-card .card-body {
            padding: 3rem 2rem;
            text-align: center;
            position: relative;
        }

        .session-icon {
            font-size: 4rem !important;
            color: var(--success-color);
            margin-bottom: 1.5rem;
            transition: var(--transition);
        }

        .session-card:hover .session-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .session-title {
            color: var(--dark-color);
            font-weight: 600;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }

        /* Boutons améliorés */
        .btn-session {
            background-color: var(--success-color);
            border: none;
            color: white;
            font-weight: 600;
            padding: 1rem 2rem;
            border-radius: var(--border-radius);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.9rem;
        }

        .btn-session::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: var(--transition);
        }

        .btn-session:hover {
            background-color: #229954;
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-session:hover::before {
            left: 100%;
        }

        .btn-logout {
            background-color: var(--dark-color);
            border: none;
            color: white;
            font-weight: 600;
            padding: 1rem;
            border-radius: var(--border-radius);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .btn-logout::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            transition: var(--transition);
        }

        .btn-logout:hover {
            background-color: #34495e;
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-logout:hover::before {
            left: 100%;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInFromLeft {
            from {
                opacity: 0;
                transform: translateX(-100px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .logo-container {
            animation: slideInFromLeft 0.8s ease-out;
        }

        .main-title {
            animation: fadeInUp 0.6s ease-out 0.2s;
            animation-fill-mode: both;
        }

        .session-card {
            animation: fadeInUp 0.6s ease-out 0.4s;
            animation-fill-mode: both;
        }

        .logout-container {
            animation: fadeInLeft 0.6s ease-out 0.6s;
            animation-fill-mode: both;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hidden-on-mobile {
                display: none !important;
            }
            
            .right-column {
                padding: 1.5rem;
                min-height: 100vh;
            }
            
            .main-title {
                font-size: 1.75rem;
                margin-bottom: 2rem;
            }
            
            .session-card .card-body {
                padding: 2rem 1.5rem;
            }
            
            .session-icon {
                font-size: 3rem !important;
            }
            
            .mobile-logout {
                margin-top: 3rem;
                position: relative;
                z-index: 1;
            }
        }

        @media (min-width: 768px) {
            .mobile-logout {
                display: none !important;
            }
        }

        /* Focus states for accessibility */
        .btn-session:focus,
        .btn-logout:focus {
            outline: 3px solid rgba(252, 78, 0, 0.3);
            outline-offset: 2px;
        }

        /* Loading state */
        .loading {
            position: relative;
            pointer-events: none;
        }

        .loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 20px;
            margin: -10px 0 0 -10px;
            border: 2px solid transparent;
            border-top: 2px solid currentColor;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Subtle hover effect on the entire container */
        .session-card:hover .session-title {
            color: var(--success-color);
        }

        /* Enhanced visual hierarchy */
        .content-container {
            position: relative;
            z-index: 1;
        }
    </style>
</head>

<body>
    <div class="container-fluid vh-100">
        <div class="row h-100">
            <!-- Colonne gauche : Logo et déconnexion -->
            <div class="col-md-6 left-column d-flex flex-column hidden-on-mobile">
                <div class="logo-container flex-grow-1 d-flex align-items-center justify-content-center">
                    <img src="{{asset('Logo-SIR.svg')}}" alt="Logo SIR" />
                </div>
                
                <div class="logout-container">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-logout w-100">
                            <i class="bi bi-box-arrow-right me-2"></i>
                            Déconnexion
                        </button>
                    </form>
                </div>
            </div>

            <!-- Colonne droite : Sélection de session -->
            <div class="col-md-6 right-column">
                <div class="content-container">
                    <h1 class="main-title">
                        Choisissez une session pour démarrer
                    </h1>

                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <!-- Gestion des documents -->
                            <div class="session-card mb-4">
                                <div class="card-body">
                                    <i class="bi bi-folder-fill session-icon"></i>
                                    <h3 class="session-title">Gestion des documents</h3>
                                    <p class="text-muted mb-4">
                                        Accédez à votre espace de gestion documentaire pour organiser, 
                                        partager et archiver vos fichiers en toute sécurité.
                                    </p>
                                    <a href="{{ route('dashboard') }}" class="btn btn-session">
                                        <i class="bi bi-arrow-right me-2"></i>
                                        Accéder au système
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bouton de déconnexion pour mobile -->
                    <div class="mobile-logout d-md-none">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-logout w-100">
                                <i class="bi bi-box-arrow-right me-2"></i>
                                Déconnexion
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animation au scroll pour les éléments
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

            // Effet de click avec feedback visuel
            document.querySelectorAll('.btn').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    // Ajouter classe de loading
                    this.classList.add('loading');
                    
                    // Retirer après un délai pour permettre la navigation
                    setTimeout(() => {
                        this.classList.remove('loading');
                    }, 1000);
                });
            });

            // Amélioration des interactions pour l'accessibilité
            document.querySelectorAll('.session-card').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.borderColor = 'rgba(39, 174, 96, 0.3)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.borderColor = 'rgba(252, 78, 0, 0.1)';
                });

                // Support du clavier
                card.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        const button = this.querySelector('.btn-session');
                        if (button) button.click();
                    }
                });
            });

            // Animation de chargement pour les liens
            document.querySelectorAll('a[href]').forEach(link => {
                link.addEventListener('click', function(e) {
                    if (this.href && !this.href.startsWith('#')) {
                        // Ajouter effet de chargement
                        document.body.style.cursor = 'wait';
                        
                        // Restaurer après navigation
                        setTimeout(() => {
                            document.body.style.cursor = 'default';
                        }, 500);
                    }
                });
            });
        });
    </script>
</body>
</html>