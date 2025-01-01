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
            margin-left: 0;
            margin-right: 0;
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
                margin-left: 0;
                margin-right: 0;
            }

            .container {
                margin-left: 2rem;
                margin-right: 2rem;
            }
        }

        @media (min-width: 1024px) {
            header {
                margin-left: 0;
                margin-right: 0;
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
                <li><a class="hover:bg-blue-600 rounded py-2 px-4 text-white" href="/almafit-admin/login">PANEL ADMIN</a></li>
                <li><a class="hover:bg-blue-600 rounded py-2 px-4 text-white" href="#">AYUDA</a></li>
            </ul>  
             <!-- Botón para abrir el modal -->
        <button onclick="document.getElementById('sugerenciasModal').classList.remove('hidden')" class="px-4 py-2 bg-indigo-500 text-white font-bold rounded-md hover:bg-indigo-700 uppercase">
            Sugerencias
        </button>

        <!-- Modal -->
        <div id="sugerenciasModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-75 flex items-center justify-center">
            <div class="bg-white rounded-lg p-6 w-1/3">
                <h2 class="text-xl font-bold mb-4">Envíanos tu sugerencia</h2>

                @include('formulario') <!-- Incluye el formulario aquí -->

                <button onclick="document.getElementById('sugerenciasModal').classList.add('hidden')" class="mt-4 px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-700">
                    Cerrar
                </button>
            </div>
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
            <a href="#" class="hover:bg-blue-200 hover:text-black rounded py-5 px-7 text-white text-xl">Technology</a>
            <a href="#" class="hover:bg-blue-200 hover:text-black rounded py-5 px-7 text-white text-xl">Automotive</a>
            <a href="#" class="hover:bg-blue-200 hover:text-black rounded py-5 px-7 text-white text-xl">Finance</a>
        </div>
    </nav>

    <!-- Contenido Entradas -->
    <div class="container mx-auto flex flex-wrap py-6">

        <!-- Seccion de Entradas -->
        <section class="w-full md:w-4/5 flex flex-col items-center px-3">
            @foreach($entradas as $entrada)
            <article class="flex flex-col shadow my-4" style="max-width: 700px; width: 100%;">
                {{-- Imagen de la entrada --}}
                <a href="/{{ $entrada->slug}}" class="hover:opacity-75" style="width: 100%;">
                    <img src="http://localhost:8000/storage/{{$entrada->image_url}}" class="max-w-full h-auto" style="max-width: 100%; max-height: 700px;">
                </a>
                <div class="bg-white flex flex-col justify-start p-6 rich-editor-content" style="width: 100%;">
                    <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $entrada->categoria->nombre}}</a>
                    <a href="/{{ $entrada->slug}}" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $entrada->titulo }}</a>
                    <p class="text-sm pb-3">By <a href="#" class="font-semibold hover:text-gray-800">{{ $entrada->user->name }}</a>, Publicado el {{ $entrada->created_at->format('d-m-Y H:i:s') }}</p>
                    <div class="pb-6">{!! \Illuminate\Support\Str::limit($entrada->cuerpo, 100, '...') !!}</div>
                    <a href="#" class="uppercase text-gray-800 hover:text-black">Continuar Leyendo <i class="fas fa-arrow-right"></i></a>
                </div>
            </article>
            @endforeach

            <!-- Entradas -->
            
            <!-- Paginación -->
            <div class="flex items-center py-8 space-x-2">
                <a href="#" class="h-10 w-10 bg-blue-800 text-white flex items-center justify-center rounded-full hover:bg-blue-600">1</a>
                <a href="#" class="h-10 w-10 bg-gray-300 text-gray-800 flex items-center justify-center rounded-full hover:bg-blue-600 hover:text-white">2</a>
                <a href="#" class="h-10 w-10 bg-gray-300 text-gray-800 flex items-center justify-center rounded-full hover:bg-blue-600 hover:text-white">3</a>
            </div>
        </section>

        <!-- Adversiting -->
        <aside class="w-full md:w-1/5 flex flex-col items-center px-3">
            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">About Us</p>
                <p class="pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mattis.</p>
                <a href="#" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-600 py-2 text-center">Get to know us</a>
            </div>
        </aside>
    </div>

    <!-- Footer -->
    <footer class="w-full border-t bg-white py-6">
        <div class="container mx-auto flex flex-col items-center">
            <div class="flex space-x-4">
                <a href="#" class="uppercase text-sm">About Us</a>
                <a href="#" class="uppercase text-sm">Privacy Policy</a>
                <a href="#" class="uppercase text-sm">Terms & Conditions</a>
                <a href="#" class="uppercase text-sm">Contact Us</a>
            </div>
            <p class="text-gray-800 text-sm mt-4">&copy; almafit.com</p>
        </div>
    </footer>

</body>
</html>