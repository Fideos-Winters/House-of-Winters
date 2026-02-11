@extends('layouts.app')

@section('contenido')
<section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
            <img class="w-8 h-8 mr-2" src="/imagenes/logo1.png" alt="logo">
            Yharnam
        </a>
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Editar Empleado
                </h1>

                <form class="space-y-4 md:space-y-6" action="/Equipo/{{ $empleado->ID }}/actualizar" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <label for="Nombres" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre/s</label>
                        <input type="text" name="Nombres" id="Nombres" value="{{ $empleado->Nombres }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            placeholder="tu nombre/s" required>
                    </div>

                    <div>
                        <label for="Apellidos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido/s</label>
                        <input type="text" name="Apellidos" id="Apellidos" value="{{ $empleado->Apellidos }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            placeholder="tu apellido/s" required>
                    </div>

                    <div>
                        <label for="Correo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo</label>
                        <input type="email" name="Correo" id="Correo" value="{{ $empleado->Correo }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            placeholder="nombre@correo.com" required>
                    </div>

                    <div>
                        <label for="Contrasena" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
                        <input type="password" name="Contrasena" id="Contrasena" value="{{ $empleado->Contrasena }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            required>
                    </div>

                    <div>
                        <label for="Imagen" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Imagen</label>
                        <input type="file" name="Imagen" id="Imagen" accept=".jpg,.jpeg,.png"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        {{-- Mostrar imagen actual --}}
                        @if($empleado->Imagen)
                            <img src="{{ asset('storage/'.$empleado->Imagen) }}" alt="Imagen actual" class="mt-2 w-20 h-20 rounded">
                        @endif
                    </div>

                    <div>
                        <label for="Rol" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rol</label>
                        <select id="Rol" name="Rol"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            required>
                            <option value="">Selecciona un rol</option>
                            <option value="Barista" {{ $empleado->Rol == 'Barista' ? 'selected' : '' }}>Barista</option>
                            <option value="Cajero" {{ $empleado->Rol == 'Cajero' ? 'selected' : '' }}>Cajero</option>
                            <option value="Admin" {{ $empleado->Rol == 'Admin' ? 'selected' : '' }}>Admin</option>
                            <option value="Almacenista" {{ $empleado->Rol == 'Almacenista' ? 'selected' : '' }}>Almacenista</option>
                        </select>
                    </div>

                    <div>
                        <label for="Estado" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
                        <select id="Estado" name="Estado"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            required>
                            <option value="activo" {{ $empleado->Estado == 'activo' ? 'selected' : '' }}>Activo</option>
                            <option value="inactivo" {{ $empleado->Estado == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>

                    <button type="submit"
                        class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Actualizar Datos
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection