@extends('layouts.app')

@section('main-content')
<br>
<body class="bg-gray-50 font-sans">
    <div class="min-h-screen flex flex-col items-center justify-center py-12 px-6 lg:px-8">
        <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-6xl">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Left Column: Contact Information and FAQ -->
                <div class="space-y-8">
                    <div class="text-center">
                        <img src="{{ Vite::asset('resources/img/logotipo.png') }}" alt="Logotipo" class="mx-auto max-h-16">
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800 text-center">Contacta con nosotros</h2>
                        <p class="text-gray-600 text-center">+34 655 107 735</p>
                        <p class="text-gray-600 text-center">Llámanos y te orientaremos</p>
                        <p class="text-gray-600 text-center">academia@morethanwines.com</p>
                        <p class="text-gray-600 text-center">Te contestaremos a la mayor brevedad</p>
                    </div>

                    <!-- Preguntas Frecuentes -->
                    <div class="mt-12 space-y-8">
                        <h2 class="text-2xl font-bold text-gray-800 text-center">Preguntas Frecuentes</h2>
                        <div class="space-y-4">
                            <div class="bg-gray-100 p-4 rounded-lg shadow-md">
                                <h3 class="font-semibold text-gray-800">¿Cómo puedo contactarme con ustedes?</h3>
                                <p class="text-gray-600">Puedes llamarnos al +34 655 107 735 o escribirnos a academia@morethanwines.com.</p>
                            </div>
                            <div class="bg-gray-100 p-4 rounded-lg shadow-md">
                                <h3 class="font-semibold text-gray-800">¿Cómo puedo reservar un lugar en un evento?</h3>
                                <p class="text-gray-600">Puedes completar el formulario de contacto seleccionando el evento de tu interés.</p>
                            </div>
                            <div class="bg-gray-100 p-4 rounded-lg shadow-md">
                                <h3 class="font-semibold text-gray-800">¿Tienen algún evento próximo?</h3>
                                <p class="text-gray-600">Sí, consulta nuestros eventos disponibles en el formulario de contacto.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Contact Form -->
                <div class="space-y-8">
                    <h1 class="text-3xl font-bold text-gray-700 text-center">Formulario de Contacto</h1>

                    <!-- Alpine.js Form -->
                    <div x-data="contactForm()" class="space-y-6">
                        <!-- Mensajes de éxito o error -->
                        <template x-if="successMessage">
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-md">
                                <strong class="font-bold">¡Éxito!</strong>
                                <span x-text="successMessage"></span>
                            </div>
                        </template>
                        <template x-if="errorMessage">
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md">
                                <strong class="font-bold">¡Error!</strong>
                                <span x-text="errorMessage"></span>
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
                                <textarea id="reason" x-model="form.reason" placeholder="Describe tu razón de contacto" rows="4" 
                                          class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-md shadow-lg transition duration-300">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
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

                        const response = await fetch('/contacto', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: JSON.stringify(this.form),
                        });

                        if (response.ok) {
                            this.successMessage = 'Tu formulario ha sido enviado correctamente.';
                            this.form = { nombre: '', tel: '', email: '', event_id: '', reason: '' };
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
@endsection
