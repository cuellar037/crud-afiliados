==============================================================
 CRUD DE AFILIADOS - INSTRUCCIONES DE INSTALACION
==============================================================

Aplicacion web para gestionar afiliados (crear, listar con
busqueda y paginacion, editar y eliminar).

Stack: Laravel 12 - PHP 8.2+ - MySQL 8 - Bootstrap 5 (por CDN)


--------------------------------------------------------------
 1. REQUISITOS
--------------------------------------------------------------

- PHP 8.2 o superior, con las extensiones: mbstring, xml, curl,
  openssl, pdo_mysql, ctype, fileinfo y tokenizer
- Composer 2.x
- MySQL 8 (instalado localmente) O Docker Desktop (el proyecto
  incluye un docker-compose.yml que levanta MySQL listo para usar)
- Conexion a internet (Bootstrap se carga desde un CDN)

No se requiere Node.js ni npm.

Verificar versiones:

    php -v
    composer -V


--------------------------------------------------------------
 2. INSTALACION
--------------------------------------------------------------

2.1  Descomprimir el proyecto y entrar a la carpeta:

    cd crud-afiliados

2.2  Instalar las dependencias de PHP:

    composer install

2.3  Crear el archivo de entorno (.env) a partir del ejemplo.
     (Si el .env ya existe en la carpeta, omitir este paso.)

     Windows:   copy .env.example .env
     Linux/Mac: cp .env.example .env

2.4  Editar el archivo .env y configurar la base de datos.
     Por defecto viene con SQLite; hay que cambiar el bloque DB_*
     para usar MySQL:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=afiliados
    DB_USERNAME=root
    DB_PASSWORD=123456

     (Si se usa Docker con el docker-compose.yml incluido, estos
      valores funcionan tal cual. Si se usa un MySQL local propio,
      ajustar usuario y contrasena a los de esa instalacion.)

2.5  Generar la clave de la aplicacion:

    php artisan key:generate


--------------------------------------------------------------
 3. BASE DE DATOS
--------------------------------------------------------------

OPCION A - Con Docker (recomendada)

    docker compose up -d

  Esto crea:
    - MySQL 8      -> puerto 3306, base de datos "afiliados",
                      usuario root, contrasena 123456
    - phpMyAdmin   -> http://localhost:8080 (opcional)

  Esperar unos 20-30 segundos a que MySQL termine de iniciar
  antes de continuar con el paso 3.1.

OPCION B - Con MySQL local (sin Docker)

  Crear la base de datos vacia:

    CREATE DATABASE afiliados CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

3.1  Crear las tablas y cargar datos de prueba (20 afiliados):

    php artisan migrate --seed

  Si se prefiere crear solo las tablas, sin datos de prueba:

    php artisan migrate


--------------------------------------------------------------
 4. EJECUTAR LA APLICACION
--------------------------------------------------------------

    php artisan serve

Abrir en el navegador:

    http://127.0.0.1:8000/afiliados


--------------------------------------------------------------
 5. FUNCIONALIDADES
--------------------------------------------------------------

- Listado de afiliados con paginacion (10 por pagina)
- Busqueda por numero de documento o por nombre/apellido
- Registro de nuevos afiliados
- Edicion de afiliados existentes
- Eliminacion de afiliados
- Validacion de campos (documento y correo unicos)

Rutas disponibles:

    GET     /afiliados                 Listado y busqueda
    GET     /afiliados/create          Formulario de registro
    POST    /afiliados                 Guardar afiliado
    GET     /afiliados/{id}/edit       Formulario de edicion
    PUT     /afiliados/{id}            Actualizar afiliado
    DELETE  /afiliados/{id}            Eliminar afiliado


--------------------------------------------------------------
 6. SOLUCION DE PROBLEMAS
--------------------------------------------------------------

"Access denied for user 'root'"
  -> Revisar DB_USERNAME y DB_PASSWORD en el .env. Luego ejecutar:
         php artisan config:clear

"Connection refused" o "No connection could be made"
  -> MySQL aun no esta listo o no esta corriendo. Si se usa
     Docker, verificar con "docker ps" que el contenedor
     mysql_afiliados este activo y esperar unos segundos.

"Port 3306 is already allocated" (Docker)
  -> Ya hay un MySQL local usando ese puerto. Detenerlo, o usar
     ese mismo MySQL local (Opcion B).

"No application encryption key has been specified"
  -> Ejecutar: php artisan key:generate

"could not find driver"
  -> Habilitar la extension pdo_mysql en el php.ini.

Pagina en blanco o error de permisos (Linux/Mac)
  -> Ejecutar: chmod -R 775 storage bootstrap/cache

Reiniciar la base de datos desde cero:

    php artisan migrate:fresh --seed

Limpiar caches de la aplicacion:

    php artisan optimize:clear


==============================================================