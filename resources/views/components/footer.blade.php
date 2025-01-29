<footer class="bg-[#3E1E1E] text-[#C2A884] py-10">
    <div class="container mx-auto px-4">
        <!-- Contenedor principal del footer -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Columna 1: Logotipo y descripción -->
            <div>
                <!-- Logotipo -->
                <a href="/">
                    <img src="{{ Vite::asset('resources/img/logotipo.png') }}" alt="Logotipo" class="h-12 mb-4">
                </a>
                <!-- Descripción -->
                <p class="text-sm leading-relaxed">
                    La mejor formación en catas de vino en Sevilla, ciudad del arte. Aprende con expertos y disfruta de una experiencia única.
                </p>
            </div>

            <!-- Columna 2: Información de contacto -->
            <div>
                <h4 class="text-xl font-bold text-[#D4A017] mb-4">Contacto</h4>
                <p><i class="fas fa-map-marker-alt mr-2"></i>Calle Vino, 123, Sevilla</p>
                <p><i class="fas fa-phone mr-2"></i>+34 123 456 789</p>
                <p><i class="fas fa-envelope mr-2"></i>
                    <a href="mailto:info@southwinesacademy.com" class="hover:text-[#B76E79] transition-colors duration-300">info@southwinesacademy.com</a>
                </p>
            </div>

            <!-- Columna 3: Enlaces útiles -->
            <div>
                <h4 class="text-xl font-bold text-[#D4A017] mb-4">Enlaces útiles</h4>
                <ul class="space-y-2">
                    <li><a href="/sobre-nosotros" class="hover:text-[#B76E79] transition-colors duration-300">Sobre nosotros</a></li>
                    <li><a href="/cursos" class="hover:text-[#B76E79] transition-colors duration-300">Cursos</a></li>
                    <li><a href="/politica-de-privacidad" class="hover:text-[#B76E79] transition-colors duration-300">Política de privacidad</a></li>
                    <li><a href="/terminos-y-condiciones" class="hover:text-[#B76E79] transition-colors duration-300">Términos y condiciones</a></li>
                </ul>
            </div>

            <!-- Columna 4: Redes sociales -->
            <div>
                <h4 class="text-xl font-bold text-[#D4A017] mb-4">Síguenos en</h4>
                <div class="flex gap-4">
                    <!-- Twitter -->
                    <a href="https://twitter.com/yourprofile" target="_blank" class="group">
                        <div class="w-10 h-10 bg-[#D4A017] rounded-full flex justify-center items-center transition-transform transform hover:scale-110 hover:bg-[#722F37]">
                            <i class="fab fa-twitter text-[#3E1E1E] group-hover:text-white"></i>
                        </div>
                    </a>
                    <!-- Instagram -->
                    <a href="https://instagram.com/yourprofile" target="_blank" class="group">
                        <div class="w-10 h-10 bg-[#D4A017] rounded-full flex justify-center items-center transition-transform transform hover:scale-110 hover:bg-[#722F37]">
                            <i class="fab fa-instagram text-[#3E1E1E] group-hover:text-white"></i>
                        </div>
                    </a>
                    <!-- Facebook -->
                    <a href="https://facebook.com/yourprofile" target="_blank" class="group">
                        <div class="w-10 h-10 bg-[#D4A017] rounded-full flex justify-center items-center transition-transform transform hover:scale-110 hover:bg-[#722F37]">
                            <i class="fab fa-facebook-f text-[#3E1E1E] group-hover:text-white"></i>
                        </div>
                    </a>
                    <!-- LinkedIn -->
                    <a href="https://linkedin.com/yourprofile" target="_blank" class="group">
                        <div class="w-10 h-10 bg-[#D4A017] rounded-full flex justify-center items-center transition-transform transform hover:scale-110 hover:bg-[#722F37]">
                            <i class="fab fa-linkedin-in text-[#3E1E1E] group-hover:text-white"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Línea divisoria -->
        <div class="border-t border-[#D4A017] mt-10"></div>

        <!-- Créditos -->
        <div class="text-center mt-4 text-sm">
            <p>© 2025 South Wines Academy. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>