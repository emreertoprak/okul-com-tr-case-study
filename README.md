## Okul Com Tr Back End Case

## Uygulamanın kurulumu ve ayağa kaldırılması
Bu uygulamayı çalıştırmak için makinenizde PHP 8.1+ çalışması, Docker olması  ve Composer yüklü olması beklenmektedir.

Bu git repo'sunu klonlayıp kendi klasörüne terminalden girdikten sonra sırasıyla şu komutları çalıştırınız:

```shell
docker-compose up
composer install
php artisan migrate:fresh --seed
php artisan serve
```

Uygulamanın user test'lerini postman üzerinden yapabilirsiniz. ( Base Url : http://127.0.0.1:8000/api/ )
