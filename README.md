# AlmaFit

Proyecto Fin de Grado

---

## Requisitos

- **PHP 8.1 o superior**
- **Composer**
- **Base de datos**: MySQL

---

## Instalación DESDE CERO DE APLICACION ALMAFIT (Panel Administrativo)

Sigue estos pasos para instalar y configurar el proyecto:

1. Clona este repositorio:
   ```bash
   git clone https://github.com/JavierDelAlamo/almafit.git
2. Cambiamos el .env nombre de nuestro proyecto, nombre bbdd, MySQL, descomentamos la conexión a la bbdd.

APP_NAME=AlmaFit
APP_ENV=local
APP_KEY=base64:
APP_DEBUG=true
APP_TIMEZONE=UTC
APP_URL=http://localhost:8000  

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=almafit
DB_USERNAME=root
DB_PASSWORD=

3. Hacemos el primer migrate para crear la base de datos.
C:\xampp\htdocs\almafit> php artisan migrate
Se crean estas 3 tablas por defecto:
  0001_01_01_000000_create_users_table .................................................... 81.87ms DONE
  0001_01_01_000001_create_cache_table .................................................... 20.71ms DONE
  0001_01_01_000002_create_jobs_table ..................................................... 75.58ms DONE

Siguiendo la documentación (https://filamentphp.com/docs/3.x/panels/installation)
Creamos el primer usuario para poder tener acceso con credenciales al proyecto.

php artisan make:filament-user 

Y probamos el esqueleto en el navegador web: http://localhost:8000/admin/login
Probamos credenciales con el login y vamos a la vista del panel administrativo.

Ya tenemos nuestro panel de admin operativo. Lo siguiente será maquearlo a nuestro gusto, crear tablas con los Modelos, componentes, migraciones etc.

Si queremos ver las rutas que tenemos ejecutamos en el terminal:
PS C:\xampp\htdocs\almafit> php artisan route:list //obtenemos:

GET|HEAD   / ........................................................................................... 
  GET|HEAD   admin ........................... filament.admin.pages.dashboard › Filament\Pages › Dashboard  
  GET|HEAD   admin/login .............................. filament.admin.auth.login › Filament\Pages › Login  
  POST       admin/logout .................. filament.admin.auth.logout › Filament\Http › LogoutController  
  GET|HEAD   filament/exports/{export}/download filament.exports.download › Filament\Actions › DownloadEx…  
  GET|HEAD   filament/imports/{import}/failed-rows/download filament.imports.failed-rows.download › Filam…  
  GET|HEAD   livewire/livewire.js ............ Livewire\Mechanisms › FrontendAssets@returnJavaScriptAsFile  
  GET|HEAD   livewire/livewire.min.js.map ...................... Livewire\Mechanisms › FrontendAssets@maps  
  GET|HEAD   livewire/preview-file/{filename} livewire.preview-file › Livewire\Features › FilePreviewCont…  
  POST       livewire/update ......... livewire.update › Livewire\Mechanisms › HandleRequests@handleUpdate  
  POST       livewire/upload-file . livewire.upload-file › Livewire\Features › FileUploadController@handle  
  GET|HEAD   storage/{path} ................................................................ storage.local  
  GET|HEAD   up ..........................................................................................  

Nosotros createmos otras para nuestro proyecto.

