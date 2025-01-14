Proyecto Web de Cursos de Cata de Vinos
Este proyecto es una web desarrollada por 4 compañeros de Desarrollo de Aplicaciones Web (DAW) para una profesora de hostelería. La aplicación tiene como objetivo proporcionar una plataforma para la impartición de cursos de cata de vinos y permitir a los usuarios acceder a información detallada sobre los cursos disponibles, así como realizar consultas y ponerse en contacto.

Descripción
La web permite a los usuarios explorar diferentes cursos de cata de vinos organizados por localización y duración. Además, incluye funcionalidades como formulario de contacto, reseñas de usuarios, y un dashboard para que el empresario (la profesora) pueda gestionar los cursos y las consultas recibidas.

Funcionalidades principales:
Academia de formación de vino con cursos de cata en distintas localizaciones.
Página de detalles del curso con información sobre duración, maestro y formulario de contacto.
Formulario de contacto con envío al correo de la profesora.
Reseñas de usuarios para valorar los cursos.
Portada con carrusel de cursos destacados.
Enlace a WhatsApp para contacto rápido.
Dashboard para el empresario (sin autenticación para clientes).
Tecnologías utilizadas:
Backend: Laravel
Frontend: TailwindCSS / Bootstrap 5
Base de datos: MySQL
Librerías adicionales:
Laravel Breeze (autenticación para el dashboard).
Axios (para solicitudes AJAX).
AOS (para animaciones al hacer scroll).
Instalación
Clona este repositorio en tu máquina local:

bash
Copiar código
git clone https://github.com/tu_usuario/nombre_repositorio.git
cd nombre_repositorio
Instala las dependencias de Composer:

bash
Copiar código
composer install
Configura las variables de entorno en el archivo .env (crear a partir de .env.example):

bash
Copiar código
cp .env.example .env
Genera la clave de aplicación:

bash
Copiar código
php artisan key:generate
Ejecuta las migraciones para crear las tablas en la base de datos:

bash
Copiar código
php artisan migrate
Si usas un servidor local para pruebas, ejecuta el siguiente comando:

bash
Copiar código
php artisan serve
Accede a la web a través de http://localhost:8000.

Contribuciones
Si deseas contribuir al proyecto, por favor sigue estos pasos:

Haz un fork del repositorio.
Crea una nueva rama (git checkout -b feature/mi-nueva-funcionalidad).
Realiza tus cambios y haz commit (git commit -am 'Agregada nueva funcionalidad').
Haz push a tu rama (git push origin feature/mi-nueva-funcionalidad).
Abre un Pull Request.
Licencia
Este proyecto está bajo la Licencia Pública General GNU (GPL). Puedes modificar y distribuir el código bajo los términos de la GPL.
