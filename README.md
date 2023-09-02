## Okul Com Tr Back End Case

## Uygulamanın kurulumu ve ayağa kaldırılması
Bu uygulamayı çalıştırmak için makinenizde PHP 8.1+ çalışması ve Composer yüklü olması beklenmektedir.

Bu git repo'sunu klonlayıp kendi klasörüne terminalden girdikten sonra sırasıyla şu komutları çalıştırınız:

```shell
composer install
php artisan migrate:fresh --seed
php artisan serve
```
