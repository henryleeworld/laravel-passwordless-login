# Laravel 11 免密碼登入

引入 grosv 的 laravel-passwordless-login 套件來擴增提供登入使用者的暫時簽名路由，利用提供的連結來進行登入。

## 使用方式
- 把整個專案複製一份到你的電腦裡，這裡指的「內容」不是只有檔案，而是指所有整個專案的歷史紀錄、分支、標籤等內容都會複製一份下來。
```sh
$ git clone
```
- 將 __.env.example__ 檔案重新命名成 __.env__，如果應用程式金鑰沒有被設定的話，你的使用者 sessions 和其他加密的資料都是不安全的！
- 當你的專案中已經有 composer.lock，可以直接執行指令以讓 Composer 安裝 composer.lock 中指定的套件及版本。
```sh
$ composer install
```
- 產生 Laravel 要使用的一組 32 字元長度的隨機字串 APP_KEY 並存在 .env 內。
```sh
$ php artisan key:generate
```
- 執行 __Artisan__ 指令的 __migrate__ 來執行所有未完成的遷移，並執行資料庫填充（如果要測試的話）。
```sh
$ php artisan migrate --seed
```
- 在瀏覽器中輸入已定義的路由 URL 來訪問，例如：http://127.0.0.1:8000。
- 你可以經由 `/login/link/{你的 UID}` 來進行登入連結的產生，將該連結複製並貼到您的瀏覽器上。

----

## 畫面截圖
![](https://i.imgur.com/odcE0ha.png)
> 產生登入連結

![](https://i.imgur.com/LQZWrhL.png)
> 複製連結並貼到瀏覽器上進入即可登入
