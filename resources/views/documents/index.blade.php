@extends('layouts.app')

@section('title', 'Mes Documents')

@push('styles')
<style>
    :root {
        --primary-color: #FC4E00;
        --secondary-color: #01C96F;
        --accent-color: #FFE5D6;
        --background-color: #f8f9fa;
        --card-bg: #ffffff;
        --text-primary: #2c3e50;
        --text-secondary: #6c757d;
        --border-light: #e9ecef;
        --shadow-light: 0 2px 8px rgba(0, 0, 0, 0.08);
        --shadow-medium: 0 4px 16px rgba(0, 0, 0, 0.12);
        --shadow-heavy: 0 8px 32px rgba(0, 0, 0, 0.16);
        --transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        --border-radius: 12px;
        --border-radius-lg: 20px;
    }
    
    body {
        background-color: #fafbfc;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }
    
    .main-container {
        background: #ffffff;
        border: 1px solid var(--border-light);
        border-radius: var(--border-radius-lg);
        padding: 2rem;
        margin: 1rem 0;
        position: relative;
        overflow: hidden;
    }
    
    .main-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--primary-color);
        border-radius: var(--border-radius-lg) var(--border-radius-lg) 0 0;
    }

    .page-header {
        background:black;
        /* border: 2px solid var(--primary-color); */
        border-radius: var(--border-radius);
        padding: 1.5rem 2rem;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }
    
    .page-header::after {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 100px;
        height: 200%;
        background: rgba(252, 78, 0, 0.1);
        transform: rotate(15deg);
        border-radius: 50px;
    }

    .search-container {
        background: #ffffff;
        border: 2px solid var(--border-light);
        border-radius: var(--border-radius);
        padding: 1.5rem;
        margin-bottom: 2rem;
        box-shadow: var(--shadow-light);
        transition: var(--transition);
    }
    
    .search-container:hover {
        border-color: var(--primary-color);
        transform: translateY(-2px);
        box-shadow: var(--shadow-medium);
    }

    .filters-container {
        background: #ffffff;
        border: 1px solid var(--border-light);
        border-radius: var(--border-radius);
        padding: 1.5rem;
        margin-bottom: 2rem;
        box-shadow: var(--shadow-light);
    }

    .upload-box {
        border: 3px dashed var(--primary-color);
        border-radius: var(--border-radius);
        padding: 3rem 2rem;
        text-align: center;
        background: var(--accent-color);
        cursor: pointer;
        transition: var(--transition);
        position: relative;
        overflow: hidden;
    }

    .upload-box::before {
        content: '';
        position: absolute;
        top: 10px;
        right: 10px;
        width: 60px;
        height: 60px;
        background: rgba(252, 78, 0, 0.1);
        border-radius: 50%;
        animation: float 3s ease-in-out infinite;
    }

    .upload-box:hover {
        background: #ffffff;
        border-color: var(--secondary-color);
        transform: translateY(-5px);
        box-shadow: var(--shadow-heavy);
    }

    .upload-box p {
        margin: 0;
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--primary-color);
        transition: var(--transition);
    }

    .upload-box:hover p {
        color: var(--secondary-color);
    }

    .upload-box input[type="file"] {
        display: none;
    }

    .badge-status {
        padding: 8px 16px;
        border-radius: 25px;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        box-shadow: var(--shadow-light);
        transition: var(--transition);
        text-transform: uppercase;
    }

    .badge-success {
        background: #10b981;
        color: white;
    }

    .badge-danger {
        background: #ef4444;
        color: white;
    }

    .badge-warning {
        background: #f59e0b;
        color: white;
    }

    .badge-info {
        background: #3b82f6;
        color: white;
    }

    .badge-secondary {
        background: #6b7280;
        color: white;
    }

    .card-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 1.5rem;
        margin-top: 1rem;
    }

    .card {
        border: none;
        border-radius: var(--border-radius);
        overflow: hidden;
        transition: var(--transition);
        box-shadow: var(--shadow-light);
        background: #ffffff;
        position: relative;
    }

    .card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: var(--primary-color);
        opacity: 0;
        transition: var(--transition);
    }

    .card:hover::before {
        opacity: 1;
    }

    .card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-heavy);
    }

    .card-body {
        padding: 2rem;
        position: relative;
    }

    .custom-card {
        border: 2px solid transparent;
        border-radius: var(--border-radius);
        background: #ffffff;
        transition: var(--transition);
        position: relative;
        overflow: hidden;
    }

    .custom-card::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: var(--primary-color);
        transform: scaleX(0);
        transition: var(--transition);
    }

    .custom-card:hover::after {
        transform: scaleX(1);
    }

    .custom-card:hover {
        border-color: var(--primary-color);
        background: var(--accent-color);
    }

    .card-actions {
        position: absolute;
        top: 1rem;
        right: 1rem;
        display: flex;
        gap: 0.5rem;
        opacity: 0;
        transition: var(--transition);
    }

    .card:hover .card-actions {
        opacity: 1;
    }

    .card-actions a,
    .card-actions button {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.9);
        border: 1px solid var(--border-light);
        transition: var(--transition);
        backdrop-filter: blur(10px);
    }

    .card-actions a:hover,
    .card-actions button:hover {
        background: var(--primary-color);
        color: white !important;
        transform: scale(1.1);
    }

    .card-title {
        font-size: 1.25rem;
        color: var(--text-primary);
        font-weight: 700;
        margin-bottom: 1rem;
        line-height: 1.3;
    }

    .card-text {
        font-size: 0.875rem;
        color: var(--text-secondary);
        line-height: 1.5;
        margin-bottom: 1rem;
    }

    .card-icon {
        background: var(--accent-color);
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        transition: var(--transition);
    }

    .card:hover .card-icon {
        background: var(--primary-color);
        transform: scale(1.1) rotate(5deg);
    }

    .card:hover .card-icon i {
        color: white !important;
    }

    .btn {
        transition: var(--transition);
        border-radius: 25px;
        padding: 8px 20px;
        font-weight: 600;
        font-size: 0.875rem;
        border: 2px solid transparent;
        position: relative;
        overflow: hidden;
    }

    .btn::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        transition: var(--transition);
    }

    .btn:hover::before {
        width: 300px;
        height: 300px;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-medium);
    }
    
    .btn-success {
        background: var(--primary-color);
        border-color: var(--primary-color);
        color: white;
    }

    .btn-success:hover {
        background: var(--secondary-color);
        border-color: var(--secondary-color);
    }
    
    .form-control {
        border-radius: 25px;
        padding: 12px 20px;
        border: 2px solid var(--border-light);
        transition: var(--transition);
        background: #ffffff;
        font-size: 0.9rem;
    }
    
    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(252, 78, 0, 0.1);
        background: #ffffff;
    }
    
    .rounded-pill {
        border-radius: 25px !important;
    }
    
    .alert {
        border-radius: var(--border-radius);
        border: none;
        border-left: 4px solid var(--primary-color);
        background: var(--accent-color);
        color: var(--text-primary);
        padding: 1rem 1.5rem;
        box-shadow: var(--shadow-light);
    }
    
    .status-buttons {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
        margin-top: 1rem;
    }
    
    .status-buttons .btn {
        font-size: 0.75rem;
        padding: 6px 14px;
        border-radius: 15px;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }
    
    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .card {
        animation: slideInUp 0.6s ease-out forwards;
        animation-fill-mode: both;
    }
    
    .card:nth-child(odd) { animation-delay: 0.1s; }
    .card:nth-child(even) { animation-delay: 0.2s; }
    
    .filter-btn-group {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
    }
    
    .filter-btn-group .btn {
        font-size: 0.8rem;
        padding: 8px 16px;
        border-radius: 20px;
        border: 2px solid var(--border-light);
        background: #ffffff;
        color: var(--text-secondary);
        transition: var(--transition);
    }
    
    .filter-btn-group .btn:hover,
    .filter-btn-group .btn.active {
        background: var(--primary-color);
        border-color: var(--primary-color);
        color: white;
        transform: translateY(-2px);
    }
    
    .page-title {
        color: var(--text-primary);
        font-weight: 700;
        font-size: 2rem;
        margin-bottom: 0.5rem;
    }
    
    .page-subtitle {
        color: var(--text-secondary);
        font-size: 1rem;
        margin-bottom: 0;
    }
    
    .section-title {
        color: var(--text-primary);
        font-weight: 600;
        font-size: 1.1rem;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .section-title i {
        color: var(--primary-color);
    }
    
    .input-group-custom {
        display: flex;
        gap: 0.75rem;
        align-items: center;
        margin-top: 1rem;
    }
    
    .search-input {
        flex: 1;
    }
    
    @media (max-width: 768px) {
        .card-container {
            grid-template-columns: 1fr;
        }
        
        .filter-btn-group {
            justify-content: center;
        }
        
        .input-group-custom {
            flex-direction: column;
            align-items: stretch;
        }
    }
</style>
@endpush

@section('content')
<div class="main-container">
    <!-- En-tête de page -->
    <div class="page-header">
        <h1 class="page-title text-white">
            <i class="bi bi-folder-symlink-fill me-3 text-white"></i>
            Gestion des Documents
        </h1>
        <p class="page-subtitle text-white">Organisez, partagez et gérez vos documents en toute simplicité</p>
    </div>

    <!-- Barre de recherche -->
    <div class="search-container">
        <form method="GET" action="{{ url()->current() }}">
            <div class="section-title">
                <i class="bi bi-search"></i>
                Rechercher un document
            </div>
            <div class="input-group-custom">
                <input type="text" name="search" class="form-control search-input"
                       placeholder="🔎 Tapez le nom du document, type, ou créateur..." 
                       value="{{ request('search') }}">
                <button type="submit" class="btn btn-dark rounded-pill px-4">
                    <i class="bi bi-search me-2"></i>Rechercher
                </button>
                <a href="{{ route('documents.create') }}" class="btn btn-success rounded-pill px-4">
                    <i class="bi bi-cloud-upload-fill me-2"></i>Nouveau Document
                </a>
            </div>
        </form>
    </div>

    <!-- Filtres -->
    <div class="filters-container">
        <div class="section-title">
            <i class="bi bi-funnel"></i>
            Filtrer par statut
        </div>
        <div class="filter-btn-group">
            <a href="{{ route('archives.index') }}" class="btn">
                <i class="bi bi-files me-1"></i> Tous
            </a>
            <a href="{{ route('documents.added') }}" class="btn">
                <i class="bi bi-plus-circle me-1"></i> Ajoutés
            </a>
            <a href="{{ route('documents.pending') }}" class="btn">
                <i class="bi bi-clock me-1"></i> En Attente
            </a>
            <a href="{{ route('documents.submitted') }}" class="btn">
                <i class="bi bi-send me-1"></i> Soumis
            </a>
            <a href="{{ route('documents.validated') }}" class="btn">
                <i class="bi bi-check-circle me-1"></i> Validés
            </a>
            <a href="{{ route('documents.rejected') }}" class="btn">
                <i class="bi bi-x-circle me-1"></i> Rejetés
            </a>
            <a href="{{ route('documents.sharedWithMe') }}" class="btn">
                <i class="bi bi-share me-1"></i> Partagés avec moi
            </a>
            <a href="{{ route('documents.sharedByMe') }}" class="btn">
                <i class="bi bi-arrow-up-right me-1"></i> Partagés par moi
            </a>
        </div>
    </div>

    <!-- Message de succès -->
    @if(session('success'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
        </div>
    @endif

    <!-- Grille des documents -->
    <div class="card-container">
        @foreach($documents as $document)
            <div class="card">
                <div class="card-body custom-card">
                    <!-- Actions -->
                    <div class="card-actions">
                        <a href="{{ route('documents.show', $document->id) }}" class="btn btn-sm" title="Voir">
                            <i class="bi bi-eye" style="color: #6c757d;"></i>
                        </a>
                        <a href="{{ route('documents.edit', $document->id) }}" class="btn btn-sm" title="Modifier">
                            <i class="bi bi-pencil" style="color: #6c757d;"></i>
                        </a>
                        <a href="{{ asset('storage/' . $document->file_url) }}" class="btn btn-sm" download target="blank" title="Télécharger">
                            <i class="bi bi-download" style="color: #6c757d;"></i>
                        </a>
                        <form action="{{ route('documents.destroy', $document->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm" title="Supprimer"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce document ?')">
                                <i class="bi bi-trash" style="color: #ef4444;"></i>
                            </button>
                        </form>
                    </div>

                    <!-- Icône du document -->
                    <div class="card-icon">
                        @switch($document->type_doc)
                            @case('document')
                                <i class="bi bi-file-earmark" style="font-size: 2rem; color: var(--primary-color);"></i>
                                @break
                            @case('image')
                                <i class="bi bi-file-earmark-image" style="font-size: 2rem; color: var(--primary-color);"></i>
                                @break
                            @case('tableaux')
                                <i class="bi bi-file-earmark-spreadsheet" style="font-size: 2rem; color: var(--primary-color);"></i>
                                @break
                            @case('video')
                                <i class="bi bi-file-earmark-play" style="font-size: 2rem; color: var(--primary-color);"></i>
                                @break
                            @case('pdf')
                                <i class="bi bi-file-earmark-pdf" style="font-size: 2rem; color: var(--primary-color);"></i>
                                @break
                            @default
                                <i class="bi bi-file-earmark" style="font-size: 2rem; color: var(--primary-color);"></i>
                        @endswitch
                    </div>

                    <!-- Contenu -->
                    <h3 class="card-title">{{ $document->nom ?? $document->document->nom }}</h3>
                    <p class="card-text">
                        <strong>Type de partage:</strong> {{ $document->type_share }}<br>
                        <strong>Ajouté le:</strong> {{ $document->created_at->format('d/m/Y à H:i') }}<br>
                        <strong>Par:</strong> {{ optional($document->creator)->nom ?? 'Moi' }}
                    </p>
                    
                    <!-- Badge de statut -->
                    <div class="mb-3">
                        <span class="badge-status @if($document->status ?? $document->document->status == 'validé') badge-success
                            @elseif($document->status ?? $document->document->status == 'rejeté') badge-danger
                            @elseif($document->status ?? $document->document->status == 'en attente') badge-secondary
                            @elseif($document->status ?? $document->document->status == 'ajouté') badge-warning
                            @elseif($document->status ?? $document->document->status == 'soumis') badge-info
                            @else badge-secondary @endif">
                            {{ $document->status ?? $document->document->status }}
                        </span>
                    </div>

                    <!-- Boutons d'action selon le statut -->
                    <div class="status-buttons">
                        @if($document->status == 'ajouté')
                            <form action="{{ route('documents.updateStatus', $document->id) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" name="status" value="en attente" class="btn btn-secondary">
                                    <i class="bi bi-send me-1"></i>Soumettre
                                </button>
                            </form>
                        @endif
                        
                        @if(auth()->user()->role === 'manager' && $document->status == 'en attente')
                            <form action="{{ route('documents.updateStatus', $document->id) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" name="status" value="soumis" class="btn btn-success">
                                    <i class="bi bi-check me-1"></i>Valider
                                </button>
                            </form>
                            <form action="{{ route('documents.updateStatus', $document->id) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" name="status" value="rejeté" class="btn btn-danger">
                                    <i class="bi bi-x me-1"></i>Rejeter
                                </button>
                            </form>
                        @endif
                        
                        @if(auth()->user()->role === 'admin' && $document->status == 'soumis')
                            <form action="{{ route('documents.updateStatus', $document->id) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" name="status" value="validé" class="btn btn-success">
                                    <i class="bi bi-check-circle me-1"></i>Valider
                                </button>
                            </form>
                            <form action="{{ route('documents.updateStatus', $document->id) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" name="status" value="rejeté" class="btn btn-danger">
                                    <i class="bi bi-x-circle me-1"></i>Rejeter
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {!! $documents->links() !!}
    </div>
</div>
@endsection

@push('styles')
<link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.1.8/b-3.2.0/b-colvis-3.2.0/b-html5-3.2.0/b-print-3.2.0/r-3.0.3/datatables.min.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.1.8/b-3.2.0/b-colvis-3.2.0/b-html5-3.2.0/b-print-3.2.0/r-3.0.3/datatables.min.js"></script>
@endpush