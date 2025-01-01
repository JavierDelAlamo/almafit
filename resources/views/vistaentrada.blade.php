<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlmaFit-Web</title>
    <meta name="author" content="Javier del Alamo">
    <meta name="description" content="AlmaFit-Web">

    <!-- Tailwind CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: Karla, sans-serif;
        }

        body {
            background-image: url('{{ asset('storage/fondoweb2.jpg') }}');
            background-size: cover;
            background-repeat: no-repeat;
        }

        header {
            background-image: url('{{ asset('storage/fondoheader3.jpg') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: bottom;
            margin-left: 0; /* Cambiar a 0 */
            margin-right: 0; /* Cambiar a 0 */
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            height: 300px;
        }

        .container {
            margin-left: 1rem;
            margin-right: 1rem;
        }

        @media (min-width: 768px) {
            header {
                margin-left: 0; /* Cambiar a 0 */
                margin-right: 0; /* Cambiar a 0 */
            }

            .container {
                margin-left: 2rem;
                margin-right: 2rem;
            }
        }

        @media (min-width: 1024px) {
            header {
                margin-left: 0; /* Cambiar a 0 */
                margin-right: 0; /* Cambiar a 0 */
            }

            .container {
                margin-left: 3rem;
                margin-right: 3rem;
            }
        }

        .rich-editor-content h1, .rich-editor-content h2, .rich-editor-content h3, .rich-editor-content h4, .rich-editor-content h5, .rich-editor-content h6 {
            font-weight: bold;
            margin-top: 1rem;
            margin-bottom: 0.5rem;
        }

        .rich-editor-content ul, .rich-editor-content ol {
            margin-left: 1.5rem;
            margin-bottom: 1rem;
        }

        .rich-editor-content ul li, .rich-editor-content ol li {
            margin-bottom: 0.5rem;
        }
    </style>

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiky0DWYsnwMF+X1DvQngQ2/FxF7MF3F72XcpuPs=" crossorigin="anonymous"></script>
</head>

<body class="bg-white font-family-karla">

    <!-- Top Barra de Navegacion -->
    <nav class="w-full py-4 bg-blue-800 shadow">
        <div class="container mx-auto flex justify-between items-center">
            <ul class="flex items-center space-x-4 font-bold text-sm text-white uppercase">
                <li><a class="hover:bg-blue-600 rounded py-2 px-4 text-white" href="#">PANEL ADMIN</a></li>
                <li><a class="hover:bg-blue-600 rounded py-2 px-4 text-white" href="#">AYUDA</a></li>
            </ul>
            <div class="flex items-center space-x-6 text-white text-lg">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
    </nav>

    <!-- Cabecera -->
    <header class="container mx-auto py-12 text-center">
        <h1 class="text-6xl font-bold text-white uppercase hover:text-white">AlmaFit-GYM</h1>
        <p class="text-lg text-white">Transforma tu cuerpo, eleva tu espíritu</p>
    </header>

    <!-- Barra de Navegacion -->
    <nav class="w-full py-4 bg-blue-800 border-t border-b">
        <div class="container mx-auto flex justify-center space-x-4 text-sm">
            @foreach($categorias as $categoria)
                <a href="{{ route('categoria.show', $categoria->id) }}" class="hover:bg-blue-200 hover:text-black rounded py-5 px-7 text-white text-xl">{{ $categoria->nombre }}</a>
            @endforeach
        </div>
    </nav>

    <!-- Contenido Entradas -->
    <div class="container mx-auto flex flex-wrap py-6">

        <!-- Seccion de Entradas -->
        <section class="w-full  flex flex-col items-center px-3">
            
            <article class="flex flex-col shadow my-4" style="max-width: 700px; width: 100%;">
                {{-- Imagen de la entrada --}}
                <a href="/{{ $entrada->slug}}" class="hover:opacity-75" style="width: 100%;">
                    <img src="http://localhost:8000/storage/{{$entrada->image_url}}" class="max-w-full h-auto" style="max-width: 100%; max-height: 700px;">
                </a>
                <div class="bg-white flex flex-col justify-start p-6 rich-editor-content" style="width: 100%;">
                    <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $entrada->categoria->nombre}}</a>
                    <a href="/{{ $entrada->slug}}" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $entrada->titulo }}</a>
                    <p class="text-sm pb-3">Creado por <a href="#" class="font-semibold hover:text-gray-800">{{ $entrada->user->name }}</a>, Publicado el {{ $entrada->created_at->format('d-m-Y H:i:s') }}</p>
                    <div class="pb-6">{!! ($entrada->cuerpo) !!}</div>
                    
                </div>
            </article>
            

            <!-- Entradas -->
            
            
        </section>

        
    </div>

    <!-- Footer -->
    <footer class="w-full border-t bg-white py-6">
        <div class="container mx-auto flex flex-col items-center">
            <div class="flex space-x-4">
                <a href="#" class="uppercase text-sm">Sobre Nosotros</a>
                <a href="#" class="uppercase text-sm">Privacidad</a>
                <a href="#" class="uppercase text-sm">Terminos y condiciones</a>
                <a href="#" class="uppercase text-sm">Sobre Nosotros</a>
            </div>
            <p class="text-gray-800 text-sm mt-4">&copy; almafit.com</p>
        </div>
    </footer>

</body>
</html>