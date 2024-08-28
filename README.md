# Mi Aplicación Laravel

Bienvenido a **Mi Aplicación Laravel**. Este proyecto es una aplicación web construida con Laravel y Tailwind CSS. A continuación, se detallan los pasos para instalar y ejecutar el proyecto en una máquina diferente.

## Requisitos

- **PHP**: 8.2 o superior
- **Composer**: Para manejar las dependencias de PHP
- **MySQL**: O cualquier otro sistema de base de datos compatible
- **Node.js**: Para manejar las dependencias de frontend y compilar assets
- **Git**: Para clonar el repositorio

## Instalación

### Clonar el Repositorio

Primero, clona el repositorio desde GitHub:

```bash
git clone https://github.com/Ronny2004/Soluciones_Web.git
```

### Configuración del Entorno

1. **Instalar Dependencias de PHP**: Usa Composer:

    ```bash
    composer install
    ```

2. **Configurar el Archivo `.env`**: Copia el archivo de ejemplo `.env.example` a un nuevo archivo `.env`:

    ```bash
    cp .env.example .env
    ```

    Luego, edita el archivo `.env` para configurar tu conexión a la base de datos:

    ```plaintext
    APP_NAME=Laravel
    APP_ENV=local
    APP_KEY=
    APP_DEBUG=true
    APP_URL=http://localhost

    LOG_CHANNEL=stack

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=solutions
    DB_USERNAME=root
    DB_PASSWORD=

    BROADCAST_DRIVER=log
    CACHE_DRIVER=file
    QUEUE_CONNECTION=sync
    SESSION_DRIVER=file
    SESSION_LIFETIME=120

    # Configuración de S3 (deja vacío si no usas S3)
    S3_PUBLIC_URL=
    S3_ENDPOINT=
    S3_BUCKET=
    S3_REGION=
    S3_ACCESS_KEY=
    S3_SECRET_KEY=

    # Modo de desarrollo
    DEV_MODE=false
    ```

3. **Generar la Clave de Aplicación**: Genera una clave de aplicación para Laravel:

    ```bash
    php artisan key:generate
    ```

4. **Migrar la Base de Datos**: Ejecuta las migraciones para crear las tablas necesarias en la base de datos:

    ```bash
    php artisan migrate
    ```
5. **Ejecutar Seeders (opcional):**: Para poblar la base de datos con datos de ejemplo:

    ```bash
    php artisan db:seed --class=RolesSeeder
    php artisan db:seed --class=UsersSeeder
    ```

6. **Instalar Dependencias de Node.js**: Instala las dependencias de Node.js para el frontend y compila los assets:

    ```bash
    npm install
    npm run dev
    ```

7. **Iniciar el Servidor de Desarrollo**: Para ejecutar el servidor de desarrollo de Laravel, usa el siguiente comando:

    ```bash
    php artisan serve
    ```

    Esto iniciará el servidor de desarrollo en [http://localhost:8000](http://localhost:8000).

## Rutas

- **Página de Inicio**: `/` - La página de bienvenida de la aplicación.
- **Gestión de Usuarios**: `/users` - Administra los usuarios (lista, crear, editar, eliminar).

### Funcionalidad de la Gestión de Usuarios

- **Ver Usuarios**: Muestra una lista de todos los usuarios.
- **Crear Usuario**: Permite agregar un nuevo usuario a la base de datos.
- **Editar Usuario**: Permite modificar los detalles de un usuario existente.
- **Eliminar Usuario**: Permite eliminar un usuario de la base de datos.
