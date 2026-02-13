<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cafeteria Yharnam - @yield('titulo')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
{{-- header --}}

<header class="fixed w-full z-20 top-0 start-0">
  <!-- Barra superior -->
  <nav class="bg-neutral-primary">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
      <a href="/Inicio" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="imagenes/Logo1.png" class="h-7" alt="Logo Cafeteria Yharnam" />
        <span class="self-center text-xl text-heading font-semibold whitespace-nowrap">House of Winters</span>
      </a>
<div class="flex items-center space-x-6 rtl:space-x-reverse">
@if(Auth::guard('admin')->check())
    <div class="flex items-center space-x-3">
        <img src="{{ Auth::guard('admin')->user()->Imagen }}" 
             alt="Foto de perfil" 
             class="w-8 h-8 rounded-full object-cover">

        <span class="text-sm text-heading font-medium">
            {{ Auth::guard('admin')->user()->Nombres }}
        </span>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="text-sm font-medium text-fg-brand hover:underline">
                Cerrar Sesión
            </button>
        </form>
    </div>
@endif

</div>
    </div>
  </nav>

  <!-- Barra de navegación con dropdown -->
  <nav class="bg-neutral-secondary-soft border-y border-default">
    <div class="max-w-screen-xl px-4 py-3 mx-auto">
      <div class="flex items-center">
        <ul class="flex flex-row font-medium mt-0 space-x-16 rtl:space-x-reverse text-sm">

          <!-- Inicio -->
          <li class="relative group">
            <a href="/Inicio" class="text-heading hover:underline">Inicio</a>
            <ul class="absolute left-0 mt-2 w-40 bg-white shadow-lg rounded opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 ease-in-out">
            </ul>
          </li>

          <!-- Novedades -->
          <li class="relative group">
            <a href="/Novedades" class="text-heading hover:underline">Novedades</a>
            <ul class="absolute left-0 mt-2 w-40 bg-white shadow-lg rounded opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 ease-in-out">
              <li><a href="/Novedades#sub1" class="block px-4 py-2 hover:bg-gray-100">Noticias recientes</a></li>
              <li><a href="/Novedades#sub2" class="block px-4 py-2 hover:bg-gray-100">Eventos</a></li>
            </ul>
          </li>

          <!-- Personal -->
          @if(Auth::guard('admin')->user()->Rol == 'Admin')
  
          <li class="relative group">
            <a href="/equipo/listado" class="text-heading hover:underline">Personal</a>
            <ul class="absolute left-0 mt-2 w-40 bg-white shadow-lg rounded opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 ease-in-out">
              <li><a href="/Equipo/aEquipo" class="block px-4 py-2 hover:bg-gray-100">Formulario de colaboradores</a></li>
              <li><a href="/Equipo/{id}/update" class="block px-4 py-2 hover:bg-gray-100">Formulario de Editar</a></li>
            </ul>
          </li>
          @endif
          
          
          <!-- Contacto -->
          @if(
          Auth::guard('admin')->user()->Rol == 'Admin' ||
          Auth::guard('admin')->user()->Rol == 'Almacenista'
          )
          <li class="relative group">
            <a href="/Contacto/Comentarios" class="text-heading hover:underline">Contacto</a>
            <ul class="absolute left-0 mt-2 w-40 bg-white shadow-lg rounded opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 ease-in-out">
              <li><a href="/Conctacto/contacto" class="block px-4 py-2 hover:bg-gray-100">Formulario de contacto</a></li>
            </ul>
          </li>
          @endif
          <!-- Productos -->
          <li class="relative group">
            <a href="/Productos/Productos" class="text-heading hover:underline">Productos</a>
            <ul class="absolute left-0 mt-2 w-40 bg-white shadow-lg rounded opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 ease-in-out">
              <li><a href="/Productos/formulario" class="block px-4 py-2 hover:bg-gray-100">Añadir productos</a></li>
            </ul>
          </li>

        </ul>
      </div>
    </div>
  </nav>
</header>




{{-- contenido dinamico --}}

    <main class="pt-32">
        @yield('contenido')
    </main>
    
{{-- contenido dinamico/formulario  --}}

    <main class="pt-32">
        @yield('formulario')
    </main>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

</body>
</html>