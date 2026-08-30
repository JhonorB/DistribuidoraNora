# Distribuidora Lencería Nora - Proyecto Laravel

Bienvenido al repositorio del proyecto de la tienda virtual **Distribuidora Lencería Nora**. 

A continuación, encontrarás los pasos exactos que debes seguir para clonar e instalar este proyecto en cualquier computadora (Windows, Mac o Linux) sin errores.

## 🛠️ Requisitos Previos

Asegúrate de tener instalado en tu computadora:
1. **PHP** (v8.2 o superior) - [Descargar PHP](https://windows.php.net/download/)
2. **Composer** (Gestor de dependencias de PHP) - [Descargar Composer](https://getcomposer.org/)
3. **Node.js y npm** - [Descargar Node.js](https://nodejs.org/)
4. **Git** - [Descargar Git](https://git-scm.com/)

---

## 🚀 Guía de Instalación Rápida

Sigue estos comandos línea por línea en tu terminal o consola (ej. Git Bash o la terminal de VS Code):

### 1. Clonar el repositorio
Descarga el proyecto desde GitHub y entra en la carpeta:
```bash
git clone https://github.com/JhonorB/DistribuidoraNora.git
cd DistribuidoraNora
```

### 2. Instalar dependencias de PHP
Esto descargará todo el núcleo de Laravel y las librerías necesarias:
```bash
composer install
```

### 3. Configurar el archivo de Entorno (.env)
Laravel necesita un archivo oculto `.env` para las variables de configuración. Crea una copia del archivo de ejemplo:
```bash
cp .env.example .env
```
> **Nota para Windows (CMD):** Si `cp` no funciona, usa `copy .env.example .env`

**¡IMPORTANTE! Base de Datos:**
Abre el nuevo archivo `.env` en tu editor de código y busca la sección de base de datos. Como usamos SQLite, asegúrate de que esté configurado exactamente así (puedes borrar las otras líneas de DB_... si quieres):
```env
DB_CONNECTION=sqlite
# No necesitas DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME ni DB_PASSWORD
```

### 4. Generar la Llave de la Aplicación
Crea la clave de seguridad de Laravel:
```bash
php artisan key:generate
```

### 5. Crear la Base de Datos y ejecutar Migraciones
El proyecto usa SQLite, por lo que la base de datos es un simple archivo. 
Primero, asegúrate de que el archivo exista ejecutando en la terminal (si estás en Windows usando VS Code o PowerShell):
```bash
# Solo si no existe ya un archivo database.sqlite
ni database/database.sqlite
```
*(Si estás en Mac/Linux/GitBash usa: `touch database/database.sqlite`)*

Luego, crea las tablas y carga los datos de prueba (como el administrador):
```bash
php artisan migrate --seed
```
*(Presiona **"yes"** si te pregunta si deseas crear la base de datos).*

### 6. Enlazar el Almacenamiento (Storage)
Para que las imágenes subidas por los usuarios (fotos de perfil, productos) puedan verse en la web pública:
```bash
php artisan storage:link
```

### 7. Instalar dependencias de Frontend (Vite/Node)
Descarga los paquetes de npm y compila los assets en caso de ser necesario:
```bash
npm install
npm run build
```

### 8. ¡Levantar el Servidor!
Todo está listo. Arranca el servidor local:
```bash
php artisan serve
```
Abre tu navegador y ve a: **http://127.0.0.1:8000**

---

## 🔐 Credenciales de Acceso por Defecto

Si se ejecutaron correctamente los seeders (`--seed`), deberías tener acceso con la siguiente cuenta maestra:

* **Correo:** `admin@lencerianora.com`
* **Contraseña:** `password` *(O la contraseña que hayan definido en el ProductSeeder/DatabaseSeeder)*

---

## ⚠️ Solución de Problemas Comunes (Troubleshooting)

1. **Error: "No application encryption key has been specified."**
   * **Solución:** Olvidaste el paso 4. Ejecuta `php artisan key:generate`.

2. **Error: "Database file does not exist" o "General error: 1 no such table"**
   * **Solución:** Laravel no encuentra el archivo SQLite o no corriste las migraciones. Verifica que exista el archivo `database/database.sqlite` y vuelve a correr `php artisan migrate`.

3. **Las fotos de perfil o de productos no cargan (sale un ícono roto).**
   * **Solución:** Olvidaste el paso 6. Ejecuta `php artisan storage:link`.

4. **Error: "Unclosed '[' does not match ')'" en alguna vista.**
   * **Solución:** Es probable que tu versión de PHP/Laravel esté desfasada. Este proyecto recomienda PHP 8.2+.

Cualquier otra duda, revisa los logs en `storage/logs/laravel.log`.
