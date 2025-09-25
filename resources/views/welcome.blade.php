<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - SIR</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/inter@5.0.16/index.css" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    
    <style>
        :root {
            --primary-color: #FC4E00;
            --primary-dark: #e03d00;
            --primary-light: #ff6b24;
            --secondary-color: #2c3e50;
            --success-color: #27ae60;
            --danger-color: #e74c3c;
            --warning-color: #f39c12;
            --light-bg: #f8fafc;
            --white: #ffffff;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-800: #1f2937;
            --gray-900: #111827;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --border-radius: 12px;
            --border-radius-lg: 16px;
            --border-radius-xl: 20px;
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
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .left-column::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                radial-circle at 25% 25%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-circle at 75% 75%, rgba(255, 255, 255, 0.08) 0%, transparent 50%),
                radial-circle at 50% 50%, rgba(255, 255, 255, 0.05) 0%, transparent 70%);
            pointer-events: none;
        }

        .left-column::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            pointer-events: none;
        }

        .logo-container {
            position: relative;
            z-index: 2;
            text-align: center;
            padding: 2rem;
        }

        .logo-container img {
            filter: brightness(0) invert(1);
            transition: var(--transition);
            max-width: 320px;
            height: auto;
            drop-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .logo-container img:hover {
            transform: scale(1.02);
        }

        /* Colonne droite - Formulaire */
        .right-column {
            background-color: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            position: relative;
            padding: 2rem;
        }

        .right-column::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 150px;
            height: 150px;
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
            width: 200px;
            height: 200px;
            background: rgba(252, 78, 0, 0.02);
            border-radius: 50%;
            transform: translate(-50%, 50%);
            pointer-events: none;
        }

        /* Formulaire amélioré */
        .login-form-container {
            background: var(--white);
            /* border-radius: var(--border-radius-xl); */
            padding: 3rem;
            /* box-shadow: var(--shadow-xl); */
            /* border: 1px solid rgba(252, 78, 0, 0.1); */
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 450px;
            /* backdrop-filter: blur(10px); */
        }

        .login-form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--primary-color);
            border-radius: var(--border-radius-xl) var(--border-radius-xl) 0 0;
        }

        .form-title {
            color: var(--gray-800);
            font-weight: 700;
            font-size: 2.25rem;
            margin-bottom: 0.5rem;
            text-align: center;
        }

        .form-subtitle {
            color: var(--gray-500);
            font-size: 1rem;
            text-align: center;
            margin-bottom: 2.5rem;
        }

        /* Champs de formulaire améliorés */
        .form-floating {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .form-control {
            background-color: var(--gray-50);
            border: 2px solid var(--gray-200);
            border-radius: var(--border-radius);
            padding: 1rem 1.25rem;
            font-size: 1rem;
            transition: var(--transition);
            height: auto;
        }

        .form-control:focus {
            background-color: var(--white);
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(252, 78, 0, 0.1);
            outline: none;
        }

        .form-control:hover:not(:focus) {
            border-color: var(--gray-300);
        }

        .form-label {
            color: var(--gray-700);
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }

        .input-group {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-400);
            z-index: 2;
            font-size: 1.1rem;
        }

        .form-control.with-icon {
            padding-left: 3rem;
        }

        /* Cases à cocher personnalisées */
        .form-check {
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
        }

        .form-check-input {
            width: 1.2rem;
            height: 1.2rem;
            margin-top: 0;
            margin-right: 0.75rem;
            border: 2px solid var(--gray-300);
            border-radius: 4px;
            transition: var(--transition);
        }

        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .form-check-input:focus {
            box-shadow: 0 0 0 3px rgba(252, 78, 0, 0.1);
        }

        .form-check-label {
            color: var(--gray-600);
            font-size: 0.95rem;
            cursor: pointer;
        }

        /* Bouton de connexion amélioré */
        .btn-login {
            background-color: var(--primary-color);
            border: none;
            color: white;
            font-weight: 600;
            padding: 1rem 2rem;
            border-radius: var(--border-radius);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            width: 100%;
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: var(--transition);
        }

        .btn-login:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .btn-login:active {
            transform: translateY(0);
        }

        /* États de loading */
        .btn-login.loading {
            pointer-events: none;
            position: relative;
        }

        .btn-login.loading::after {
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

        /* Alertes améliorées */
        .alert {
            border-radius: var(--border-radius);
            border: none;
            font-weight: 500;
            margin-bottom: 1.5rem;
        }

        .alert-danger {
            background-color: rgba(231, 76, 60, 0.1);
            color: var(--danger-color);
            border-left: 4px solid var(--danger-color);
        }

        .alert ul {
            margin: 0;
            padding-left: 1.25rem;
        }

        .alert li {
            margin-bottom: 0.25rem;
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

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .logo-container {
            animation: slideInFromLeft 0.8s ease-out;
        }

        .login-form-container {
            animation: scaleIn 0.6s ease-out 0.2s;
            animation-fill-mode: both;
        }

        .form-control {
            animation: fadeInUp 0.4s ease-out;
            animation-fill-mode: both;
        }

        .form-control:nth-child(1) { animation-delay: 0.1s; }
        .form-control:nth-child(2) { animation-delay: 0.2s; }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hidden-on-mobile {
                display: none !important;
            }
            
            .right-column {
                padding: 1rem;
                min-height: 100vh;
            }
            
            .login-form-container {
                padding: 2rem 1.5rem;
                box-shadow: none;
                border: none;
                border-radius: 0;
            }
            
            .form-title {
                font-size: 2rem;
            }
        }

        @media (min-width: 1200px) {
            .login-form-container {
                padding: 4rem;
                max-width: 500px;
            }
        }

        /* Focus states pour l'accessibilité */
        .btn-login:focus {
            outline: 3px solid rgba(252, 78, 0, 0.3);
            outline-offset: 2px;
        }

        /* Indicateur de force du mot de passe */
        .password-strength {
            height: 4px;
            background: var(--gray-200);
            border-radius: 2px;
            margin-top: 0.5rem;
            overflow: hidden;
        }

        .password-strength-bar {
            height: 100%;
            transition: var(--transition);
            border-radius: 2px;
        }

        .strength-weak { background: var(--danger-color); width: 33%; }
        .strength-medium { background: var(--warning-color); width: 66%; }
        .strength-strong { background: var(--success-color); width: 100%; }

        /* Effets de particules subtils */
        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(255, 255, 255, 0.6);
            border-radius: 50%;
            pointer-events: none;
        }
    </style>
</head>

<body>
    <div class="container-fluid vh-100">
        <div class="row h-100">
            <!-- Colonne gauche : Logo -->
            <div class="col-md-6 left-column hidden-on-mobile">
                <div class="logo-container">
                    <img src="{{asset('Logo-SIR.svg')}}" style="width:350px;" alt="Logo SIR" / >
                </div>
            </div>

            <!-- Colonne droite : Formulaire -->
            <div class="col-md-6 right-column">
                <div class="login-form-container">
                    <h1 class="form-title">Connexion</h1>
                    <p class="form-subtitle">Accédez à votre espace personnel</p>

                    <!-- Affichage des erreurs -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            <strong>Erreur de connexion</strong>
                            <ul class="mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('login.submit') }}" method="POST" id="loginForm">
                        @csrf
                        
                        <!-- Champ Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">
                                <i class="bi bi-envelope me-2"></i>
                                Adresse email
                            </label>
                            <div class="input-group">
                                <i class="bi bi-envelope input-icon"></i>
                                <input type="email" 
                                       class="form-control with-icon" 
                                       id="email" 
                                       name="email" 
                                       placeholder="votre.email@exemple.com" 
                                       value="{{ old('email') }}" 
                                       required
                                       autocomplete="email">
                            </div>
                        </div>

                        <!-- Champ Mot de passe -->
                        <div class="mb-3">
                            <label for="password" class="form-label">
                                <i class="bi bi-lock me-2"></i>
                                Mot de passe
                            </label>
                            <div class="input-group">
                                <i class="bi bi-lock input-icon"></i>
                                <input type="password" 
                                       class="form-control with-icon" 
                                       id="password" 
                                       name="password" 
                                       placeholder="••••••••" 
                                       required
                                       autocomplete="current-password">
                            </div>
                        </div>

                        <!-- Case à cocher -->
                        <div class="form-check">
                            <input type="checkbox" 
                                   class="form-check-input" 
                                   id="rememberMe" 
                                   name="remember">
                            <label class="form-check-label" for="rememberMe">
                                Se souvenir de moi
                            </label>
                        </div>

                        <!-- Bouton de connexion -->
                        <button type="submit" class="btn btn-login" id="submitBtn">
                            <span class="btn-text">
                                <i class="bi bi-box-arrow-in-right me-2"></i>
                                Se connecter
                            </span>
                        </button>
                    </form>

                    <!-- Lien mot de passe oublié (optionnel) -->
                    <div class="text-center mt-4">
                        <a href="#" class="text-decoration-none" style="color: var(--primary-color);">
                            <i class="bi bi-question-circle me-1"></i>
                            Mot de passe oublié ?
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('loginForm');
            const submitBtn = document.getElementById('submitBtn');
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');

            // Animation des champs au focus
            [emailInput, passwordInput].forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentNode.style.transform = 'scale(1.02)';
                    this.parentNode.style.transition = 'transform 0.2s ease';
                });

                input.addEventListener('blur', function() {
                    this.parentNode.style.transform = 'scale(1)';
                });

                // Animation de typing
                input.addEventListener('input', function() {
                    if (this.value.length > 0) {
                        this.style.borderColor = 'var(--primary-color)';
                        this.style.backgroundColor = 'var(--white)';
                    } else {
                        this.style.borderColor = 'var(--gray-200)';
                        this.style.backgroundColor = 'var(--gray-50)';
                    }
                });
            });

            // Gestion de la soumission du formulaire
            form.addEventListener('submit', function(e) {
                // Ajouter l'état de loading
                submitBtn.classList.add('loading');
                submitBtn.disabled = true;

                // Animation du bouton
                setTimeout(() => {
                    submitBtn.style.transform = 'scale(0.98)';
                }, 100);

                // Si tout est OK, le formulaire se soumet normalement
                // Sinon, retirer le loading après un délai
                setTimeout(() => {
                    if (!form.checkValidity()) {
                        submitBtn.classList.remove('loading');
                        submitBtn.disabled = false;
                        submitBtn.style.transform = 'scale(1)';
                    }
                }, 2000);
            });

            // Animation des erreurs
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach((alert, index) => {
                alert.style.animation = `fadeInUp 0.5s ease-out ${index * 0.1}s both`;
            });

            // Validation en temps réel
            function validateEmail(email) {
                const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return re.test(email);
            }

            emailInput.addEventListener('blur', function() {
                if (this.value && !validateEmail(this.value)) {
                    this.style.borderColor = 'var(--danger-color)';
                    this.style.backgroundColor = 'rgba(231, 76, 60, 0.05)';
                } else if (this.value) {
                    this.style.borderColor = 'var(--success-color)';
                    this.style.backgroundColor = 'rgba(39, 174, 96, 0.05)';
                }
            });

            // Effet de parallaxe subtil au scroll (si contenu long)
            window.addEventListener('scroll', function() {
                const scrolled = window.pageYOffset;
                const rate = scrolled * -0.5;
                
                const leftColumn = document.querySelector('.left-column');
                if (leftColumn) {
                    leftColumn.style.transform = `translateY(${rate}px)`;
                }
            });

            // Animation d'entrée progressive des éléments
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, { threshold: 0.1 });

            // Observer les éléments du formulaire
            document.querySelectorAll('.form-control, .btn-login').forEach(el => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(20px)';
                el.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
                observer.observe(el);
            });
        });
    </script>
</body>
</html>