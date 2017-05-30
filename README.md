# site

Standar site module. Sebagian besar modul site membutuhkan modul ini untuk bisa
berjalan dengan baik. Pada dasarnya, modul ini hanya bertugas membuat standar
kontroler untuk home dan 404.

Agar modul ini bisa berjalan dengan baik, silahkan edit file `./etc/config.php`
pada bagian `_routes` agar menggunakan default home dan 404 ke modul `site`.

```php
// ./etc/config.php

return [
    'name' => 'Phun',
    ...
    '_routes' => [
        'site' => [
            '404' => [
                'handler' => 'Site::notFound'
            ],
            'siteHome' => [
                'rule' => '/',
                'handler' => 'Site\\Controller\\Home::index'
            ]
        ]
    ]
];
```

Secara default, router untuk 404 dan `siteHome` menggunakan method dari
`Core\Controller\Home` yang adalah milik modul `core`.

Semua kontroler pada modul ini bebas di-*edit*, dan tidak akan ikut di upgrade.