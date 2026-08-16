@extends('layouts.admin')

@section('title', 'Mensajes de Contacto')
@section('nav_title', 'Mensajes de Contacto Recibidos')

@section('content')
<div class="container-box">
    <h2>Listado de Mensajes</h2>
    @if($messages->isEmpty())
        <p>No se han recibido mensajes de contacto.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Mensaje</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach($messages as $msg)
                <tr>
                    <td>{{ $msg->name }}</td>
                    <td>{{ $msg->email }}</td>
                    <td>{{ $msg->phone }}</td>
                    <td>{{ $msg->message }}</td>
                    <td>{{ $msg->created_at->format('d/m/Y H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
