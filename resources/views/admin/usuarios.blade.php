@extends('layouts.admin')

@section('title', 'Gestión de Usuarios')
@section('nav_title', 'Usuarios')

@section('content')
<div class="container-box">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Gestión de Usuarios</h2>
        <button class="btn btn-primary" onclick="document.getElementById('formAddUser').style.display='block'">+ Nuevo Usuario</button>
    </div>

    {{-- Formulario para crear nuevo usuario (oculto por defecto) --}}
    <div id="formAddUser" style="display: none; background: #fdf7f9; padding: 20px; border-radius: 10px; margin-bottom: 20px; border: 1px solid #ffe6f0;">
        <h4 style="margin-top: 0; color: #d63384;">Registrar Trabajador o Administrador</h4>
        <form action="{{ route('admin.usuarios.store') }}" method="POST" style="display: flex; gap: 15px; align-items: flex-end; flex-wrap: wrap;">
            @csrf
            <div>
                <label style="font-size:12px; font-weight:bold;">Nombre</label><br>
                <input type="text" name="name" required style="padding: 8px; border-radius:5px; border:1px solid #ccc; width: 150px;">
            </div>
            <div>
                <label style="font-size:12px; font-weight:bold;">Correo</label><br>
                <input type="email" name="email" required style="padding: 8px; border-radius:5px; border:1px solid #ccc; width: 180px;">
            </div>
            <div>
                <label style="font-size:12px; font-weight:bold;">Contraseña</label><br>
                <input type="password" name="password" required style="padding: 8px; border-radius:5px; border:1px solid #ccc; width: 150px;">
            </div>
            <div>
                <label style="font-size:12px; font-weight:bold;">Rol</label><br>
                <select name="role" style="padding: 8px; border-radius:5px; border:1px solid #ccc;">
                    <option value="trabajador">Trabajador</option>
                    <option value="admin">Administrador</option>
                    <option value="cliente">Cliente</option>
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-secondary" onclick="document.getElementById('formAddUser').style.display='none'">Cancelar</button>
            </div>
        </form>
    </div>

    @if($users->count() > 0)
    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Rol / Tipo</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>#{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form action="{{ route('admin.usuarios.update', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="action" value="change_role">
                            <select name="role" onchange="this.form.submit()" style="padding: 4px; border-radius:4px; border:1px solid #ccc; font-size: 12px; background: {{ $user->role == 'admin' ? '#ffe6f0' : ($user->role == 'trabajador' ? '#e7f6fc' : '#f8f9fa') }}; font-weight:bold;">
                                <option value="cliente" {{ $user->role == 'cliente' ? 'selected' : '' }}>Cliente</option>
                                <option value="trabajador" {{ $user->role == 'trabajador' ? 'selected' : '' }}>Trabajador</option>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrador</option>
                            </select>
                        </form>
                    </td>
                    <td>
                        @if($user->is_active)
                            <span class="badge badge-success">Activo</span>
                        @else
                            <span class="badge badge-danger">Suspendido</span>
                        @endif
                    </td>
                    <td>
                        <div style="display: flex; gap: 5px;">
                            {{-- Suspender / Habilitar --}}
                            <form action="{{ route('admin.usuarios.update', $user->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="action" value="toggle_status">
                                @if($user->is_active)
                                    <button type="submit" class="btn" style="background-color: #fd7e14; padding: 4px 8px; font-size: 11px;" title="Suspender Cuenta"><i class="fas fa-ban"></i> Suspender</button>
                                @else
                                    <button type="submit" class="btn badge-success" style="padding: 4px 8px; font-size: 11px; border: 1px solid #155724;" title="Habilitar Cuenta"><i class="fas fa-check"></i> Habilitar</button>
                                @endif
                            </form>

                            {{-- Eliminar --}}
                            <form action="{{ route('admin.usuarios.update', $user->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de ELIMINAR permanentemente a este usuario? Esta acción no se puede deshacer.');">
                                @csrf
                                <input type="hidden" name="action" value="delete">
                                <button type="submit" class="btn" style="background-color: #dc3545; padding: 4px 8px; font-size: 11px;" title="Eliminar Usuario"><i class="fas fa-trash"></i> Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p>No hay usuarios registrados en el sistema.</p>
    @endif
</div>
@endsection
