@extends('layouts.app')
@section('main-content')

<body class="bg-gray-100 font-sans">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-md rounded-lg p-6 max-w-md w-full">
            <!-- Contenedor principal con Alpine.js -->
            <div x-data="contactForm()" class="space-y-6">
                <h1 class="text-2xl font-bold text-gray-700 text-center">Formulario de Contacto</h1>
                
                <!-- Mensajes de éxito o error -->
                <template x-if="successMessage">
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">¡Éxito!</strong>
                        <span class="block sm:inline" x-text="successMessage"></span>
                    </div>
                </template>
                <template x-if="errorMessage">
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">¡Error!</strong>
                        <span class="block sm:inline" x-text="errorMessage"></span>
                    </div>
                </template>

                <!-- Formulario -->
                <form @submit.prevent="submitForm" class="space-y-4">
                    <div>
                        <label for="nombre" class="block text-sm font-medium text-gray-600">Nombre:</label>
                        <input type="text" id="nombre" x-model="form.nombre" placeholder="Tu nombre completo" required
                            class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label for="tel" class="block text-sm font-medium text-gray-600">Teléfono:</label>
                        <input type="tel" id="tel" x-model="form.tel" placeholder="Tu número de teléfono"
                            class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-600">Correo Electrónico:</label>
                        <input type="email" id="email" x-model="form.email" placeholder="Tu correo electrónico" required
                            class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label for="event_id" class="block text-sm font-medium text-gray-600">Evento:</label>
                        <select id="event_id" x-model="form.event_id" required
                            class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            @foreach($cursos as $curso)
                                <option value="{{ $curso->id }}">{{ $curso->title_event }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="reason" class="block text-sm font-medium text-gray-600">Razón:</label>
                        <textarea id="reason" x-model="form.reason" placeholder="Describe tu razón de contacto" rows="3"
                            class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit"
                            class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-4 rounded-md shadow-md transition">
                            Enviar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Alpine.js Logic -->
    <script>
        function contactForm() {
            return {
                form: {
                    nombre: '',
                    tel: '',
                    email: '',
                    event_id: '',
                    reason: '',
                },
                successMessage: '',
                errorMessage: '',
                async submitForm() {
                    try {
                        this.successMessage = '';
                        this.errorMessage = '';

                        // Simulación de envío de datos con fetch
                        const response = await fetch('/contacto', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Para proteger contra CSRF
                            },
                            body: JSON.stringify(this.form),
                        });

                        if (response.ok) {
                            this.successMessage = 'Tu formulario ha sido enviado correctamente.';
                            this.form = { nombre: '', tel: '', email: '', event_id: '', reason: '' }; // Limpiar formulario
                        } else {
                            throw new Error('Hubo un problema al enviar el formulario. Intenta de nuevo.');
                        }
                    } catch (error) {
                        this.errorMessage = error.message || 'Algo salió mal. Por favor intenta nuevamente.';
                    }
                },
            };
        }
    </script>
</body>
</html>

@endsection
