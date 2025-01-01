<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> <!-- Asegúrate de tener un archivo CSS si usas uno -->
    <style>
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 2rem;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        @media (max-width: 768px) {
            .form-container {
                width: 100%;
                padding: 1rem;
            }
        }
        .form-container h1 {
            margin-bottom: 1.5rem;
        }
        .form-container .form-group {
            margin-bottom: 1.5rem;
        }
        .form-container .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }
        .form-container .form-group input,
        .form-container .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        .form-container .form-group textarea {
            resize: vertical;
        }
        .form-container .form-group input:focus,
        .form-container .form-group textarea:focus {
            border-color: #5a67d8;
            box-shadow: 0 0 0 3px rgba(90, 103, 216, 0.3);
        }
        .form-container .form-group button {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background-color: #5a67d8;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        .form-container .form-group button:hover {
            background-color: #434190;
        }
        .success-message {
            display: none;
            margin-bottom: 1.5rem;
            padding: 1rem;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
        }
        .success-message.show {
            display: block;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1 class="text-2xl font-bold mb-5">Formulario</h1>

        <div id="success-message" class="success-message">
            Enviado correctamente
            <button onclick="document.getElementById('success-message').classList.remove('show')" class="ml-4 px-2 py-1 bg-gray-500 text-white rounded-md hover:bg-gray-700">Cerrar</button>
        </div>

        <form id="sugerencia-form" action="{{ route('sugerencias.store') }}" method="POST">
            @csrf <!-- Token de seguridad obligatorio en Laravel -->

            <div class="form-group">
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
            </div>

            <div class="form-group">
                <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                <input type="email" name="email" id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
            </div>

            <div class="form-group">
                <label for="mensaje" class="block text-sm font-medium text-gray-700">Mensaje</label>
                <textarea name="mensaje" id="mensaje" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
            </div>

            <div class="form-group flex justify-end">
                <button type="submit" class="px-4 py-2 bg-indigo-500 text-white font-bold rounded-md hover:bg-indigo-700">Enviar</button>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/app.js') }}"></script> 
    <script>
        document.getElementById('sugerencia-form').addEventListener('submit', function(event) {
            event.preventDefault();
            var form = this;
            var formData = new FormData(form);

            fetch(form.action, {
                method: form.method,
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('success-message').classList.add('show');
                    form.reset();
                }
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>