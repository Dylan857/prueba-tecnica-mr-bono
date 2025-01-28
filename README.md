1. Se clona el proyecto.
2. Se hace el siguiente comando: "composer install" (Se debe tener descargada la ultima version de composer con su ultima version de php)
3. Se debe crear un archivo llamado .env, con las configuraciones que estan en el .env.example, hay unas llaves que comienzan con DB, ahi se debe cambiar las configuraciones de su base de datos, en mi caso es mysql, pero deberia funcionar en todas las bases de datos relacionales, estos son las llaves: DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=prueba-tecnica
DB_USERNAME=root
DB_PASSWORD=admin

cambiar por sus credenciales

4. Se ejecutan las migraciones con el siguiente comando: "php artisan migrate"

5. Ejecutar seeder para user admin: "php artisan db:seed"

6. Para ejecutar el servidor ejecutar el siguiente comando: "php artisan serve"

7. Las rutas se encuentra en Routes/api.php, pero igual dejare la coleccion de postman en el repo.