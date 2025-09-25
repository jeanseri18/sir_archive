@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card custom-card">
        <div class="card-body">
            <h1 class="mb-4">Créer un Groupe</h1>
            <form action="{{ route('share_groups.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom du Groupe</label>
                    <input type="text" name="nom" id="nom" class="form-control" placeholder="Entrez le nom du groupe" required>
                </div>
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-check-circle me-2"></i>Créer
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Styles personnalisés -->
<style>
    :root {
        --primary-color: #FC4E00;
        --secondary-color: #5E8868;
        --bg-color: #FFFFFF;
        --card-bg: rgba(255, 255, 255, 0.95);
        --text-primary: #1A202C;
        --text-secondary: #6B7280;
        --shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    body {
        background: var(--bg-color);
        font-family: 'Inter', sans-serif;
        color: var(--text-primary);
        position: relative;
        overflow-x: hidden;
    }

    /* Subtle radial-circle background pattern */
    .container {
        position: relative;
        z-index: 1;
        padding: 2rem;
    }

    .container::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at 10% 20%, rgba(252, 78, 0, 0.1) 0%, transparent 20%),
                    radial-gradient(circle at 90% 80%, rgba(94, 136, 104, 0.1) 0%, transparent 20%);
        z-index: -1;
        opacity: 0.5;
    }

    .custom-card {
        background: var(--card-bg);
        border: 2px solid var(--primary-color);
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: var(--shadow);
        transition: var(--transition);
        backdrop-filter: blur(10px);
        position: relative;
        overflow: hidden;
    }

    .custom-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.15);
    }

    .btn-success {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .btn-success:hover {
        background-color: var(--secondary-color);
        border-color: var(--secondary-color);
    }

    .form-label {
        font-weight: 600;
        color: var(--text-primary);
    }

    .form-control {
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        padding: 0.75rem 1rem;
        transition: var(--transition);
    }

    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(252, 78, 0, 0.2);
    }

    /* Animations */
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .card, .custom-card, .form-control, .btn {
        animation: slideIn 0.5s ease-out forwards;
    }
</style>
@endsection

