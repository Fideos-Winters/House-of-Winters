@extends('/layouts/app')

@section('contenido')
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Contactanos
            </h2>
            <p class="mb-8 lg:mb-16 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">Tienes alguna queja,
                duda o sugerencia?, haznolo saber.</p>
            <form action="/Contacto/store" class="space-y-8" method="POST" enctype="multipart/form-data">
                @csrf

                <div>
                    <label for="Correo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tu
                        correo</label>
                    <input type="email" value = "" name="Correo" id="Correo"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                        placeholder="nombre@correo.com" required>
                </div>
                <div>
                    <label for="Titulo"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Asutno</label>
                    <input type="text" name="Titulo" id="Titulo"
                        class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light"
                        placeholder="Dejanos saber como te podemos ayudar." required>
                </div>
                <div class="sm:col-span-2">
                    <label for="Sugerencia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Tu
                        mensaje</label>
                    <textarea id="Sugerencia" name="Sugerencia" rows="6"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Escribe tu comentario...."></textarea>
                </div>
                    <div>
                        <label for="Imagen" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Sube tu imagen
                        </label>
                        <input type="file" name="Imagen" id="Imagen" accept="image/*"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 
                              dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                          </div>

                    <button type="submit"
                    class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-primary-700 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Enviar</button>
            </form>
        </div>
    </section>
@endsection
