@extends('/layouts/app')

@section('contenido')


<section class="bg-white dark:bg-gray-900">
    <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
        <div class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">No hemos pretendido reinventar la tetera.</h2>
            <p class="mb-4">Somos anfitriones, artesanos del sabor y guardianes de la atmósfera. Innovadores en el deleite y solucionadores de anhelos. Lo bastante íntimos para ser ágiles y atentos, mas lo suficientemente distinguidos para ofrecer la amplitud que vuestra merced requiere al compás que demanda. Lo bastante íntimos para ser ágiles y atentos, mas lo suficientemente distinguidos para ofrecer la amplitud que vuestra merced requiere al compás que demanda.</p>
            <p>Somos anfitriones, artesanos del sabor y guardianes de la atmósfera. Innovadores en el deleite y solucionadores de anhelos. Lo bastante íntimos para ser ágiles y atentos.</p>
        </div>
        <div class="grid grid-cols-2 gap-4 mt-8">
            <img class="w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-2.png" alt="office content 1">
            <img class="mt-4 w-full lg:mt-10 rounded-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-1.png" alt="office content 2">
        </div>
    </div>
</section>

<div id="map" style="height: 400px;"></div>

<p id="ubicacion">
    Estás visitando desde: {{ $location['city'] ?? 'Ciudad desconocida' }},
    {{ $location['country_name'] ?? 'País desconocido' }}
</p>

<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
    
    // Inicializa el mapa :v
    var map = L.map('map').setView([{{ $lat }}, {{ $lon }}], 5);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    var marker = L.marker([{{ $lat }}, {{ $lon }}]).addTo(map)
        .bindPopup("Ubicación aproximada por IP")
        .openPopup();

    // si se  cumple la localizacion Se generera a ver si retorna la laditude y longitude
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var lat = position.coords.latitude;
            var lon = position.coords.longitude;

            // Actualiza el mapa en el momen
            map.setView([lat, lon], 13);
            marker.setLatLng([lat, lon])
                .bindPopup("Usted esta aqui")
                .openPopup();

            document.getElementById('ubicacion').innerText =
                "Tu ubicación real: lat " + lat + ", lon " + lon;
        }, function(error) {
            console.log("Error de geolocalización: " + error.message);
        });
    }
</script>




@endsection