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


          
      <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Añadir un Producto</h2>
      <form action="/Producto/store" method="POST">

                          @csrf

          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
              <div class="sm:col-span-2">
                  <label for="Nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre del producto</label>
                  <input type="text" name="Nombre" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
              </div>
              <div class="w-full">
  <label for="imagen" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
    Imagen
  </label>
  <input 
    type="file" 
    name="Imagen" 
    id="imagen" 
    accept="image/*"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
           focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 
           dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
           dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
    required
  >
</div>
              <div class="w-full">
                  <label for="Precio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio</label>
                  <input type="number" name="Precio" id="Precio" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
              </div>



            <div>
         <label for="Categoria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
          Categoría
         </label>
         <select id="Categoria" name="Categoria" 
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                 focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 
                 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
              <option selected="">Selecciona categoría</option>
              <option value="1">Cafés</option>
              <option value="2">Tés</option>
              <option value="3">Panadería</option>
              <option value="4">Bebidas frías</option>
           <option value="5">Snacks</option>
            </select>
          </div>

              <div>
                  <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
                  <input type="number" name="Stock" id="Descuento" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="12" required="">
              </div> 


          </div>
          <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
              Añadir Producto
          </button>
      </form>
  </div>
</section>



@endsection