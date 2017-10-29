# site

Standar site module. Sebagian besar modul site membutuhkan modul ini untuk bisa
berjalan dengan baik. Pada dasarnya, modul ini hanya bertugas membuat standar
kontroler untuk home dan 404.

Semua kontroler pada modul ini bebas di-*edit*, dan tidak akan ikut di upgrade.

## Logo

Modul ini datang dengan beberapa file logo sebagai berikut:

1. /theme/site/static/logo/500x500.png
1. /theme/site/static/logo/200x60.png
1. /theme/site/static/logo/192x192.png
1. /theme/site/static/logo/114x114.png
1. /theme/site/static/logo/100x100.png
1. /theme/site/static/logo/72x72.png
1. /theme/site/static/logo/48x48.png

Silahkan ganti logo-logo tersebut agar sesuai dengan logo aplikasi.

## Schema Pencarian

Untuk menambahkan schema.org `potentialAction->SearchAction`, silahkan tambahkan
konfigurasi seperti di bawah pada konfigurasi aplikasi:

```php
<?php

return [
    'name' => 'Phun',
    ...,
    'sitesearch' => [
        'router' => 'siteSearch',
        'params' => [],
        'field'  => 'q'
    ]
];
```

Dimana `router` adalah nama router yang akan digunakan untuk menentukan router
yang menangani pencarian. Parameter `params` untuk tambahan parameter yang akan
dikirim ke router builder, dan `field` untuk nama search field.