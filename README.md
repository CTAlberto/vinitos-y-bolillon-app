# Proyecto Web de Cursos de Cata de Vinos

Este proyecto es una **web** desarrollada por 4 compañeros de **Desarrollo de Aplicaciones Web (DAW)** para una **profesora de hostelería**. La aplicación tiene como objetivo proporcionar una plataforma para la impartición de **cursos de cata de vinos** y permitir a los usuarios acceder a información detallada sobre los cursos disponibles, así como realizar consultas y ponerse en contacto.

## Descripción

La web permite a los usuarios explorar diferentes **cursos de cata de vinos** organizados por **localización** y **duración**. Además, incluye funcionalidades como **formulario de contacto** y un **dashboard** para que el empresario (la profesora) pueda gestionar los cursos y las consultas recibidas.

### Funcionalidades principales:

- **Academia de formación de vino** con cursos de cata en distintas localizaciones.
- **Página de detalles del curso** con información sobre duración, maestro y formulario de contacto.
- **Formulario de contacto** con envío al correo de la profesora.
- **Reseñas de usuarios** para valorar los cursos.
- **Portada con carrusel** de cursos destacados.
- **Enlace a WhatsApp** para contacto rápido.
- **Dashboard para el empresario** (sin autenticación para clientes).

### Tecnologías utilizadas:

- **Backend:** Laravel
- **Frontend:** TailwindCSS / Bootstrap 5
- **Base de datos:** MySQL
- **Librerías adicionales:**  
  - Laravel Breeze (autenticación para el dashboard).
  - Axios (para solicitudes AJAX).
  - AOS (para animaciones al hacer scroll).
### Versiones
- **PHP 8.2.12**
- **Composer v2.8.1**
- **Node v20.14.0**
- **Laravel 11.37.0**
---

## Instalación

1. Clona este repositorio en tu máquina local:

   ```bash
   git clone https://github.com/CTAlberto/vinitos-y-bolillon-app
   cd vinitos-y-bolillon-app

2. Instala las dependencias//Breeze(blade->yes->0):

    ```bash
    composer install
    npm install
    composer require laravel/breeze
    php artisan breeze:install 
    npm install aos --save
    npm install alpinejs
    npm install axios
    composer require spatie/laravel-backup

3. Configura las variables de entorno en el archivo .env (crear a partir de .env.example/Solicitar a los creadores):

    ```bash
    cp .env.example .env

4. Genera la clave de aplicación:

    ```bash
    php artisan key:generate

5. Ejecuta las migraciones(Solo para primeras instalaciones):

    ```bash
    php artisan migrate

6. Si usas un servidor local para pruebas, ejecuta el siguiente comando:

    ```bash
    php artisan serve

7. Accede a la web a través de http://localhost:8000.

## Desarrolladores

- **Rafael Navarro Villar**
- **Jesús Rubio Mesa**
- **Carlos Aguilar García**
- **Alberto Cuberos Távora**

## Licencia
Este proyecto está bajo la Licencia Pública General GNU (GPL). Puedes modificar y distribuir el código bajo los términos de la GPL.
