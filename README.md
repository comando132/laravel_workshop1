# Cars Agency
## Laravel workshop 1

Proyecto para el curso de laravel


## Instalación 
```sh
cd project
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate:refresh --seed
cambiar en el .env los siguientes constantes:
- DB_CONNECTION=mysql
- DB_HOST=host_de_la_base
- DB_PORT=3306
- DB_DATABASE=base_datos
- DB_USERNAME=usuario
- DB_PASSWORD=contraseña
php artisan serve
```
> Nota: En las migraciones se crean usuarios, marcas y carros por defecto 
Contraseña de los usuarios : `pass`


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
