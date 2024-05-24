1. Copy link berikut : https://github.com/evftrya/ImplementasiDjiksara.git 
2. buka github dan buka folder kosong.
3. buka terminal dan jalankan "git clone https://github.com/evftrya/ImplementasiDjiksara.git" (Tanpa tanda petik 2), kemudian enter.
4. setelah selesai, ketik "composer install" (tanpa tanda petik 2), kemudian enter.
5. aktifkan Xampp (apache dan MySQL).
6. buat database kosong. contoh "create database Matdis"\
7. open folder di vscode, care file dengan nama ".env"
8. bagian  :
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=matdis
        DB_USERNAME=root
        DB_PASSWORD=
    yang perlu diganti hanya :

    DB_DATABASE=gantiNamaDatabaseYangKamuBuatTadi

    klik ctrl+s;
9. buka terminal ketik : php artisan migrate:fresh, klik enter

BUAT ELLEN :

