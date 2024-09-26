<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="250" alt="Laravel Logo"></a></p>

# Requirements

-   Stable version of [Docker](https://docs.docker.com/engine/install/)
-   Compatible version of [Docker Compose](https://docs.docker.com/compose/install/#install-compose)

### Mandatory

-   Dokumentasi API menggunakan standar Open API versi 3 dapat dilihat dalam folder docs/user-api.json secara lengkap.
-   Unit Test API dapat dilihat pada folder `tests/Feature/UserTest` di dalam project. Anda dapat menemukan beberapa contoh pengujian untuk memastikan fungsi API berjalan dengan baik.

# Cara - Cara

### Cara Menjalankan Aplikasi

-   Buka terminal dan docker desktop di komputer
-   Buka directory dimana file project akan di install menggunakan perintah `cd` di ikuti path
-   Clone project menggunakan perintah `git clone https://github.com/vchandra22/technical-test-mas.git`
-   cp file env.example ke dalam file .env
-   Jalankan perintah `docker-compose build --no-cache`
-   Tunggu sampai proses build selesai, kemudian `docker-compose up -d`
-   Buka web browser kemudian akses url http://localhost:8000/

### Artisan commands or manage package

-   Aplikasi berjalan menggunakan docker container
-   Menjalankan artisan commands atau manage package dapat dilakukan dalam container
-   Gunakan perintah `docker compose exec php bash`
-   Jalankan perintah `php artisan key:generate` kemudian `php artisan migrate`
-   Jalankan perintah `php artisan db:seed`

### Cara mengakses phpmyadmin/db

-   URL: http://localhost:8088
-   Server: `db`
-   Username: `admin`
-   Password: `password`
-   Database: `maha_akbar_db`

# Catatan

### Basic docker compose commands

-   Build or rebuild services
    -   `docker compose build`
-   Create and start containers
    -   `docker compose up -d`
-   Stop and remove containers, networks
    -   `docker compose down`
-   Stop all services
    -   `docker compose stop`
-   Restart service containers
    -   `docker compose restart`
-   Run a command inside a container
    -   `docker compose exec [container] [command]`

### Useful Laravel Commands

-   Display basic information about your application
    -   `php artisan about`
-   Remove the configuration cache file
    -   `php artisan config:clear`
-   Flush the application cache
    -   `php artisan cache:clear`
-   Clear all cached events and listeners
    -   `php artisan event:clear`
-   Delete all of the jobs from the specified queue
    -   `php artisan queue:clear`
-   Remove the route cache file
    -   `php artisan route:clear`
-   Clear all compiled view files
    -   `php artisan view:clear`
-   Remove the compiled class file
    -   `php artisan clear-compiled`
-   Remove the cached bootstrap files
    -   `php artisan optimize:clear`
-   Delete the cached mutex files created by scheduler
    -   `php artisan schedule:clear-cache`
-   Flush expired password reset tokens
    -   `php artisan auth:clear-resets`

### Vite Commands

-   Start Development Serve
    -   `npm run dev`
-   Build or compile all the tailwind clasess
    -   `npm run build`

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

-   **[Vehikl](https://vehikl.com/)**
-   **[Tighten Co.](https://tighten.co)**
-   **[WebReinvent](https://webreinvent.com/)**
-   **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
-   **[64 Robots](https://64robots.com)**
-   **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
-   **[Cyber-Duck](https://cyber-duck.co.uk)**
-   **[DevSquad](https://devsquad.com/hire-laravel-developers)**
-   **[Jump24](https://jump24.co.uk)**
-   **[Redberry](https://redberry.international/laravel/)**
-   **[Active Logic](https://activelogic.com)**
-   **[byte5](https://byte5.de)**
-   **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
