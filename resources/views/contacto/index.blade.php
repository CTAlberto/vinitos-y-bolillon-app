@extends('layouts.app')
@section('main-content')

<body class="bg-[#F7F4E9] font-sans text-gray-800">
    <div class="min-h-screen flex flex-col items-center justify-center py-12 px-6 lg:px-8 mt-10">
        <div class="relative bg-white shadow-lg rounded-xl p-8 w-full max-w-6xl overflow-hidden">
            <!-- Background Texture -->
            <div class="absolute inset-0 bg-gradient-to-br from-[#F5EFE3] to-[#DAB473] opacity-20 pointer-events-none"></div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 relative z-10">
                <!-- Left Column: Visual Content -->
                <div class="flex flex-col justify-center space-y-8">
                   
                    <div class="space-y-4">
                        <h2 class="text-4xl font-bold text-[#8B5C3B]">Bienvenido a South Wines Academy</h2>
                        <p class="text-lg text-[#6F4E37]">
                            Explora el mundo del vino con nosotros. Estamos aquí para guiarte y responder todas tus preguntas.
                        </p>
                    </div>
                    <!-- Contact Info -->
                    <div class="flex flex-col space-y-4">
                        <div class="flex items-center space-x-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#D2B48C]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.468 4.147a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.146 1.468a1 1 0 01.684.947V19a2 2 0 01-2 2h-1a2 2 0 01-2-2v-3.28a1 1 0 00-.684-.947L15 11l-2.657-2.657a1 1 0 01-.502-1.21L13.714 6.3a1 1 0 01.948-.684H13a1 1 0 011-1V3a1 1 0 011-1h2z" />
                            </svg>
                            <div>
                                <span class="font-semibold text-[#8B5C3B]">Teléfono:</span>
                                <span class="text-[#6F4E37]">+34 655 107 735</span>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#D2B48C]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <div>
                                <span class="font-semibold text-[#8B5C3B]">Email:</span>
                                <span class="text-[#6F4E37]">academia@morethanwines.com</span>
                            </div>
                        </div>
                    </div>
                </div>

  
                <div class="space-y-8">
                    <h1 class="text-4xl font-bold text-[#8B5C3B] text-center">Formulario de Contacto</h1>
                    <!-- Alpine.js Form -->
                    <div x-data="contactForm()" class="space-y-6">
                        <!-- Mensajes de éxito o error -->
                        <template x-if="successMessage">
                            <div class="bg-[#FCEEC7] border border-[#D2B48C] text-[#8B5C3B] px-4 py-3 rounded-md">
                                <strong class="font-bold">¡Éxito!</strong>
                                <span x-text="successMessage"></span>
                            </div>
                        </template>
                        <template x-if="errorMessage">
                            <div class="bg-[#FDEDEC] border border-[#E27D60] text-[#E27D60] px-4 py-3 rounded-md">
                                <strong class="font-bold">¡Error!</strong>
                                <span x-text="errorMessage"></span>
                            </div>
                        </template>
                        <!-- Formulario -->
                        <form @submit.prevent="submitForm" class="space-y-4">
                            <div>
                                <label for="nombre" class="block text-sm font-medium text-[#8B5C3B]">Nombre:</label>
                                <input type="text" id="nombre" x-model="form.nombre" placeholder="Tu nombre completo" required 
                                       class="mt-1 block w-full p-3 border border-[#D2B48C] rounded-md shadow-sm focus:ring-[#8B5C3B] focus:border-[#8B5C3B]">
                            </div>
                            <div>
                                <label for="tel" class="block text-sm font-medium text-[#8B5C3B]">Teléfono:</label>
                                <input type="tel" id="tel" x-model="form.tel" placeholder="Tu número de teléfono" 
                                       class="mt-1 block w-full p-3 border border-[#D2B48C] rounded-md shadow-sm focus:ring-[#8B5C3B] focus:border-[#8B5C3B]">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-[#8B5C3B]">Correo Electrónico:</label>
                                <input type="email" id="email" x-model="form.email" placeholder="Tu correo electrónico" required 
                                       class="mt-1 block w-full p-3 border border-[#D2B48C] rounded-md shadow-sm focus:ring-[#8B5C3B] focus:border-[#8B5C3B]">
                            </div>
                            <div>
                                <label for="event_id" class="block text-sm font-medium text-[#8B5C3B]">Evento:</label>
                                <select id="event_id" x-model="form.event_id" required 
                                        class="mt-1 block w-full p-3 border border-[#D2B48C] rounded-md shadow-sm focus:ring-[#8B5C3B] focus:border-[#8B5C3B]">
                                    @foreach($cursos as $curso)
                                        <option value="{{ $curso->id }}">{{ $curso->title_event }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="reason" class="block text-sm font-medium text-[#8B5C3B]">Razón:</label>
                                <textarea id="reason" x-model="form.reason" placeholder="Describe tu razón de contacto" rows="4" 
                                          class="mt-1 block w-full p-3 border border-[#D2B48C] rounded-md shadow-sm focus:ring-[#8B5C3B] focus:border-[#8B5C3B]"></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="w-full bg-[#8B5C3B] hover:bg-[#6F4E37] text-white font-semibold py-3 px-4 rounded-md shadow-lg transition duration-300">
                                    Enviar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Alpine logica -->
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