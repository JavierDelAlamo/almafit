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
            background-attachment: fixed;
        }

        header {
            background-image: url('{{ asset('storage/fondoheader3.jpg') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center; /* Centrar la imagen */
            margin-left: 0;
            margin-right: 0;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            height: 250px; /* Aumentar altura */
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

        @media (max-width: 768px) {
            body {
                margin: 0; /* Sin márgenes */
                padding: 0; /* Sin relleno */
            }
            /* Ocultar botón de sugerencias */
            .boton-sugerencias {
            
            visibility: hidden;
            }
            .header-help-button {
                display: none;
            }

            .container, .nav, header, .nav-categorias, .container article {
                margin: 0; /* Sin márgenes */
                padding: 0; /* Sin relleno */
            }

            header {
                height: 150px; /* Reducir altura */
                padding: 1rem 0.5rem;
            }

            header h1 {
                font-size: 1.5rem;
            }

            header p {
                font-size: 0.875rem;
            }
            /* Alinear elementos de la barra de navegación verticalmente */
            .nav ul {
                flex-direction: column;
                align-items: flex-start;
            }

            .nav ul li {
                margin-bottom: 0.5rem;
            }

            .nav ul li a {
                padding: 0.5rem 1rem;
            }

            .rich-editor-content {
                font-size: 0.875rem;
            }

            .rich-editor-content h1, .rich-editor-content h2, .rich-editor-content h3, .rich-editor-content h4, .rich-editor-content h5, .rich-editor-content h6 {
                font-size: 1rem;
            }

            .container article {
                width: 100%;
            }

            .nav-categorias {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 0.5rem;
            }

            .nav-categorias a:nth-child(n+3) {
                display: none;
            }
        }

        @media (min-width: 769px) and (max-width: 1024px) {
            .container {
                padding: 0;
                margin: 0;
            }

            header {
                height: 200px; /* Reducir altura */
                padding: 1.5rem 1rem;
                margin: 0;
            }

            header h1 {
                font-size: 1.5rem;
            }

            header p {
                font-size: 0.875rem;
            }

            .nav ul {
                flex-direction: column;
                align-items: flex-start;
            }

            .nav ul li {
                margin-bottom: 0.5rem;
            }

            .nav ul li a {
                padding: 0.5rem 1rem;
            }

            .rich-editor-content {
                font-size: 0.875rem;
            }

            .rich-editor-content h1, .rich-editor-content h2, .rich-editor-content h3, .rich-editor-content h4, .rich-editor-content h5, .rich-editor-content h6 {
                font-size: 1rem;
            }

            .container article {
                width: 100%;
            }

            .header-help-button {
                display: block;
            }

            .nav-categorias {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(100px, 1fr)); /* Mostrar todas las categorías */
                gap: 0.5rem;
            }
        }

        @media (min-width: 1025px) {
            .header-help-button {
                display: block;
            }

            .nav-categorias {
                display: grid;
                grid-template-columns: 1fr 1fr 1fr 1fr;
                gap: 0.5rem;
            }
        }

        .nav-categorias {
            padding: 0.25rem 0; /* Disminuir altura */
            display: flex;
            justify-content: center; /* Centrar contenido */
        }
    </style>

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiky0DWYsnwMF+X1DvQngQ2/FxF7MF3F72XcpuPs=" crossorigin="anonymous"></script>
</head>

<body class="bg-white font-family-karla">

    <!-- Top Barra de Navegacion -->
    <nav id="nav principal" class="w-full py-4 bg-blue-800 shadow">
        <div class="container mx-auto flex justify-between items-center">
            <ul class="flex items-center space-x-4 font-bold text-sm text-white uppercase">
                <li><a class="hover:bg-blue-600 rounded py-2 px-4 text-white" href="/">INICIO</a></li>
                <li><a class="hover:bg-blue-600 rounded py-2 px-4 text-white" href="/almafit-admin/login">ADMIN</a></li>
                <li><a class="hover:bg-blue-600 rounded py-2 px-4 text-white" href="#">AYUDA</a></li>
            </ul>  
             <!-- Botón para abrir el modal -->
        <button onclick="document.getElementById('sugerenciasModal').classList.remove('hidden')" class="px-4 py-2 bg-indigo-500 text-white font-bold rounded-md hover:bg-indigo-700 uppercase header-help-button" style="width: auto;">
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
     <nav class="w-full py-4 bg-blue-800 border-t border-b nav-categorias">
        <div class="container mx-auto flex justify-center space-x-4 text-sm">
            @foreach($categorias as $categoria)
                <a href="{{ route('categoria.show', $categoria->nombre) }}" class="hover:bg-blue-200 hover:text-black rounded py-5 px-7 text-white text-xl">{{ $categoria->nombre }}</a>
            @endforeach
        </div>
    </nav>

    <!-- Contenido Entradas -->
    <div class="container mx-auto flex flex-wrap py-6">

        <!-- Seccion de Entradas -->
        <section class="w-full  flex flex-col items-center px-3">
            
            <article class="flex flex-col shadow my-4" style="max-width: 700px; width: 100%;">
                {{-- Imagen de la entrada --}}
                <a href="/entrada/{{ $entrada->slug}}" class="hover:opacity-75" style="width: 100%;">
                    <img src="http://localhost:8000/storage/{{$entrada->image_url}}" class="max-w-full h-auto" style="max-width: 100%; max-height: 700px;">
                </a>
                <div class="bg-white flex flex-col justify-start p-6 rich-editor-content" style="width: 100%;">
                    <a href="{{ route('categoria.show', $categoria->nombre) }}" class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $entrada->categoria->nombre}}</a>
                    <a href="/entrada/{{ $entrada->slug}}" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $entrada->titulo }}</a>
                    <p class="text-sm pb-3">Creado por <a href="#" class="font-semibold hover:text-gray-800">{{ $entrada->user->name }}</a>, Publicado el {{ $entrada->created_at->format('d-m-Y H:i:s') }}</p>
                    <div class="pb-6 rich-editor-content" style="width: 100%; word-wrap: break-word;">{!!nl2br($entrada->cuerpo)!!}</div>
                    
                </div>
            </article>
            
            <!-- Sección de Comentarios -->
            <div class="w-full max-w-2xl mt-8">
                <h1 class="text-4xl font-extrabold text-black-600 mb-6">Comentarios</h1>
                @foreach($entrada->comentarios as $comentario)
                    <div class="bg-gray-100 p-4 rounded-lg mb-4">
                        <p class="font-semibold">{{ $comentario->user_comentario }}</p>
                        <p class="text-sm text-gray-600">{{ $comentario->created_at->format('d-m-Y H:i:s') }}</p>
                        <p class="mt-2">{{ $comentario->cuerpo }}</p>
                    </div>
                @endforeach
            </div>

            <!-- Mostrar mensajes de éxito o error -->
            @if(session('success'))
                <div class="w-full max-w-2xl mt-4 bg-green-100 text-green-700 p-4 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="w-full max-w-2xl mt-4 bg-red-100 text-red-700 p-4 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Formulario para agregar un comentario -->
            @auth
            <div class="w-full max-w-2xl mt-8 bg-blue-100 p-6 rounded-lg">
                <h1 class="text-4xl font-extrabold text-black-600 mb-6">Agregar un comentario</h1>
                <form id="comentarioForm" action="{{ route('comentarios.store', ['entrada' => $entrada->id]) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="block text-lg font-semibold text-black">Email (Registrado)</label>
                        <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm pl-2" readonly>
                    </div>
                    <div class="mb-4">
                        <label for="cuerpo" class="block text-lg font-semibold text-blue">Comentario</label>
                        <textarea name="cuerpo" id="cuerpo" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm pl-2" required></textarea>
                    </div>
                    <div>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Enviar</button>
                    </div>
                </form>
            </div>
            @else
            <p class="mt-8 text-red-500 font-extrabold text-xl border border-black p-4 bg-yellow-100">
                Debes estar registrado para poder comentar.
            </p>
            @endauth
            
        </section>

        
    </div>

    <!-- Footer -->
    <footer class="w-full border-t bg-white py-6">
        <div class="container mx-auto flex flex-col items-center justify-center text-center">
            <div class="flex space-x-4">
                <a href="#" class="uppercase text-sm">Sobre Nosotros</a>
                <a href="#" class="uppercase text-sm">Privacidad</a>
                <a href="#" class="uppercase text-sm">Terminos y condiciones</a>
                
            </div>
            <p class="text-gray-800 text-sm mt-4">&copy; almafit.com</p>
        </div>
    </footer>

</body>
</html>