@extends('layouts.apprh')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-9">
    <h1>Liste des Demandes d'Absence</h1> </div>
    @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    <div  class="col-md-3">
    @php
                        $permission = Auth::user()->permissionrh ?? null;
                        @endphp

    @if(in_array($permission, ['demandeur', 'superieur','valideur']))
    <a href="{{ route('demandes_absence.create') }}" class="btn btn-success">Nouvelle Demande</a>
    @endif
    </div>    </div>
<br>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card custom-card">
        <div class="card-body">
            <table id="Table" class="table table-bordered table-striped">
                <thead class="table-success">
            <tr>
                <th>#</th>
                <th>Matricule</th>
                <th>Poste</th>
                <th>Jours</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($demandes as $demande)
            <tr>
                <td>{{ $demande->id }}</td>
                <td>{{ $demande->user->matricule }}</td>
                <td>{{ $demande->user->fonction }}</td>
                <td>{{ $demande->nombre_jours }}</td>
                <td>
                    @if($demande->validation_superieur)
                        <span class="text-success">Validée</span>
                    @else
                        <span class="text-danger">Non validée</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('demandes_absence.show', $demande->id) }}" class="btn btn-info btn-sm">Voir</a>
                    <a href="{{ route('demandes_absence.edit', $demande->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                    @if(in_array($permission, ['rh', 'superieur','valideur']))
                    <form action="{{ route('demandes_absence.validate', $demande->id) }}" method="POST" style="display:inline;">
    @csrf
    <button type="submit" class="btn btn-success btn-sm">Valider</button>
</form>

<form action="{{ route('demandes_absence.reject', $demande->id) }}" method="POST" style="display:inline;">
    @csrf
    <button type="submit" class="btn btn-danger btn-sm">Rejeter</button>
</form>@endif

                    <form action="{{ route('demandes_absence.destroy', $demande->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
</div>
<style>
    .custom-card {
        border: 2px dashed #FC4E00; /* Bordure avec traits */
        border-radius: 8px; /* Coins arrondis */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Légère ombre */
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .custom-card:hover {
        transform: translateY(-5px); /* Animation au survol */
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2); /* Ombre plus marquée */
    }

    .table-bordered th, .table-bordered td {
        border: 1px dashed #ddd; /* Bordure en traits pour le tableau */
    }

    .btn-success {
        background-color: #FC4E00;
        border-color: #FC4E00;
    }

    .btn-success:hover {
        background-color: #026838;
        border-color: #026838;
    }
</style>
@endsection


@push('styles')
<link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.1.8/b-3.2.0/b-colvis-3.2.0/b-html5-3.2.0/b-print-3.2.0/r-3.0.3/datatables.min.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.1.8/b-3.2.0/b-colvis-3.2.0/b-html5-3.2.0/b-print-3.2.0/r-3.0.3/datatables.min.js"></script>
<script>
    $(document).ready(function () {
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


