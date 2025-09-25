@extends('layouts.app')

@section('title', 'Dashboard')

@push('styles')
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

    /* Floating card styles */
    .dashboard-block {
        background: var(--card-bg);
        border: 2px solid var(--primary-color);
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: var(--shadow);
        transition: var(--transition);
        backdrop-filter: blur(10px);
        display: flex;
        align-items: center;
        height: 100%;
        position: relative;
        overflow: hidden;
    }

    .dashboard-block:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.15);
    }

    .dashboard-block i {
        font-size: 2.5rem;
        color: var(--primary-color);
        margin-right: 1rem;
        transition: var(--transition);
    }

    .dashboard-block:hover i {
        transform: scale(1.1);
    }

    .dashboard-block h3, .dashboard-block h6 {
        margin: 0;
        color: var(--text-primary);
        font-weight: 600;
    }

    .dashboard-block p {
        color: var(--text-secondary);
        font-size: 0.95rem;
        margin-top: 0.5rem;
    }

    /* Quick actions section */
    .quick-action-block {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        border-radius: 12px;
        padding: 2rem;
        position: relative;
        overflow: hidden;
    }

    .quick-action-block .dashboard-block {
        background: var(--card-bg);
        border: none;
        box-shadow: var(--shadow);
    }

    .quick-action-block h4 {
        color: white;
        font-weight: 700;
        margin-bottom: 1.5rem;
    }

    /* Statistics section */
    .statistics-section .dashboard-block {
        background: var(--card-bg);
        border: 1px solid rgba(0, 0, 0, 0.1);
    }

    /* Last actions table */
    .card {
        background: var(--card-bg);
        border: none;
        border-radius: 12px;
        box-shadow: var(--shadow);
        backdrop-filter: blur(10px);
        animation: slideIn 0.5s ease-out;
    }

    .card-header {
        background: transparent;
        border-bottom: none;
        padding: 1.5rem;
    }

    .table {
        margin-bottom: 0;
    }

    .table th {
        color: var(--text-primary);
        font-weight: 600;
    }

    .table td {
        vertical-align: middle;
        color: var(--text-secondary);
    }

    .badge {
        transition: var(--transition);
    }

    .badge:hover {
        transform: scale(1.05);
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

    .dashboard-block, .quick-action-block, .card {
        animation: slideIn 0.5s ease-out forwards;
        animation-delay: calc(0.1s * var(--animation-order));
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .col-md-4, .col-md-3, .col-md-6 {
            margin-bottom: 1rem;
        }
        .container::before {
            background: radial-gradient(circle at 50% 50%, rgba(252, 78, 0, 0.1) 0%, transparent 30%);
        }
    }

    /* Accessibility */
    a:focus, button:focus, .dashboard-block:focus {
        outline: 3px solid var(--primary-color);
        outline-offset: 2px;
    }
</style>
@endpush

@section('content')
<div class="container">
    <h1 class="text-left mb-4" style="--animation-order: 1;">Tableau de Bord</h1>

    <!-- Statistics Section -->
    <div class="statistics-section mb-5">
        <h4 class="text-left mb-4" style="--animation-order: 2;">Statistiques</h4>
        <div class="row g-4">
            <div class="col-md-4" style="--animation-order: 3;">
                <div class="dashboard-block">
                    <i class="bi bi-files"></i>
                    <div>
                        <h6>Total des documents</h6>
                        <p>{{ $totalDocuments }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4" style="--animation-order: 4;">
                <div class="dashboard-block">
                    <i class="bi bi-check-circle"></i>
                    <div>
                        <h6>Documents validés</h6>
                        <p>{{ $validatedDocuments }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4" style="--animation-order: 5;">
                <div class="dashboard-block">
                    <i class="bi bi-clock-history"></i>
                    <div>
                        <h6>Documents en attente</h6>
                        <p>{{ $pendingDocuments }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="--animation-order: 6;">
                <div class="dashboard-block">
                    <i class="bi bi-x-circle"></i>
                    <div>
                        <h6>Documents rejetés</h6>
                        <p>{{ $rejectedDocuments }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="--animation-order: 7;">
                <div class="dashboard-block">
                    <i class="bi bi-archive"></i>
                    <div>
                        <h6>Documents archivés</h6>
                        <p>{{ $archivedDocuments }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions Section -->
    <div class="quick-action-block mt-5" style="--animation-order: 8;">
        <h4 class="text-left mb-4">Actions rapides</h4>
        <div class="row g-4">
            <div class="col-md-3" style="--animation-order: 9;">
                <div class="dashboard-block">
                    <a href="{{ route('documents.create') }}">
                        <i class="bi bi-upload"></i>
                        <div>
                            <h6>Ajouter un document</h6>
                            <p>Envoyez un document pour validation.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3" style="--animation-order: 10;">
                <div class="dashboard-block">
                    <a href="{{ route('documents.pending') }}">
                        <i class="bi bi-check2-square"></i>
                        <div>
                            <h6>Valider un document</h6>
                            <p>Accédez à la liste des documents en attente de votre validation</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3" style="--animation-order: 11;">
                <div class="dashboard-block">
                    <a href="{{ route('archives.index') }}">
                        <i class="bi bi-archive"></i>
                        <div>
                            <h6>Archivage</h6>
                            <p>Organisez et stockez vos documents ajoutés archivés.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3" style="--animation-order: 12;">
                <div class="dashboard-block">
                    <a href="{{ route('archives.index') }}">
                        <i class="bi bi-search"></i>
                        <div>
                            <h6>Recherche</h6>
                            <p>Recherchez un document spécifique dans votre espace.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Last Actions Section -->
    <div class="card mb-4" style="--animation-order: 13;">
        <div class="card-header">
            <h3 class="card-title">Dernières Actions</h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Action</th>
                        <th>Utilisateur</th>
                        <th>Document</th>
                        <th>Date</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentActions as $key => $action)
                    <tr class="align-middle">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $action->action }}</td>
                        <td>{{ $action->user->name }}</td>
                        <td>{{ $action->document->title }}</td>
                        <td>{{ $action->action_date->format('Y-m-d H:i:s') }}</td>
                        <td>
                            <span class="badge text-bg-{{ $action->status_class }}">
                                {{ ucfirst($action->status) }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Real-time validation and loading state simulation
    document.addEventListener('DOMContentLoaded', () => {
        const dashboardBlocks = document.querySelectorAll('.dashboard-block a');
        dashboardBlocks.forEach(block => {
            block.addEventListener('click', (e) => {
                e.preventDefault();
                const href = block.getAttribute('href');
                block.style.opacity = '0.7';
                block.innerHTML += '<div class="spinner" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); border: 3px solid #fff; border-top-color: var(--primary-color); border-radius: 50%; width: 20px; height: 20px; animation: spin 1s linear infinite;"></div>';
                
                setTimeout(() => {
                    window.location.href = href;
                }, 500);
            });
        });

        // Animation for focus states
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('focus', () => {
                input.style.transform = 'scale(1.02)';
                input.style.borderColor = 'var(--primary-color)';
            });
            input.addEventListener('blur', () => {
                input.style.transform = 'scale(1)';
                input.style.borderColor = '';
            });
        });
    });

    // Spinner animation
    const style = document.createElement('style');
    style.innerHTML = `
        @keyframes spin {
            0% { transform: translateY(-50%) rotate(0deg); }
            100% { transform: translateY(-50%) rotate(360deg); }
        }
    `;
    document.head.appendChild(style);
</script>
@endpush