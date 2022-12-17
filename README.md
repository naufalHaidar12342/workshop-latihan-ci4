# Workshop Sertifikasi Peminatan Web Developer - Latihan Membuat Online Shop dengan fashi-master template dan CodeIgniter 4

## Menjalankan project ini

Penulis berasumsi bahwa Anda sudah memasang XAMPP, Git Version Control, dan Composer.

> Jika Anda belum memiliki _software_ tersebut, dapat dicoba mengikuti tutorial berikut:

> > [Tutorial CodeIgniter 4 untuk PEMULA | 2. Persiapan & Instalasi - Web Programming Unpas](https://www.youtube.com/watch?v=UhpzEne6omo&list=PLFIM0718LjIUkkIq1Ub6B5dYNb6IlMvtc&index=3)

> > [GIT & GITHUB - Web Programming UNPAS](https://www.youtube.com/playlist?list=PLFIM0718LjIVknj6sgsSceMqlq242-jNf)

1. _Clone_ repository ini
2. Buka terminal di dalam folder hasil clone sebelumnya, kemudian ketikkan perintah
   `$ composer install`

## Migrasi database untuk membuat database di local

Masih di terminal yang sama dari langkah sebelumnya, ketikkan `php spark migrate`

## .env dan Konfigurasi yang perlu di-uncomment

Copy file `env`. Anda akan mendapatkan `env copy`. Ubah nama file `env copy` menjadi `.env` untuk _override_ konfigurasi di dalam folder `app/`

Beberapa setelan yang perlu Anda hilangkan tanda pagarnya (`#`) adalah sebagai berikut:

`````

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the _public_ folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's _public_ folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter _public/..._, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)

````

```

```
`````
