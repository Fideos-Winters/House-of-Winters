@extends('/layouts/app')

@section('contenido')
<section class="bg-white dark:bg-gray-900">
  <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
    <div class="flex justify-end">
      <a href="/Productos"  
         class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
         Regresar
      </a>
    </div>

    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Editar Producto</h2>
    <form action="/Productos/{{$producto->ID}}/actualizar" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

        <!-- Nombre -->
        <div class="sm:col-span-2">
          <label for="Nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre del producto</label>
          <input type="text" name="Nombre" id="Nombre" value="{{ $producto->Nombre }}"
                 class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                 placeholder="Type product name" required>
        </div>

        <!-- Imagen -->
        <div class="w-full">
          <label for="Imagen" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Imagen</label>
          <input type="file" name="Imagen" id="Imagen" accept="image/*"
                 class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
          @if($producto->Imagen)
            <img src="{{ asset('storage/'.$producto->Imagen) }}" alt="Imagen actual" class="mt-2 w-20 h-20 rounded">
          @endif
        </div>

        <!-- Precio -->
        <div class="w-full">
          <label for="Precio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio</label>
          <input type="number" step="0.01" name="Precio" id="Precio" value="{{ $producto->Precio }}"
                 class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                 placeholder="$2999" required>
        </div>

        <!-- Categoría -->
        <div>
          <label for="Categoria_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoría</label>
          <select id="Categoria_id" name="Categoria_id"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
            <option value="">Selecciona categoría</option>
            <option value="1" {{ $producto->Categoria_id == 1 ? 'selected' : '' }}>Cafés</option>
            <option value="2" {{ $producto->Categoria_id == 2 ? 'selected' : '' }}>Tés</option>
            <option value="3" {{ $producto->Categoria_id == 3 ? 'selected' : '' }}>Panadería</option>
            <option value="4" {{ $producto->Categoria_id == 4 ? 'selected' : '' }}>Bebidas frías</option>
            <option value="5" {{ $producto->Categoria_id == 5 ? 'selected' : '' }}>Snacks</option>
          </select>
        </div>

        <!-- Stock -->
        <div>
          <label for="Stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
          <input type="number" name="Stock" id="Stock" value="{{ $producto->Stock }}"
                 class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                 placeholder="12" required>
        </div>

        <!-- Estado -->
        <div>
          <label for="Estado" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Estado</label>
          <select id="Estado" name="Estado"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
            <option value="activo" {{ $producto->Estado == 'activo' ? 'selected' : '' }}>Activo</option>
            <option value="inactivo" {{ $producto->Estado == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
          </select>
        </div>

      </div>

      <button type="submit"
              class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
        Actualizar Producto
      </button>
    </form>
  </div>
</section>
@endsection