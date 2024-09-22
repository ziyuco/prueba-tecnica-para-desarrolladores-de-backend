
# README para API REST CRUD con Laravel y Passport
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>
<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Acerca de Laravel
Laravel es un marco de aplicación web con una sintaxis expresiva y elegante. Creemos que el desarrollo debe ser una experiencia agradable y creativa para ser verdaderamente satisfactoria. Laravel elimina el dolor del desarrollo al facilitar tareas comunes utilizadas en muchos proyectos web, tales como:
- [Motor de enrutamiento simple y rápido](https://laravel.com/docs/routing).
- [Contenedor de inyección de dependencias potente](https://laravel.com/docs/container).
- Múltiples back-ends para [sesiones](https://laravel.com/docs/session) y [almacenamiento en caché](https://laravel.com/docs/cache).
- [ORM de base de datos expresivo e intuitivo](https://laravel.com/docs/eloquent).
- [Migraciones de esquema de base de datos agnósticas](https://laravel.com/docs/migrations).
- [Procesamiento robusto de trabajos en segundo plano](https://laravel.com/docs/queues).
- [Difusión de eventos en tiempo real](https://laravel.com/docs/broadcasting).

Laravel es accesible, poderoso y proporciona las herramientas necesarias para aplicaciones grandes y robustas.


## Aprendiendo Laravel
Laravel tiene la documentación más extensa y completa de todos los marcos de aplicación web modernos, lo que facilita comenzar con el marco. Si no te apetece leer, [Laracasts](https://laracasts.com) puede ayudarte. Laracasts contiene más de 1500 tutoriales en video sobre una variedad de temas, incluyendo Laravel, PHP moderno, pruebas unitarias y JavaScript. Mejora tus habilidades explorando nuestra completa biblioteca de videos.



## Instrucciones de instalación

### Clonar el repositorio
Para comenzar, clona el repositorio utilizando el siguiente comando:
bash 
git clone https://github.com/ziyuco/prueba-tecnica-para-desarrolladores-de-backend.git



### Navegar al directorio del proyecto
Una vez clonado el repositorio, navega al directorio recién creado:
bash 
cd prueba-tecnica-para-desarrolladores-de-backend



### Instalar dependencias
Para instalar las dependencias necesarias para el proyecto, ejecuta el siguiente comando:

## Requisitos para correr Laravel
Asegúrate de tener instalados los siguientes componentes:
- PHP >= 7.3
- Composer
- MySQL

### Instalación de Composer
Para instalar Composer, sigue estos pasos:
1. Descarga el instalador desde [getcomposer.org](https://getcomposer.org/download/).
2. Sigue las instrucciones de instalación para tu sistema operativo.

## Instalación y configuración de la base de datos
1. Crea una base de datos en MySQL:
   - Abre tu cliente MySQL.
   - Ejecuta el siguiente comando:
sql
   CREATE DATABASE nombre_de_tu_base_de_datos;
2. Renombra el archivo `.env.example` a `.env` y configura la conexión a la base de datos:
   - **DB_CONNECTION=mysql** 
   - **DB_HOST=127.0.0.1** 
   - **DB_PORT=3306** 
   - **DB_DATABASE=nombre_de_tu_base_de_datos** 
   - **DB_USERNAME=tu_usuario** 
   - **DB_PASSWORD=tu_contraseña** 
3. Ejecuta las migraciones para crear las tablas necesarias:
bash
   php artisan migrate
4. **Configuración de Passport:**
   - **Nota:** Laravel Passport ya está configurado en este proyecto. No es necesario ejecutar `php artisan passport:install` a menos que desees generar nuevas claves de cliente.

## Ejecutar el servidor
Para ejecutar el servidor de desarrollo, utiliza el siguiente comando:
bash
php artisan serve
Esto iniciará el servidor en `http://localhost:8000` de forma predeterminada.

## Endpoints de la API
### a: End-point: Login
- **Método:** POST
- **URL:** `/api/v1/users/login` 
- **Headers:**
  - Content-Type: application/json
- **Body (raw):**
json
{
  "mobile_phone": "prueba",
  "password": "prueba"
}
- **Respuesta:** 200 OK (Devuelve un token de autenticación)

### b: End-point: GetUsers
- **Método:** GET
- **URL:** `/api/v1/users` 
- **Headers:**
  - Content-Type: application/json
  - Authorization: Bearer {token}
- **Respuesta:** 200 OK

### c: End-point: GetUser
- **Método:** GET
- **URL:** `/api/v1/users/{id_user}` 
- **Headers:**
  - Content-Type: application/json
  - Authorization: Bearer {token}
- **Respuesta:** 200 OK

### d: End-point: CreateUser
- **Método:** POST
- **URL:** `/api/v1/users` 
- **Headers:**
  - Content-Type: application/json
- **Body (raw):**
json
{
  "first_name": "string",
  "last_name": "string",
  "date_birth": "2021-09-17",
  "mobile_phone": "string",
  "email": "user@example.com",
  "password": "string",
  "address": "string"
}
- **Respuesta:** 201 Created (Indica que se ha creado un nuevo recurso)

### e: End-point: UpdateUser
- **Método:** PUT
- **URL:** `/api/v1/users/{id_user}` 
- **Headers:**
  - Content-Type: application/json
  - Authorization: Bearer {token}
- **Body (raw):**
json
{
  "first_name": "string",
  "last_name": "string",
  "date_birth": "2021-09-17",
  "mobile_phone": "string",
  "email": "user@example.com",
  "password": "string",
  "address": "string"
}
- **Respuesta:** 200 OK

### f: End-point: DeleteUser
- **Método:** DELETE
- **URL:** `/api/v1/users/{id_user}` 
- **Headers:**
  - Content-Type: application/json
  - Authorization: Bearer {token}
- **Respuesta:** 204 No Content (Indica que se ha eliminado el recurso)

## Pruebas con Postman
Para probar los endpoints en Postman, sigue estos pasos:
1. **Autenticación:**
   - Crea una nueva solicitud POST a `/api/v1/users/login`.
   - En la pestaña "Headers", agrega:
     - Key: `Content-Type`, Value: `application/json`
   - En la pestaña "Body", selecciona "raw" y elige "JSON" como tipo, luego ingresa el cuerpo de la solicitud.
   - Envía la solicitud y obtén el token.

2. **Uso del token:**
   - Para las solicitudes que requieren autenticación, ve a la pestaña "Headers" y agrega:
     - Key: `Authorization`, Value: `Bearer {token}` (reemplaza `{token}` con el token obtenido).

Ahora puedes probar los demás endpoints utilizando el token de autenticación.

## Contribuyendo
Gracias por considerar contribuir al marco de Laravel. La guía de contribuciones se puede encontrar en la [documentación de Laravel](https://laravel.com/docs/contributions).

## Código de Conducta
Para garantizar que la comunidad de Laravel sea acogedora para todos, por favor revisa y cumple con el [Código de Conducta](https://laravel.com/docs/contributions#code-of-conduct).

## Vulnerabilidades de Seguridad
Si descubres una vulnerabilidad de seguridad dentro de Laravel, envía un correo electrónico a Taylor Otwell a través de [taylor@laravel.com](mailto:taylor@laravel.com). Todas las vulnerabilidades de seguridad se abordarán de inmediato.

## Licencia
El marco de Laravel es software de código abierto con licencia bajo la [licencia MIT](https://opensource.org/licenses/MIT).

---
