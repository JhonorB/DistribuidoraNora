@extends('layouts.admin')

@section('title', 'Libro de Reclamaciones')
@section('nav_title', 'Reclamaciones y Quejas Registradas')

@section('content')
<div class="container-box">
    <h2>Listado de Hojas de Reclamaciones</h2>
    @if($claims->isEmpty())
        <p>No se han registrado reclamos o quejas en el Libro de Reclamaciones Virtual.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Consumidor</th>
                    <th>Doc. Identidad</th>
                    <th>Contacto</th>
                    <th>Tipo</th>
                    <th>Detalle / Reclamo</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach($claims as $claim)
                <tr>
                    <td>#{{ $claim->id }}</td>
                    <td>{{ $claim->fullname }}<br><small style="color: #666;">{{ $claim->address }}</small></td>
                    <td>{{ $claim->document_type }} - {{ $claim->document_number }}</td>
                    <td>{{ $claim->email }}<br>{{ $claim->phone }}</td>
                    <td>
                        <span class="badge {{ $claim->claim_type == 'reclamo' ? 'badge-danger' : 'badge-warning' }}">
                            {{ $claim->claim_type }}
                        </span>
                    </td>
                    <td>{{ $claim->description }}</td>
                    <td>{{ $claim->created_at->format('d/m/Y H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
