@extends('layouts.app')

@section('content')
<div class="container">
    <!-- En-tête -->
    <div class="row mb-4">
        <div class="col-md-9">
            <h1>Groupes de Partage</h1>
        </div>
        <div class="col-md-3 text-end">
            <a href="{{ route('share_groups.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle me-2"></i>Créer un Groupe
            </a>
        </div>
    </div>

    <!-- Tableau des groupes -->
    <div class="card custom-card">
        <div class="card-body">
            <table id="Table" class="table table-bordered table-striped">
                <thead class="table-success">
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($groups as $group)
                    <tr>
                        <td width=10%>{{ $group->id }}</td>
                        <td><i class="bi bi-people-fill"></i> {{ $group->nom }}</td>
                        <td width=20%>
                            <a href="{{ route('share_groups.show', $group->id) }}" class="btn btn-info btn-sm">
                                <i class="bi bi-eye me-1"></i>Détails
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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

    .table-bordered th, .table-bordered td {
        border: 1px solid rgba(0, 0, 0, 0.1);
    }

    .btn-success {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .btn-success:hover {
        background-color: var(--secondary-color);
        border-color: var(--secondary-color);
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

    .row, .card, .custom-card {
        animation: slideIn 0.5s ease-out forwards;
    }
</style>
@endsection

@push('styles')
<link
    href="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.1.8/b-3.2.0/b-colvis-3.2.0/b-html5-3.2.0/b-print-3.2.0/r-3.0.3/datatables.min.css"
    rel="stylesheet">
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script
    src="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.1.8/b-3.2.0/b-colvis-3.2.0/b-html5-3.2.0/b-print-3.2.0/r-3.0.3/datatables.min.js">
</script>
<script>
$(document).ready(function() {
    $('#Table').DataTable({
        responsive: true,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
        ],
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json"
        }
    });
});
</script>
@endpush

