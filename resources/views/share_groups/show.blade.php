@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Section Titre -->
    <div class="alert alert-success" style="--animation-order: 1;">
        <h1>{{ $group->nom }}</h1>
        <p>Gestion des membres du groupe</p>
    </div>

    <!-- Formulaire d'ajout de membres -->
    <form action="{{ route('share_groups.addMember', $group->id) }}" method="POST" class="mb-4" style="--animation-order: 2;">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="mb-3">
                    <select name="id_user" id="id_user" class="form-control" required>
                        <option value="" disabled selected>Sélectionnez un utilisateur</option>
                        @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->nom }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-success w-100">
                    <i class="bi bi-plus-circle me-2"></i>Ajouter un membre
                </button>
            </div>
        </div>
    </form>

    <!-- Liste des membres -->
    <h4 class="mb-3" style="--animation-order: 3;">Liste des membres</h4>
    <div class="row">
        @foreach($group->members as $member)
        <div class="col-md-3">
            <div class="card custom-card text-center mb-3">
                <div class="card-body">
                @if(Auth::user()->file_url)
            <img src="{{ asset('storage/' . Auth::user()->file_url) }}" 
                 alt="Photo de profil" 
                 class="rounded-circle" 
                 style="width: 150px; height: 150px; object-fit: cover;">
        @else
            <!-- Si aucune photo n'est définie, une photo par défaut -->
            <i class="bi bi-person-circle " class="rounded-circle" 

                 style="font-size: 120px;color:black"></i>
        @endif                    <h5 class="mt-3">{{ $member->nom }}</h5>
        @if(auth()->user()->id==$member->id ||$group->creator->id==auth()->user()->id  )
                    <form action="{{ route('share_groups.removeMember', [$group->id, $member->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </form>@else
                    <a href="#" class="btn btn-secondary btn-sm " readonly>
                            <i class="bi bi-trash3"></i>
</a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
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

    .alert-success {
      background:black ;        border: none;
        color: white;
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 2rem;
    }

    .btn-success {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .btn-success:hover {
        background-color: var(--secondary-color);
        border-color: var(--secondary-color);
    }

    .form-control, .form-select {
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        padding: 0.75rem 1rem;
        transition: var(--transition);
    }

    .form-control:focus, .form-select:focus {
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

    .row, .card, .custom-card, .alert {
        animation: slideIn 0.5s ease-out forwards;
        animation-delay: calc(0.1s * var(--animation-order, 1));
    }
</style>
@endsection
