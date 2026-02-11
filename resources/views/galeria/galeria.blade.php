<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Galería Simple</title>
  <style>
    .galeria {
      display: grid;
      grid-template-columns: repeat(5, 1fr); 
    }
    .galeria img {
      width: 100%;
      height: auto;
      border: 2px solid #ccc;
      border-radius: 5px;
    }
  </style>
</head>
<body>
  <h2>Mi Galería</h2>
  
    <nav>
  <p><a href="/principal">Principal</a></p>
  <p><a href="/perfil">Perfil</a></p>
  <p><a href="/hobbies">Hobbies</a></p>
  <p><a href="/meta">Metas</a></p>
  <p><a href="/galeria">Galería</a></p>
</nav>

<div class="galeria">
<img src="{{ asset('imagenes/1.jpg') }}" alt="Foto 1">
<img src="{{ asset('imagenes/2.jpg') }}" alt="Foto 2">
<img src="{{ asset('imagenes/6.jpg') }}" alt="Foto 3">
<img src="{{ asset('imagenes/4.jpg') }}" alt="Foto 4">
<img src="{{ asset('imagenes/5.jpg') }}" alt="Foto 5">
</div>

</body>
</html>
